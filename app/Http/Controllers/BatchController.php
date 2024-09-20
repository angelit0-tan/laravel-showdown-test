<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   
        // Get only the first 1,000 request
        $dataRequest = array_slice($request->all(), 0, 1000);

        // Process in queue
        foreach($dataRequest as $data) {
            $user = User::find(6);
            \Log::debug($data['name']);
            $user->fill(['firstname' => $data['name']]);
            if ($user->isDirty()) {
                \Log::debug('save '. $data['email']);
            }

            // \Log::debug($user);
           // \Log::debug($data['name'] ?? null);
        }

       # \Log::debug($dataRequest);
    }
}
