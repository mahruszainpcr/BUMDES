<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $data = Question::all();
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function store(Request $request)
    {
       

        $data= Question::create([
            'perspective_id' => $request->perspective_id,
            'description' => $request->description,
            'status' => $request->status,
            'question' => $request->question,
            'kind' => $request->kind,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Question created successfully',
            'data' => $data
        ]);
    }

    public function show($id)
    {
        $data= Question::find($id);
        return response()->json([
            'status' => 'success',
            'data' => $data,
            
        ]);
    }

    public function update(Request $request, $id)
    {
        

        $data= Question::find($id);
        $data->perspective_id = $request->perspective_id;
        $data->status = $request->status;
        $data->description = $request->description;
        $data->question = $request->question;
        $data->kind = $request->kind;
        $data->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Question updated successfully',
            'data' => $data
        ]);
    }

    public function destroy($id)
    {
        $data= Question::find($id);
        $data->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Question deleted successfully',
            'data' => $data
        ]);
    }
}
