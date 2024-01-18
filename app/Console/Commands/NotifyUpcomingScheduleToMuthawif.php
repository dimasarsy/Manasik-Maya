<?php

namespace App\Console\Commands;

use App\Models\Schedule;
use App\Models\User;
use App\Notifications\muthawifUpcomingScheduleNotification;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class NotifyUpcomingScheduleToMuthawif extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:muthawifUpcomingSchedule';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will notify the upcoming schedule to muthawif from website';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::where('role_id', 3)->get();
        $schedules =
            Schedule::where('status', "available")
            ->where('availableScheduleDate', '<=', Carbon::now()->addHour()->toDateTimeString())
            ->where('notifyStatus', 'not notified')->get();

        foreach ($users as $user) {
            foreach ($schedules as $schedule) {
                if ($user->id == $schedule->user_id) {
                    $user->notify(new muthawifUpcomingScheduleNotification($schedule));
                    DB::table('schedules')
                        ->where('id', $schedule->id)
                        ->update(['notifyStatus' => 'notified']);
                }
            }
        }

        $this->info('Success Notify Upcoming Schedule to The Muthawif');
    }
}
