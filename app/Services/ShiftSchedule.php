<?php

namespace App\Services;

use Carbon\CarbonImmutable;

class ShiftSchedule
{
    protected $firstWorkDayInYear;
    protected $workSchedule = ['morning pertama', 'morning kedua', 'day pertama', 'day kedua', 'night pertama', 'night kedua', 'off pertama', 'off kedua'];
    protected $currentWorkDate;
    protected $timezone = "Asia/Shanghai";
    protected $shifts = [
        'morning' => '05:00-14:00',
        'day' => '13:00-22:00',
        'night' => '21:00-06:00',
    ];
    protected $checkInOutRange = [];
    protected $shiftDetail = [];
    protected $checkType;
    protected $isNormalAttendance = true;
    public $user;

    public function __construct($user = 'tiaswidiatmika', $timezone = null)
    {
        if (!empty($timezone)) {
            $this->timezone = $timezone;
        }
        $this->currentWorkDate = CarbonImmutable::now($this->timezone);
        $this->buildCheckInOutTime();
        // $this->checkType = $this->getCheckTime();
        $this->user = $user;
        $this->firstWorkDayInYear = $this->getFirstWorkDayInYear();
    }

    public function getFirstWorkDayInYear()
    {
        return \App\Models\User::where('username', $this->user)
            ->first()
            ->group()
            ->pluck('first_day_of_year')->first();
    }

    public function getShift($date = null)
    {
        // $date = $date ? $date : $this->currentWorkDate;
        // $dayOfYear = $date->isoFormat('DDD');
        $timestamp = 1640998801; // initial timestamp from 1 januari 2022 09.00 gmt+8
        $dateTest = date_create_from_format('U', 1667264401);
        // $dateTest = CarbonImmutable::now('Asia/Shanghai');
        $initialDate = date_create_from_format('U', $timestamp);
        $dayOfYear = $initialDate->diff($dateTest)->days;
        return $dayOfYear;
        // return $this->workSchedule[($dayOfYear + 7) % 8];
    }

    public function getCheckTime()
    {
        $checkType = null;
        $currentShift = $this->getShift();
        $previousShift = $this->getShift($this->currentWorkDate->subDay());

        $attendTime = (object) [
            'in' => null,
            'out' => null,
        ];

        $shift = [
            'in' => $currentShift,
            'out' => $currentShift,
        ];

        // validate day off so no attendance check
        // should be done by default
        if ($currentShift !== 'off') {
            $attendTime = clone $this->checkInOutRange[$currentShift];
        }

        if ($this->isNormalAttendance) {
            // validate night shift make the out attendance check
            // null since out attendance check is done
            // the next day
            if ($currentShift === 'night') {
                $attendTime->out = null;
                $shift['out'] = null;
            }

            // validate previous night shift so an out attendance
            // check could be done
            if ($previousShift === 'night') {
                $attendTime->out = $this->checkInOutRange[$previousShift]->out;
                $shift['out'] = $previousShift;
            }
        }

        $this->shiftDetail = $shift;

        foreach ($attendTime as $type => $hour) {
            if (!empty($hour)) {
                if ($this->currentWorkDate->between($hour->start, $hour->end)) {
                    $checkType = $type;
                    break;
                }
            }
        }

        return $checkType;
    }

    public function getShiftInfo()
    {
        // the error was unable to reproduce $this->checkType,
        // so it then changed to $this->getCheckTime()
        return "Checking {$this->getCheckTime()} for {$this->shiftDetail[$this->getCheckTime()]} shift...";
    }

    public function getTime()
    {
        return $this->currentWorkDate;
    }

    protected function buildCheckInOutTime()
    {
        foreach ($this->shifts as $shift => $hours) {
            $range = explode('-', $hours);

            $checkInStartsAt = CarbonImmutable::createFromFormat('H:i', $range[0], $this->timezone)->subHour();
            $checkInTime = (object) [
                'start' => $checkInStartsAt,
                'end' => $checkInStartsAt->addMinutes(59),
            ];

            $checkOutStartsAt = CarbonImmutable::createFromFormat('H:i', $range[1], $this->timezone)->addMinute();
            $checkOutTime = (object) [
                'start' => $checkOutStartsAt,
                'end' => $checkOutStartsAt->addMinutes(59),
            ];

            $this->checkInOutRange[$shift] = (object) [
                'in' => $checkInTime,
                'out' => $checkOutTime,
            ];
        }
    }
}
