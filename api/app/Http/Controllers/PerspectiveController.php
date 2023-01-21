<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perspective;

class PerspectiveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $data = Perspective::all();
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

        $data= Perspective::create([
            'name' => $request->name,
            'description' => $request->description,
            'indicator_id' => $request->indicator_id,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Perspective created successfully',
            'data' => $data
        ]);
    }

    public function show($id)
    {
        $data= Perspective::find($id);
        return response()->json([
            'status' => 'success',
            'data' => $data,
            
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $data= Perspective::find($id);
        $data->name = $request->name;
        $data->indicator_id = $request->indicator_id;
        $data->description = $request->description;
        $data->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Perspective updated successfully',
            'data' => $data
        ]);
    }

    public function destroy($id)
    {
        $data= Perspective::find($id);
        $data->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Perspective deleted successfully',
            'data' => $data
        ]);
    }
}
