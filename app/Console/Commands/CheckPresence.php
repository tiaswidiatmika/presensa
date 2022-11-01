<?php

namespace App\Console\Commands;

use App\Services\AttendanceCheck as Check;
use Illuminate\Console\Command;

class CheckPresence extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:presence {type} {username}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $check = new Check($this->argument('username'));

        // do this if check in
        if ($this->argument('type') === 'in') {
            $output = $check->doAttend();
            $this->info($output);
        } else {
            $this->info('absen keluar');
        }
    }
}
