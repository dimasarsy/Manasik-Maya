<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class NotifySMSToMuthawif extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:SMSMuthawif';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will notify the upcoming schedule to muthawif from SMS';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Success Notify Upcoming Schedule to The Muthawif via SMS');
    }
}
