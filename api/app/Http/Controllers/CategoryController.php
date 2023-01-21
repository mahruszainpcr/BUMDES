<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $data = Category::all();
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $categorie = Category::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Category created successfully',
            'categorie' => $categorie,
        ]);
    }

    public function show($id)
    {
        $categorie = Category::find($id);
        return response()->json([
            'status' => 'success',
            'categorie' => $categorie,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $categorie = Category::find($id);
        $categorie->name = $request->name;
        $categorie->description = $request->description;
        $categorie->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Category updated successfully',
            'categorie' => $categorie,
        ]);
    }

    public function destroy($id)
    {
        $categorie = Category::find($id);
        $categorie->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Category deleted successfully',
            'categorie' => $categorie,
        ]);
    }
}
