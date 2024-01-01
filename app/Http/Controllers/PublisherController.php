<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publisher as PublisherTable;
use App\Http\Resources\Publisher as PublisherResource;
use App\Models\Book;
use Illuminate\Support\Facades\Validator;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data = PublisherTable::all();
            $res = [
                'success' => true,
                'message' => 'List Publisher',
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
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'publisherName' => 'required',
                'contact' => 'required',

            ]);

            if ($validator->fails()) {
                $res = [
                    'success' => false,
                    'message' => 'Error from validator',
                    'error' => $validator->errors(),
                ];
                return response()->json($res, 400);
            }

            $publisher = PublisherTable::create([
                'publisherName' => $request->input('publisherName'),
                'contact' => $request->input('contact'),

            ]);

            $res = [
                'status' => true,
                'message' => 'Create publisher successfully',
                'data' => new PublisherResource($publisher),
            ];

            return response()->json($res, 200);
        } catch (\Exception $err) {
            $res = [
                'success' => false,
                'message' => 'Something went wrongr',
                'err' => $err
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
            $publisher = PublisherTable::find($id);
            if (is_null($publisher)) {
                $res = [
                    'success' => false,
                    'message' => 'Publisher not found',
                    'data' => []
                ];
                return response()->json($res, 404);
            }

            $res = [
                'status' => true,
                'message' => 'Get publisher successfully',
                'data' => new PublisherResource($publisher)
            ];
            return response()->json($res, 201);
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
            $input = $request->all();
           
            $publisher = PublisherTable::find($id);
            if (is_null($publisher)) {
                $res = [
                    'success' => false,
                    'message' => 'Publisher not found',
                    'data' => []
                ];
                return response()->json($res, 404);
            }
            $publisher->update($input);
            $res = [
                'status' => true,
                'message' => 'Update publisher successfully',
                'data' => new PublisherResource($publisher)
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
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $publisher = PublisherTable::find($id);
            if (is_null($publisher)) {
                $res = [
                    'success' => false,
                    'message' => 'Publisher not found',
                    'data' => []
                ];
                return response()->json($res, 404);
            }
            Book::where('publisher_id', $id)->delete();
            $publisher->delete();
            $res = [
                'status' => true,
                'message' => 'Delete publisher successfully'
            ];
            return response()->json($res, 201);
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
