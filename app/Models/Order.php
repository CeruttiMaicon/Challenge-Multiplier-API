<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'value_total',
        'description',
    ];

    public function products()
    {
        return $this->belongsToMany('App\Models\Product')->withPivot('value', 'quantity')->withTimestamps();
    }

    public function store($request)
    {
        try {

            $order = new Order;

            return $this->make($order, $request);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message_error' => trans('message.error_register_product'),
                'message' => $e->getMessage()
            ]);
        }
    }

    public function edit($request)
    {
        try {

            $order = new Order;

            if($request->id != null)
            {
                $order = $order->findOrFail($request->id);
            }

            return $this->make($order, $request);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message_error' => trans('message.error_update_order'),
                'message' => $e->getMessage()
            ]);
        }
    }

    private function make(Order $order, $request)
    {
        try
        {
            $order->user_id = $request->user_id;
            $dataSync = $this->formatValuesSync($request->products, $request->quantity);

            $order->total = $dataSync['total'];
            $order->save();

            $order->products()->sync($dataSync['data']);
            $order->products;

            return $order;

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message_error' => trans('message.error_make_order'),
                'message' => $e->getMessage()
            ]);
        }
    }

    private function formatValuesSync($productsIds, $quantitys)
    {
        try {
            $dataSync = [];

            $total = 0;
            foreach ($productsIds as $key => $id)
            {
                $product = Product::find($id);

                $total += $product->value * $quantitys[$key];

                $dataSync[$id] = [
                    'value' => $product->value,
                    'quantity' => $quantitys[$key],
                ];
            }

            return [
                'data' => $dataSync,
                'total' => $total
            ];

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}
