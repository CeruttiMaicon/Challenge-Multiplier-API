<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Category;

class CategoryController extends Controller
{
    public function save(Request $request)
    {
        try
        {
            dd($request);
            $category = new Category;
            $category->name =
            return response()->json([
                'success' => true,
                'message' =>
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}
