<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequestOrder;
use App\Models\Order;


class OrderController extends Controller
{
    public function store(RequestOrder $request)
    {
        try
        {
            $order = new Order;
            $order = $order->store($request);

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
            $order = $order->edit($request);

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

            $order = $order->findOrFail($id);

            $value_total = 0;
            $quantity_total = 0;

            foreach ($order->products as $product)
            {
                $value_total += $product->pivot->value * $product->pivot->quantity;
                $quantity_total += $product->pivot->quantity;
                $product->pivot->sub_total = $product->pivot->value * $product->pivot->quantity;
            }

            $order->value_total = $value_total;
            $order->quantity_total = $quantity_total;

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
