<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryBu;

class CategoryBuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $categories = CategoryBu::all();
        return response()->json([
            'status' => 'success',
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $categorie = CategoryBu::create([
            'name' => $request->name,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'CategoryBu created successfully',
            'data' => $categorie,
        ]);
    }

    public function show($id)
    {
        $categorie = CategoryBu::find($id);
        return response()->json([
            'status' => 'success',
            'data' => $categorie,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $categorie = CategoryBu::find($id);
        $categorie->name = $request->name;
        $categorie->save();

        return response()->json([
            'status' => 'success',
            'message' => 'CategoryBu updated successfully',
            'data' => $categorie,
        ]);
    }

    public function destroy($id)
    {
        $categorie = CategoryBu::find($id);
        $categorie->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'CategoryBu deleted successfully',
            'categorie' => $categorie,
        ]);
    }
}
