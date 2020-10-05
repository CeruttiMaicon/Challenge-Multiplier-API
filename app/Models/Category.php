<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

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

            return $this->make($category, $request);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message_error' => trans('message.error_register_category'),
                'message' => $e->getMessage()
            ]);
        }
    }

    public function edit($request)
    {
        try {

            $category = new Category;

            if($request->id != null)
            {
                $category = $category->findOrFail($request->id);
            }

            return $this->make($category, $request);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message_error' => trans('message.error_update_category'),
                'message' => $e->getMessage()
            ]);
        }
    }

    private function make(Category $category, $request)
    {
        try
        {
            $category->name = $request->name;
            $category->save();

            return $category;

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message_error' => trans('message.error_make_category'),
                'message' => $e->getMessage()
            ]);
        }
    }
}
