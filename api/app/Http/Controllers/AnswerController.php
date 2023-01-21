<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;

class AnswerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $data = Answer::all();
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function store(Request $request)
    {
        

        $data= Answer::create([
            'question_id' => $request->question_id,
            'code' => $request->code,
            'answer' => $request->answer,
            'score' => $request->score,
            'status' => $request->status,
            'kind' => $request->kind,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Answer created successfully',
            'data' => $data
        ]);
    }

    public function show($id)
    {
        $data= Answer::find($id);
        return response()->json([
            'status' => 'success',
            'data' => $data,
            
        ]);
    }

    public function update(Request $request, $id)
    {
       

        $data= Answer::find($id);
        $data->question_id = $request->question_id;
        $data->code = $request->code;
        $data->answer = $request->answer;
        $data->score = $request->score;
        $data->status = $request->status;
        $data->kind = $request->kind;
        $data->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Answer updated successfully',
            'data' => $data
        ]);
    }

    public function destroy($id)
    {
        $data= Answer::find($id);
        $data->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Answer deleted successfully',
            'data' => $data
        ]);
    }
}
