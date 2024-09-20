<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Faker\Factory as Faker;
use App\TimeZones;

class UserUpdate extends Command
{
    /**
     * Update user details command
     * This will update the user details with random data
     *
     * @var string
     */
    protected $signature = 'app:user-update {id? : Id from User}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $id = $this->argument('id') ?? null;
        $faker = Faker::create();
        $timezone = array_rand(TimeZones::map(), 1); // Automatically select random timezone

        // If there's a user-id found, search for that user
        // Then update with random details
        if ($id) {
            $user = User::findOrFail($id);
            $user->first_name = $faker->firstname();
            $user->last_name = $faker->lastname();
            $user->time_zone = TimeZones::map()[$timezone]['iso'];
            $user->save();
        } else {

            // If no user-id found in the argument
            // Find a random 1 user to update
            $user = User::inRandomOrder()->first();
            $user->first_name = $faker->firstname();
            $user->last_name = $faker->lastname();
            $user->time_zone = TimeZones::map()[$timezone]['iso'];
            $user->save();
        }
    }
}
