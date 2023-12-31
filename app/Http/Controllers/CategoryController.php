<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\Category as CategoryTable;
use App\Http\Resources\Category as CategoryResource;
use App\Models\Book;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $categories = CategoryTable::all();
            $arr = [
                'status' => true,
                'message' => 'list categories',
                'data' => CategoryResource::collection($categories)
            ];
            return response()->json($arr, 200);
        } catch (\Exception $err) {
            $arr = [
                'success' => false,
                'message' => 'Something went wrongr',
                'error' => $err
            ];
            return response()->json($arr, 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $input = $request->all();
            $validator = Validator::make($input, [
                'categoryName' => 'required|unique:categories'
            ]);
            if ($validator->fails()) {
                $arr = [
                    'success' => false,
                    'message' => 'Error from validator',
                    'data' => $validator->errors()
                ];
                return response()->json($arr, 400);
            }

            $category = CategoryTable::create($input);
            $arr = [
                'status' => true,
                'message' => 'Category save successfully',
                'data' => new CategoryResource($category)
            ];
            return response()->json($arr, 201);
        } catch (\Exception $err) {
            $arr = [
                'success' => false,
                'message' => 'Something went wrongr',
                'error' => $err
            ];
            return response()->json($arr, 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $getCategory = CategoryTable::find($id);
            if (is_null($getCategory)) {
                $arr = [
                    'success' => false,
                    'message' => 'Category not found',
                    'data' => []
                ];
                return response()->json($arr, 404);
            }

            $arr = [
                'status' => true,
                'message' => 'Get category succeed',
                'data' => new CategoryResource($getCategory)
            ];
            return response()->json($arr, 201);
        } catch (\Exception $err) {
            $arr = [
                'success' => false,
                'message' => 'Something went wrongr',
                'error' => $err
            ];
            return response()->json($arr, 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            // get data from input
            $input = $request->all();
            // validation data
            $validator = Validator::make($input, [
                'categoryName' => 'required'
            ]);
            //check data
            if ($validator->fails()) {
                $arr = [
                    'success' => false,
                    'message' => 'Error from validator',
                    'data' => $validator->errors()
                ];
                return response()->json($arr, 400);
            }

            $data = CategoryTable::find($id);
            if (is_null($data)) {
                $arr = [
                    'success' => false,
                    'message' => 'Category not found',
                    'data' => []
                ];
                return response()->json($arr, 404);
            }

            $data->update($input);

            $arr = [
                'status' => true,
                'message' => 'Update category successfully',
                'data' => new CategoryResource($data)
            ];
            return response()->json($arr, 200);
        } catch (\Exception $err) {
            $arr = [
                'success' => false,
                'message' => 'Something went wrongr',
                'error' => $err
            ];
            return response()->json($arr, 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $category = CategoryTable::find($id);
            if (!$category) {
                $arr = [
                    'success' => false,
                    'message' => 'Category not found',
                    'data' => []
                ];
                return response()->json($arr, 404);
            }
            Book::where('category_id', $id)->delete();

            $category->delete();
            $arr = [
                'status' => true,
                'message' => 'Delete succeed'
            ];
            return response()->json($arr, 201);
        } catch (\Exception $err) {
            $arr = [
                'success' => false,
                'message' => 'Something went wrong',
                'error' => $err
            ];
            return response()->json($arr, 500);
        }
    }
}
