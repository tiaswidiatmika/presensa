<?php

namespace App\Console\Commands;

use App\Services\AttendanceCheck as Check;
use Illuminate\Console\Command;

class BruteCheckPresence extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'presence:brute {type} {username}';

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

        // checking presence type
        if ($this->argument('type') === 'in') {
            $check->doLogin();
            $output = $check->doAttend();
            $this->info($output);
        } else {
            $check->doLogin();
            $output = $check->doOut();
            $this->info($output);
        }
    }
}
