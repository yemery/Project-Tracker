<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Project;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // dd(gettype(Project::get(['id'])) );
        // dd(Project::pluck('id'));

        // App\Models\Project::find($task->project_id)->title
        // $projectNameOfTask=Project::where();
        // foreach ($tasks as $task) {
            
        //     $projectName=Project::where('id',$task->)
        //     $tasks::where('project_id',$task->project_id)->update(['project_id']);
            
        // };
       
        

        $daysLeft=1;
        
        return view('Task.index',[
            'tasks'=>Task::orderBy('id', 'desc')->simplePaginate(7),
        ]);
    }
     


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function create()
    {
        $projectNames=Project::get();
        return view('Task.create',['pNames'=>$projectNames]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTaskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskRequest $request)
    {
        Task::create([
            'title' => $request->title,
            'created_at' => Carbon::now(),
            'priority' => $request->priority,
            'deadline' => $request->deadline,
             "updated_at"=>Carbon::now(),
            'project_id'=>$request->project_id,
        ]);
        return to_route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('Task.show', [
            'task' => Task::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return view('Task.edit',['task'=>$task,'pNames'=>$projectNames=Project::get()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTaskRequest  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTaskRequest $request,$id)
    {
        // Task::find($task->id)->update(['title' => $request->title]);
        Task::find($id)->update([
            'title' => $request->title,
            'priority'=> $request->priority,
            'is_completed'=>$request->is_completed,
            'deadline'=>$request->deadline,
            'project_id'=>$request->project_id,
            'updated_at'=>Carbon::now()
        ]
        );

        return to_route('tasks.index');
        // dd($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return to_route('tasks.index');
    }
}
