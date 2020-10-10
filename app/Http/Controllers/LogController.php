<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;

class LogController extends Controller
{
    public function getAll()
    {
        try
        {
            $logs = Log::all();

            return response()->json([
                'success' => true,
                'message' => trans('message.update_order'),
                'data' => $logs
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => trans('message.error_getAll_log'),
                'error_message' => $e->getMessage()
            ]);
        }
    }
}
