<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PosBook;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $book = PosBook::all();
        return response()->json($book);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'isbn' => 'required|string|max:13',
                'name' => 'required|string|max:100',
                'stock' => 'required|integer',
                'current_price' => 'required|numeric|between:0,999.99',
            ]);

            $book = PosBook::create($request->all());
            return response()->json($book, 201);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    public function show($id)
    {
        $book = PosBook::findOrFail($id);
        return response()->json($book);
    }

    public function update(Request $request, $id)
    {
        $book = PosBook::findOrFail($id);
        $book->update($request->all());
        return response()->json($book);
    }

    public function destroy($id)
    {
        $book = PosBook::findOrFail($id);
        $book->delete();
        return response()->json(null, 204);
    }
}
