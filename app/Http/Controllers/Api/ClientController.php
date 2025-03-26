<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PosClient;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $client = PosClient::all();
        return response()->json($client);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'doc_type' => 'required|integer',
                'doc_number' => 'required|string|max:20',
                'first_name' => 'required|string|max:50',
                'last_name' => 'required|string|max:50',
                'phone' => 'required|regex:/^\d{9}$/',
                'email' => 'required|email',
            ]);

            $client = PosClient::create($request->all());
            return response()->json($client, 201);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    public function show($id)
    {
        $client = PosClient::findOrFail($id);
        return response()->json($client);
    }

    public function update(Request $request, $id)
    {
        $client = PosClient::findOrFail($id);
        $client->update($request->all());
        return response()->json($client);
    }

    public function destroy($id)
    {
        $client = PosClient::findOrFail($id);
        $client->delete();
        return response()->json(null, 204);
    }
}
