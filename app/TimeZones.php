<?php

namespace App;

enum TimeZones
{
    /**
     * Enums for the timezone lists
     * @return  array
     */
    public static function map(): array
    {
        return [
            [
                'iso' => 'Africa/Abidjan',
                'label' => 'Ivory Coast Standard Time',
                'offset' => '+00.00',
            ],
            [
                'iso' => 'Africa/Accra',
                'label' => 'Ghana Mean Time',
                'offset' => '+00.00',
            ],
            [
                'iso' => 'Africa/Accra',
                'label' => 'Ghana Mean Time',
                'offset' => '+00.00',
            ],
            [
                'iso' => 'Africa/Addis_Ababa',
                'label' => 'East Africa Time',
                'offset' => '+03.00',
            ],
            [
                'iso' => 'Africa/Algiers',
                'label' => 'Central European Time',
                'offset' => '+01.00',
            ],
            [
                'iso' => 'Africa/Cairo',
                'label' => 'Eastern European Time',
                'offset' => '+02.00',
            ],
            [
                'iso' => 'Africa/Casablanca',
                'label' => 'Western European Time',
                'offset' => '+00.00',
            ],
            [
                'iso' => 'Africa/Johannesburg',
                'label' => 'South Africa Standard Time',
                'offset' => '+02.00',
            ],
            [
                'iso' => 'Africa/Lagos',
                'label' => 'West Africa Time',
                'offset' => '+01.00',
            ],
            [
                'iso' => 'Africa/Nairobi',
                'label' => 'East Africa Time',
                'offset' => '+03.00',
            ],
            [
                'iso' => 'America/Adak',
                'label' => 'Hawaii-Aleutian Standard Time',
                'offset' => '-10.00',
            ],
            [
                'iso' => 'America/Anchorage',
                'label' => 'Alaska Standard Time',
                'offset' => '-09.00',
            ],
            [
                'iso' => 'America/Argentina/Buenos_Aires',
                'label' => 'Argentina Time',
                'offset' => '-03.00',
            ],
            [
                'iso' => 'America/Bogota',
                'label' => 'Colombia Time',
                'offset' => '-05.00',
            ],
            [
                'iso' => 'America/Caracas',
                'label' => 'Venezuela Time',
                'offset' => '-04.00',
            ],
            [
                'iso' => 'America/Chicago',
                'label' => 'Central Standard Time',
                'offset' => '-06.00',
            ],
            [
                'iso' => 'America/Denver',
                'label' => 'Mountain Standard Time',
                'offset' => '-07.00',
            ],
            [
                'iso' => 'America/Guatemala',
                'label' => 'Central Standard Time',
                'offset' => '-06.00',
            ],
            [
                'iso' => 'America/Halifax',
                'label' => 'Atlantic Standard Time',
                'offset' => '-04.00',
            ],
            [
                'iso' => 'America/Los_Angeles',
                'label' => 'Pacific Standard Time',
                'offset' => '-08.00',
            ],
            [
                'iso' => 'America/Mexico_City',
                'label' => 'Central Standard Time',
                'offset' => '-06.00',
            ],
            [
                'iso' => 'America/New_York',
                'label' => 'Eastern Standard Time',
                'offset' => '-05.00',
            ],
            [
                'iso' => 'America/Sao_Paulo',
                'label' => 'Brasilia Time',
                'offset' => '-03.00',
            ],
            [
                'iso' => 'Asia/Baghdad',
                'label' => 'Arabia Standard Time',
                'offset' => '+03.00',
            ],
            [
                'iso' => 'Asia/Bangkok',
                'label' => 'Indochina Time',
                'offset' => '+07.00',
            ],
            [
                'iso' => 'Asia/Dhaka',
                'label' => 'Bangladesh Standard',
                'offset' => '+06.00',
            ],
            [
                'iso' => 'Asia/Dubai',
                'label' => 'Gulf Standard Time',
                'offset' => '+04.00',
            ],
            [
                'iso' => 'Asia/Hong_Kong',
                'label' => 'Hong Kong Time',
                'offset' => '+08.00',
            ],
            [
                'iso' => 'Asia/Karachi',
                'label' => 'Pakistan Standard Time',
                'offset' => '+05.00',
            ],
            [
                'iso' => 'Asia/Kolkata',
                'label' => 'India Standard Time',
                'offset' => '+05.30',
            ],
            [
                'iso' => 'Asia/Kuala_Lumpur',
                'label' => 'Malaysia Time',
                'offset' => '+08.00',
            ],
            [
                'iso' => 'Asia/Riyadh',
                'label' => 'Arabia Standard Time',
                'offset' => '+03.00',
            ],
            [
                'iso' => 'Asia/Shanghai',
                'label' => 'China Standard Time',
                'offset' => '+08.00',
            ],
            [
                'iso' => 'Asia/Singapore',
                'label' => 'Singapore Time',
                'offset' => '+08.00',
            ],
            [
                'iso' => 'Asia/Tokyo',
                'label' => 'Japan Standard Time',
                'offset' => '+09.00',
            ],
            [
                'iso' => 'Asia/Seoul',
                'label' => 'Korea Standard Time',
                'offset' => '+09.00',
            ],
            [
                'iso' => 'Asia/Tehran',
                'label' => 'Iran Standard Time',
                'offset' => '+03.30',
            ],
            [
                'iso' => 'Australia/Sydney',
                'label' => 'Australian Eastern Time',
                'offset' => '+10.00',
            ],
            [
                'iso' => 'Australia/Adelaide',
                'label' => 'Australian Central Time',
                'offset' => '+09.30',
            ],
            [
                'iso' => 'Europe/Amsterdam',
                'label' => 'Central European Time',
                'offset' => '+01.00',
            ],
            [
                'iso' => 'Europe/Paris',
                'label' => '(CET) Central European Time, Berlin',
                'offset' => '+01.00',
            ],
            [
                'iso' => 'Europe/London',
                'label' => '(GMT) Greenwich Mean Time, London',
                'offset' => '+01.00',
            ],
            [
                'iso' => 'Etc/UTC',
                'label' => 'Coordinated Universal Time',
                'offset' => '+00.00',
            ],
            [
                'iso' => 'Europe/Berlin',
                'label' => 'Central European Time',
                'offset' => '+01.00',
            ],
            [
                'iso' => 'Europe/Lisbon',
                'label' => 'Western European Time',
                'offset' => '+00.00',
            ],
            [
                'iso' => 'Europe/Moscow',
                'label' => 'Moscow Standard Time',
                'offset' => '+03.00',
            ],
            [
                'iso' => 'Pacific/Auckland',
                'label' => 'New Zealand Standard Time',
                'offset' => '+12.00',
            ],
            [
                'iso' => 'Pacific/Honolulu',
                'label' => 'Hawaii Standard Time',
                'offset' => '-10.00',
            ],
        ];
    }
}
