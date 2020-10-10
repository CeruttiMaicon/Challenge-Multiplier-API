<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequestOrder;
use App\Models\Order;
use Illuminate\Support\Facades\Log;


class OrderController extends Controller
{
    public function store(RequestOrder $request)
    {
        try
        {
            $order = new Order;
            $order = $order->store($request);

            Log::channel('mysql')->info('O usuário ' . \Auth::user()->name . ' [' . \Auth::user()->email . ']' .  ' criou o pedido ' . $order->id, [$order->toJson()]);

            return response()->json([
                'success' => true,
                'message' => trans('message.store_order'),
                'data' => $order
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => trans('message.error_store_order'),
                'error_message' => $e->getMessage()
            ]);
        }
    }

    public function update(RequestOrder $request)
    {
        try
        {
            $order = new Order;
            $old_order = $order->findOrFail($request->id);
            $order = $order->edit($request);

            Log::channel('mysql')->info('O usuário ' . \Auth::user()->name . ' [' . \Auth::user()->email . ']' . ' atualizou o pedido ' . $order->id, ['new' => $order->toJson(), 'old' => $old_order->toJson()]);

            return response()->json([
                'success' => true,
                'message' => trans('message.update_order'),
                'data' => $order
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => trans('message.error_update_order'),
                'error_message' => $e->getMessage()
            ]);
        }
    }

    public function get($id)
    {
        try {
            $order = new Order;

            $order = $order->get($id);

            return response()->json([
                'success' => true,
                'data' => $order
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => trans('message.error_get_order'),
                'error_message' => $e->getMessage()
            ],404);
        }
    }

    public function getAll()
    {
        try {
            $order = new Order;
            $orders = $order->all();

            return response()->json([
                'success' => true,
                'data' => $orders
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => trans('message.error_getAll_order'),
                'error_message' => $e->getMessage()
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $order = new Order;

            $order = $order->findOrFail($id);

            Order::destroy($id);

            Log::channel('mysql')->info('O usuário ' . \Auth::user()->name . ' [' . \Auth::user()->email . ']' . ' deletou o pedido ' . $order->id, [$order->toJson()]);

            return response()->json([
                'success' => true,
                'message' => trans('message.destroy_order'),
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => trans('message.error_destroy_order'),
                'error_message' => $e->getMessage()
            ], 200);
        }
    }
}
