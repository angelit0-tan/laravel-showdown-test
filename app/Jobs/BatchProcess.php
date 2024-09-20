<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Traits\UserProcessFillable;
use App\Models\User;

class BatchProcess implements ShouldQueue
{
    use Queueable, UserProcessFillable;

    public $batchRequests;
    protected $fillable;
    public $tries = 3; // If fail, try again for 3 times
    public $backoff = 10; // Seconds, to wait befre to retry the failed jobs

    /**
     * Create a new job instance.
     */
    public function __construct(array $request)
    {
        $this->batchRequests = $request;
        $this->fillable = $this->userFillable(); // Get user valid fillable
    }

    /**
     * Now we handle the batch process
     */
    public function handle(): void
    {
        foreach($this->batchRequests as $data) {
            $user = User::where('email', $data['email'])->first();

            // Process only if user found
            if ($user) {
                // Filter and allow field to be updated if it's in the user fillable
                $user->update(
                    collect($data)->filter(function($value, $field) {
                        // return only the fields that has value
                        if ($value) {
                            return $this->fillable->contains($field);
                        }
                    })->toArray()
                );
            }
        }
    }
}
