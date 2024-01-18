<?php

namespace App\Console\Commands;

use App\Models\Schedule;
use App\Models\User;
use App\Notifications\muthawifEmailNotification;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class NotifyEmailToMuthawif extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:emailMuthawif';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will notify the upcoming schedule to muthawif from email';

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
            ->where('availableScheduleDate', '<=', Carbon::now()->addDay()->toDateTimeString())
            ->where('emailNotifyStatus', 'not notified')->get();

        foreach ($users as $user) {
            foreach ($schedules as $schedule) {
                if ($user->id == $schedule->user_id) {
                    $details = [
                        'greeting' => 'Halo, ' . $user->name,
                        'body' => 'Jadwal ' . $schedule->name . ' kamu akan dimulai pada tanggal ' . $schedule->date . ' dan jam ' . $schedule->starttime . ' waktu indonesia bagian barat',
                        'actionText' => 'Klik link dibawah ini untuk menuju website',
                        'actionUrl' => 'https://www.youtube.com/',
                        'closing' => 'Salam, Manasik Maya',
                    ];
                    $user->notify(new muthawifEmailNotification($details));
                    DB::table('schedules')
                        ->where('id', $schedule->id)
                        ->update(['emailNotifyStatus' => 'notified']);
                }
            }
        }

        $this->info('Success Notify Upcoming Schedule to The Muthawif via Email');
    }
}
