<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schedules')->insert(
            [
                [
                    "name" => "Manasik bersama rini",
                    "price" => 15000,
                    "description" => "Ayo ikut kegiatan manasik bersama saya rini",
                    "image" => "87Keyboard1.jpg",
                    "date" => "2022-03-27",
                    "starttime" => "14:00",
                    "endtime" => "17:00",
                    "availableScheduleDate" => "2022-03-27 14:00:00",
                    "dueDateSchedule" => "2022-03-27 17:00:00",
                    "status" => "not available",
                    "notifyStatus" => "notified",
                    "emailNotifyStatus" => "notified",
                    "user_id" => 2,
                    "participant" => "10",
                ],
                [
                    "name" => "Manasik bersama rita",
                    "price" => 20000,
                    "description" => "Ayo ikut kegiatan manasik bersama saya rita",
                    "image" => "87Keyboard2.jpg",
                    "date" => "2021-06-11",
                    "starttime" => "13:00",
                    "endtime" => "15:00",
                    "availableScheduleDate" => "2021-06-11 13:00:00",
                    "dueDateSchedule" => "2021-06-11 15:00:00",
                    "status" => "not available",
                    "notifyStatus" => "notified",
                    "emailNotifyStatus" => "notified",
                    "user_id" => 3,
                    "participant" => "12",
                ],
                [
                    "name" => "Manasik kedua bersama rini",
                    "price" => 15000,
                    "description" => "Ayo ikut kegiatan tahap selanjutnya manasik bersama saya rini",
                    "image" => "87Keyboard3.jpg",
                    "date" => "2022-04-19",
                    "starttime" => "11:00",
                    "endtime" => "16:00",
                    "availableScheduleDate" => "2022-04-19 11:00:00",
                    "dueDateSchedule" => "2022-04-19 16:00:00",
                    "status" => "not available",
                    "notifyStatus" => "notified",
                    "emailNotifyStatus" => "notified",
                    "user_id" => 2,
                    "participant" => "5",
                ],
                [
                    "name" => "Manasik gembira",
                    "price" => 15000,
                    "description" => "Ayo ikut kegiatan manasik gembira",
                    "image" => "87Keyboard4.jpg",
                    "date" => "2022-01-14",
                    "starttime" => "12:00",
                    "endtime" => "15:00",
                    "availableScheduleDate" => "2022-01-14 12:00:00",
                    "dueDateSchedule" => "2022-01-14 15:00:00",
                    "status" => "not available",
                    "notifyStatus" => "notified",
                    "emailNotifyStatus" => "notified",
                    "user_id" => 3,
                    "participant" => "20",
                ],
            ]
        );
    }
}
