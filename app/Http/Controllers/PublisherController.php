<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publisher as PublisherTable;
use App\Http\Resources\Publisher as PublisherResource;

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
                'message' => 'Error from server',
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        //
    }
}
