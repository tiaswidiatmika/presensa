<?php

namespace App\Console\Commands;

use App\Services\AttendanceCheck as Check;
use Illuminate\Console\Command;

class BruteCheckAll extends Command
{
    /**
     * The name and signature of the console command.
     * this command to check all users without checking shift
     *
     * @var string
     */
    protected $signature = 'grouppresence:brute {type} {groupCodeName}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'check for all users on one group regardless the shift';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = \App\Models\UserGroup::where('codename', $this->argument('groupCodeName'))->first()->users;
        $users->map(function ($user) {
            $check = new Check($user->username);
            if ($this->argument('type') === 'in') {
                $this->info($user->username);
                $check->doLogin();
                $check->doAttend();
            }
            if ($this->argument('type') === 'out') {
                $check->doLogin();
                $check->doOut();
            }

        });
    }
}
