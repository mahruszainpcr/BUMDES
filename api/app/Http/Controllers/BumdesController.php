<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bumdes;
use Illuminate\Support\Facades\Crypt;

class BumdesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $categories = Bumdes::all();
        return response()->json([
            'status' => 'success',
            'categories' => $categories,
        ]);
    }

    public function show($id)
    {
        $id=Crypt::decrypt($id);
        $bumdes = Bumdes::where('user_id',$id)->first();
        return response()->json([
            'status' => 'success',
            'data' => $bumdes,
        ]);
    }

    public function update(Request $request, $id)
    {
        $id=Crypt::decrypt($id);
        $bumdes = Bumdes::where('user_id',$id)->first();
        if(!empty($bumdes)){
            $bumdes->bumdes_name = (empty($request->bumdes_name))?$bumdes->bumdes_name:$request->bumdes_name;
            $bumdes->address = (empty($request->address))?$bumdes->address:$request->address;
            $bumdes->since = (empty($request->since))?$bumdes->since:$request->since;
            $bumdes->vision = (empty($request->vision)) ? $bumdes->vision :$request->vision;
            $bumdes->mision = (empty($request->mision)) ? $bumdes->mision :$request->mision;
            $bumdes->number_of_employee = (empty($request->number_of_employee)) ? $bumdes->number_of_employee :$request->number_of_employee;;
            $bumdes->province = (empty($request->province))?$bumdes->province:$request->province;
            $bumdes->city = (empty($request->city))?$bumdes->city:$request->city;
            $bumdes->postal_code = (empty($request->postal_code))?$bumdes->postal_code:$request->postal_code;
            $bumdes->save();
            return response()->json([
                'status' => 'success',
                'message' => 'Bumdes updated successfully',
                'data' => $bumdes,
            ]);
        }else{
            return response()->json([
                'status' => 'errpr',
                'message' => 'Data belum terdaftar',
            ]);
        }
        

        
    }

    public function destroy($id)
    {
        $categorie = Bumdes::find($id);
        $categorie->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Bumdes deleted successfully',
            'categorie' => $categorie,
        ]);
    }
}
