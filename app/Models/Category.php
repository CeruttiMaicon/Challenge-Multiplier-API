<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    public function store($request)
    {
        try {

            $category = new Category;

            $category->name = $request->name;
            $category->save();

            return $category;

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message_error' => trans('error.register_category'),
                'message' => $e->getMessage()
            ]);
        }
    }

    public function att($request)
    {
        try {

            $category = new Category;

            if($request->id != null)
            {
                $category = $category->findOrFail($request->id);
            }

            $category->name = $request->name;
            $category->save();

            return $category;

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message_error' => trans('error.register_category'),
                'message' => $e->getMessage()
            ]);
        }
    }
}
