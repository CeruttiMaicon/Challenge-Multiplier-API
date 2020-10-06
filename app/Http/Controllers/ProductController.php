<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\RequestProduct;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function store(RequestProduct $request)
    {
        try
        {
            $product = new Product;
            $product = $product->store($request);

            Log::channel('mysql')->info('O usuário ' . \Auth::user()->name . ' [' . \Auth::user()->email . ']' . ' criou o produto ' . $product->name);

            return response()->json([
                'success' => true,
                'message' => trans('message.store_product'),
                'data' => $product
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => trans('message.error_store_product'),
                'error_message' => $e->getMessage()
            ]);
        }
    }

    public function update(RequestProduct $request)
    {
        try
        {
            $product = new Product;
            $product = $product->edit($request);

            Log::channel('mysql')->info('O usuário ' . \Auth::user()->name . ' [' . \Auth::user()->email . ']' . ' atualizou o produto ' . $product->name);

            return response()->json([
                'success' => true,
                'message' => trans('message.update_product'),
                'data' => $product
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => trans('message.error_update_product'),
                'error_message' => $e->getMessage()
            ]);
        }
    }

    public function get($id)
    {
        try {
            $product = new Product;

            return response()->json([
                'success' => true,
                'data' => $product->findOrFail($id)
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => trans('message.error_get_product'),
                'error_message' => $e->getMessage()
            ],404);
        }
    }

    public function getAll()
    {
        try {
            $product = new Product;
            $products = $product->all();

            return response()->json([
                'success' => true,
                'data' => $products
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => trans('message.error_getAll_product'),
                'error_message' => $e->getMessage()
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $product = new Product;

            $product = $product->findOrFail($id);

            Product::destroy($id);

            Log::channel('mysql')->info('O usuário ' . \Auth::user()->name . ' [' . \Auth::user()->email . ']' . ' deletou o produto ' . $product->name);

            return response()->json([
                'success' => true,
                'message' => trans('message.destroy_product'),
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => trans('message.error_destroy_product'),
                'error_message' => $e->getMessage()
            ], 200);
        }
    }
}
