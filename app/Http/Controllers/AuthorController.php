<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author as AuthorTable;
use App\Http\Resources\Author as AuthorResource;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data = AuthorTable::all();
            $res = [
                'status' => true,
                'message' => 'List Author',
                'data' => AuthorResource::collection($data)
            ];
            return response()->json($res, 200);
        } catch (\Exception $err) {
            $res = [
                'success' => false,
                'message' => 'Something went wrongr',
                'error' => $err
            ];
            return response()->json($res, 500);
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
            $rules = [
                'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'name' => 'required|string|max:255',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $res = [
                    'success' => false,
                    'message' => 'Error from validate',
                    'error' => $validator->errors()
                ];
                return response()->json($res, 400);
            }

            $image_path = $request->file('image_path');
            $storedPath = $image_path->move('images', $image_path->getClientOriginalName());
            $authorName = $request->input('name');
            $introduction = $request->input('introduction');

            $author = AuthorTable::create([
                'image_path' => $image_path->getClientOriginalName(),
                'name' => $authorName,
                'introduction' => $introduction
            ]);

            $res = [
                'status' => true,
                'message' => 'Create author successfully',
                'data' => new AuthorResource($author)
            ];

            return response()->json($res, 200);
        } catch (\Exception $err) {
            $res = [
                'success' => false,
                'message' => 'Something went wrongr',
                'error' => $err
            ];
            return response()->json($res, 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $author = AuthorTable::find($id);
            if (is_null($author)) {
                $res = [
                    'success' => false,
                    'message' => 'Author not found',
                    'data' => []
                ];
                return response()->json($res, 404);
            }
            $res = [
                'status' => true,
                'message' => 'get Author Success',
                'data' => new AuthorResource($author)
            ];
            return response($res, 200);
        } catch (\Exception $err) {
            $res = [
                'success' => false,
                'message' => 'Something went wrong',
                'error' => $err
            ];
            return response()->json($res, 500);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $author = AuthorTable::find($id);
            if (is_null($author)) {
                $res = [
                    'success' => false,
                    'message' => 'Author not found',
                    'data' => []
                ];
                return response()->json($res, 404);
            }
            AuthorTable::destroy($id);
            $res = [
                'status' => true,
                'message' => 'Delete author successfully'
            ];
            return response($res, 200);
        } catch (\Exception $err) {
            $res = [
                'success' => false,
                'message' => 'Something went wrongr',
                'error' => $err
            ];

            return response()->json($res, 500);
        }
    }
}
