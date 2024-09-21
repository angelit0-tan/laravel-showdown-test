<?php

namespace App\Traits;

use App\Models\User;

trait UserProcessFillable
{
    // Get user fillable
    // But remove the password and email to prevent it from the update
    public function userFillable() {
        $data = collect((new User)->getFillable())->filter(function($data) {
            return $data !== 'password' && $data !== 'email';
        })->flatten();
        
        return $data;
    }
}
