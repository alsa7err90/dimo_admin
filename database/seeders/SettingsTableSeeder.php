<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            ['key' => 'APP_NAME', 'value' => 'DASH2','desc'=>'اسم الموقع','category'=>'general'],
            // قم بإضافة بيانات seed الأخرى هنا
        ]);
    }
}
