<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorRequest;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data = Author::all();
            $res = [
                'status' => true,
                'message' => 'List Author',
                'data' => $data
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
    public function store(AuthorRequest $request)
    {
        try {
            $imageName = Str::random(32) . "." . $request->image_path->getClientOriginalExtension();
            $author = Author::create([
                'name' => $request->name,
                'introduction' => $request->introduction,
                'image_path' => $imageName
            ]);

            Storage::disk('public')->put($imageName, file_get_contents($request->image_path));

            $res = [
                'status' => true,
                'message' => 'Create author successfully',
                'data' => $author
            ];

            return response()->json($res, 200);
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
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $author = Author::find($id);
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
                'data' => $author
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
    public function update(AuthorRequest $request, string $id)
    {
        try {
            $author = Author::find($id);
            if (!$author) {
                $res = [
                    'success' => false,
                    'message' => 'Author not found!',
                    'data' => []
                ];
                return response()->json($res, 404);
            }

            $author->name = $request->name;
            $author->introduction = $request->introduction;

            if ($request->image_path) {
                $storage = Storage::disk('public');

                if ($storage->exists($author->image_path))
                    $storage->delete($author->image_path);
                $image_name = Str::random(32) . "." . $request->image_path->getClientOriginalExtension();
                $author->image_path = $image_name;

                $storage->put($image_name, file_get_contents($request->image_path));
            }

            $author->save();
            $res = [
                'status' => true,
                'message' => 'Author successfully updated!',
                'data' => $author
            ];
            return response()->json($author, 200);
        } catch (\Exception $err) {
            $arr = [
                'success' => false,
                'message' => 'Something went wrong',
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
            $author = Author::find($id);
            if (is_null($author)) {
                $res = [
                    'success' => false,
                    'message' => 'Author not found',
                    'data' => []
                ];
                return response()->json($res, 404);
            }
            Book::where('author_id', $id)->delete();
            $storage = Storage::disk('public');
            if ($storage->exists($author->image_path))
                $storage->delete($author->image_path);
            Author::destroy($id);
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
