<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;

class PartnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $data = Partner::all();
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function store(Request $request)
    {
       
        $data = Partner::create([
            'bumdes_id' => $request->bumdes_id,
            'company_id' => $request->company_id,
            'form_of_cooperation' => $request->form_of_cooperation,
            'year_of_cooperation' => $request->year_of_cooperation
        ]);
        if(empty($data)){
            return response()->json([
                'status' => 'error',
                'message' => 'Data gagal'
            ]);
        }else{
            return response()->json([
                'status' => 'success',
                'message' => 'Partner created successfully',
                'data' => $data,
            ]);
        }
        
    }

    public function show($id)
    {
        $data = Partner::find($id);
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = Partner::find($id);
        $data->bumdes_id = $request->bumdes_id;
        $data->company_id = $request->company_id;
        $data->form_of_cooperation = $request->form_of_cooperation;
        $data->year_of_cooperation = $request->year_of_cooperation;
        $data->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Partner updated successfully',
            'data' => $data,
        ]);
    }

    public function destroy($id)
    {
        $data = Partner::find($id);
        $data->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Partner deleted successfully',
            'data' => $data,
        ]);
    }
}
