<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\IndividualProcess;

class IndividualProcessController extends Controller
{
    /**
     * Process the individual requests
     */
    public function index(Request $request) {
        // Process the request in the queues
        IndividualProcess::dispatch($request->toArray());
    }
}
