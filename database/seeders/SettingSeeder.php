<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'title' => 'عنوان سایت',
            'description' => 'عنوان سایت',
            'keywords' => 'کلمات کلیدی',
            'logo' => 'logo.png',
            'icon' => 'icon.png',
            'created_at' => Carbon::now(),
        ]);
    }
}
