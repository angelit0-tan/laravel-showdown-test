<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Timezone;
use App\TimeZones AS TimeZoneEnums; 

class TimezoneSeeder extends Seeder
{
    /**
     * Seeder for timezones
     * 
     */
    public function run(): void
    {
        // Timezone lists will be store at the timezone enums
        $timezones = TimeZoneEnums::map();

        // Loop thru each timezone and save if it doesn't exist yet
        foreach($timezones as $timezone) {
            # prevent duplicate timezone
            Timezone::firstOrCreate([
                'iso' => $timezone['iso']
            ],[
                'offset' => $timezone['offset'],
                'label' => $timezone['label']
            ]);
        }
    }
}
