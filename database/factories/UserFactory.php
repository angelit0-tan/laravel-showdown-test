<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Timezone;
use App\TimeZones;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // CET, CST, GMT+1
        $timezones = ['Europe/Paris', 'America/Chicago', 'Europe/London']; 
        $timezoneResult = $timezones[array_rand($timezones, 1)];
        // \Log::debug(Timezone::where('iso', $abc)->firstOrFail());
        // $userNames = array_column(TimeZones::map(), 'iso');
        // $key = array_search('Asia/Shanghai', $userNames);
        // if (!is_null($key)) {
        //     \Log::debug(
        //         TimeZones::map()[$key]
        //     );
        // }
        
        return [
            'name' => fake()->name(),
            'firstname' => fake()->firstName(),
            'lastname' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'timezone' => $timezoneResult,
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    // public function unverified(): static
    // {
    //     return $this->state(fn (array $attributes) => [
    //         'email_verified_at' => null,
    //     ]);
    // }
}
