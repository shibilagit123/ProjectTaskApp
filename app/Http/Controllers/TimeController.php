<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Project;
Use App\Models\Task;
Use App\Models\Time;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class TimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title_name ="Add Time";
        $projects =Project::get();
        $tasks =Task::get();
        $time =Time::with('project')->with('task')->get();
        return view('add-time',compact('title_name','projects','tasks','time'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    

        $rules = [
             'project_id'=>'required',
            'task_id'=>'required',
            'description'=>'required',
            'hours'=>'required',
        ];
        $validation =Validator::make($request->all(), $rules);
         if($validation->fails())
        {
            $errors = $validation->errors();
            $ajax['status'] = "error";
            $ajax['msg'] = $errors->all()[0];
        }
        else
        {
             $arr = $request->except('_token');

          $id = Time::create([
                'project_id'=>$request->project_id,
                'task_id'=>$request->task_id,
                'hours'=>$request->hours,
                'date'=>Carbon::createFromFormat('d/m/Y',$request->date),
                'description'=>$request->description,]);

            $ajax['status'] = "success";
            $ajax['id'] = $id;
            $ajax['msg'] = 'Time  has been created';

        }

        echo json_encode($ajax);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
