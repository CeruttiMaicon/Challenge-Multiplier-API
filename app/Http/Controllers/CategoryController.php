<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\RequestCategory;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    public function store(RequestCategory $request)
    {
        try
        {
            $category = new Category;
            $category = $category->store($request);

            Log::channel('mysql')->info('O usuário ' . \Auth::user()->name . ' [' . \Auth::user()->email . ']' . ' criou a categoria ' . $category->name, [$category->toJson()]);

            return response()->json([
                'success' => true,
                'message' => trans('message.store_category'),
                'data' => $category
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => trans('message.error_store_category'),
                'error_message' => $e->getMessage()
            ]);
        }
    }

    public function update(RequestCategory $request)
    {
        try
        {
            $category = new Category;
            $old_category = $category->findOrFail($request->id);
            $category = $category->edit($request);

            Log::channel('mysql')->info('O usuário ' . \Auth::user()->name . ' [' . \Auth::user()->email . ']' . ' atualizou a categoria ' . $old_category->name . 'para ' $category->name, ['new' => $category->toJson(), 'old' => $old_category->toJson()]);

            return response()->json([
                'success' => true,
                'message' => trans('message.update_category'),
                'data' => $category
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => trans('message.error_update_category'),
                'error_message' => $e->getMessage()
            ]);
        }
    }

    public function get($id)
    {
        try {
            $category = new Category;

            return response()->json([
                'success' => true,
                'data' => $category->findOrFail($id)
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => trans('message.error_get_category'),
                'error_message' => $e->getMessage()
            ],404);
        }
    }

    public function getAll()
    {
        try {
            $category = new Category;
            $categories = $category->all();

            return response()->json([
                'success' => true,
                'data' => $categories
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => trans('message.error_getAll_category'),
                'error_message' => $e->getMessage()
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $category = new Category;

            $category = $category->findOrFail($id);

            Category::destroy($id);

            Log::channel('mysql')->info('O usuário ' . \Auth::user()->name . ' [' . \Auth::user()->email . ']' . ' deletou a categoria ' . $category->name, [$category->toJson()]);

            return response()->json([
                'success' => true,
                'message' => trans('message.destroy_category'),
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => trans('message.error_destroy_category'),
                'error_message' => $e->getMessage()
            ], 200);
        }
    }
}
