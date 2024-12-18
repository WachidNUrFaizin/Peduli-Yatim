<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::query()->updateOrCreate(
            [
                'email' => 'support@Peduliyatim.com'
            ],
            [
                'email' => 'support@Peduliyatim.com',
                'phone' => '081232323221',
                'phone_hours' => 'Senin - Jum\'at, 08:00 s/d 16:00',
                'owner_name' => 'Administrator',
                'company_name' => 'Peduli_Yatim',
                'short_description' => '-',
                'keyword' => '-',
                'about' => '-',
                'address' => '-',
                'postal_code' => 12345,
                'city' => '-',
                'province' => '-',
                'instagram_link' => '-',
                'twitter_link' => '-',
                'fanpage_link' => '-',
                'google_plus_link' => '-'
            ]
        );
    }
}
