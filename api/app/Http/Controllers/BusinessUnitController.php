<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BusinessUnit;

class BusinessUnitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $data = BusinessUnit::all();
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function store(Request $request)
    {
       

        $data = BusinessUnit::create([
            'bumdes_id' => $request->bumdes_id,
            'category_bu_id' => $request->category_bu_id,
            'name' => $request->name,
            'since' => $request->since,
            'number_of_employee' => $request->number_of_employee,
        ]);
        if(empty($data)){
            return response()->json([
                'status' => 'error',
                'message' => 'Data gagal'
            ]);
        }else{
            return response()->json([
                'status' => 'success',
                'message' => 'BusinessUnit created successfully',
                'data' => $data,
            ]);
        }
        
    }

    public function show($id)
    {
        $data = BusinessUnit::find($id);
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = BusinessUnit::find($id);
        $data->bumdes_id = $request->bumdes_id;
        $data->category_bu_id = $request->category_bu_id;
        $data->name = $request->name;
        $data->since = $request->since;
        $data->number_of_employee = $request->number_of_employee;
        $data->save();

        return response()->json([
            'status' => 'success',
            'message' => 'BusinessUnit updated successfully',
            'data' => $data,
        ]);
    }

    public function destroy($id)
    {
        $data = BusinessUnit::find($id);
        $data->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'BusinessUnit deleted successfully',
            'data' => $data,
        ]);
    }
}
