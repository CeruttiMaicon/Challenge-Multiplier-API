<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'value',
        'category_id'
    ];

    public function category()
    {
        return $this->hasOne('App\Models\Category');
    }

    public function store($request)
    {
        try {

            $product = new Product;

            return $this->make($product, $request);

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

            $product = new Product;

            if($request->id != null)
            {
                $product = $product->findOrFail($request->id);
            }

            return $this->make($product, $request);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message_error' => trans('message.error_update_product'),
                'message' => $e->getMessage()
            ]);
        }
    }

    private function make(Product $product, $request)
    {
        try
        {
            $product->name = $request->name;
            $product->value = $request->value;
            $product->category_id = $request->category_id;
            $product->save();

            return $product;

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message_error' => trans('message.error_make_product'),
                'message' => $e->getMessage()
            ]);
        }
    }

    public function get($id)
    {
        try {
            $product = new Product;

            return $product->findOrFail($id)
            ->join('categories', 'products.category_id', 'categories.id')
            ->select('products.*', 'categories.name as category_name')->first();

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function getAll()
    {
        try {
            $product = new Product;

            return  $product
            ->join('categories', 'products.category_id', 'categories.id')
            ->select('products.*', 'categories.name as category_name')->get();

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}
