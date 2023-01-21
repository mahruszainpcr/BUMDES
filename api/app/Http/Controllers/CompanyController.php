<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $data = Company::all();
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function store(Request $request)
    {
       
        $data = Company::create([
            'alias' => $request->alias,
            'company_name' => $request->company_name,
        ]);
        if(empty($data)){
            return response()->json([
                'status' => 'error',
                'message' => 'Data gagal'
            ]);
        }else{
            return response()->json([
                'status' => 'success',
                'message' => 'Company created successfully',
                'data' => $data,
            ]);
        }
        
    }

    public function show($id)
    {
        $data = Company::find($id);
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = Company::find($id);
        $data->company_name = $request->company_name;
        $data->alias = $request->alias;
        $data->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Company updated successfully',
            'data' => $data,
        ]);
    }

    public function destroy($id)
    {
        $data = Company::find($id);
        $data->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Company deleted successfully',
            'data' => $data,
        ]);
    }
}
