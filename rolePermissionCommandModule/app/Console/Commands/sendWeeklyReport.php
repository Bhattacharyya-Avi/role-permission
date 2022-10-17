<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Notifications\WeeklyReport;
use Illuminate\Console\Command;

class sendWeeklyReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weekly:mail_report';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Weekly report send to the employee';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $employees = User::all();
        foreach ($employees as $employee){
            $email = $employee->email;
            $employee->notify(new WeeklyReport($employee));
            $this->info('Weekly report has been sent successfully');
        }
    }
}
