<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Traits\UserProcessFillable;
use App\Models\User;

class IndividualProcess implements ShouldQueue
{
    use Queueable, UserProcessFillable;

    public $data;
    protected $fillable;
    public $tries = 3; // If fail, try again for 3 times
    public $backoff = 10; // Seconds, to wait befre to retry the failed jobs

    /**
     * Create a new job instance.
     */
    public function __construct(array $request)
    {
        $this->data = $request;
        $this->fillable = $this->userFillable(); // Get user valid fillable
    }

    /**
     * Handle the individual process
     */
    public function handle(): void
    {
        $user = User::where('email', $this->data['email'])->first();
        
        // Process only if user found
        if ($user) {
            // Filter and allow field to be updated if it's in the user fillable
            $user->update(
                collect($this->data)->filter(function($value, $field) {
                    // return only the fields that has value
                    if ($value) {
                        return $this->fillable->contains($field);
                    }
                })->toArray()
            );
        }
    }
}
