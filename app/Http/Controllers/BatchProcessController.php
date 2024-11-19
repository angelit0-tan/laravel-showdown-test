<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\BatchProcess;

class BatchProcessController extends Controller
{
    /**
     * Process the batch requests
     */
    public function index(Request $request)
    {   
        // Get only the first 1,000 request
        $dataRequest = array_slice($request->all(), 0, 1000);

        // Process the request in the queues
        // Chunk the process by 100, to prevent error for long process
        foreach(array_chunk($dataRequest, 100) as $data) {
            BatchProcess::dispatch($data);
        }
    }
}
