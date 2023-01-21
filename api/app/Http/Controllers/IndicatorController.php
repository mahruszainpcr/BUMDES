<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Indicator;

class IndicatorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $data = Indicator::all();
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function store(Request $request)
    {
        

        $data= Indicator::create([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Indicator created successfully',
            'data' => $data
        ]);
    }

    public function show($id)
    {
        $data= Indicator::find($id);
        return response()->json([
            'status' => 'success',
            'data' => $data,
            
        ]);
    }

    public function update(Request $request, $id)
    {
       

        $data= Indicator::find($id);
        $data->name = $request->name;
        $data->category_id = $request->category_id;
        $data->description = $request->description;
        $data->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Indicator updated successfully',
            'data' => $data
        ]);
    }

    public function destroy($id)
    {
        $data= Indicator::find($id);
        $data->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Indicator deleted successfully',
            'data' => $data
        ]);
    }
}
