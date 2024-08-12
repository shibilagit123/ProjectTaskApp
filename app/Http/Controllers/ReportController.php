<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Project;
Use App\Models\Time;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {  
        $title_name ="Project wise Report";
        $projects =Project::get();
       return view('project-report', compact('title_name','projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function searchbyproject(Request $request)
    {
         $project =Time::where('project_id',$request->pid)->with('project')->with('task')->get();
         $ajax['time']=$project;
         echo json_encode($ajax);
    }
    
}
