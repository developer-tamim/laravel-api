<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskResource;

class TaskController extends Controller
{

    //@return \Illuminate\Http\Response
    public function index()
    {
        return TaskResource::collection(Task::all());
    }



    //   @param  \App\Http\Requests\StoreTaskRequest  $request
    //   @return \Illuminate\Http\Response

    public function store(StoreTaskRequest $request)
    {

        // $task = Task::create($request->validate());

        // return TaskResource::make($task);

            $validatedData = $request->validate();

            $task = Task::create($validatedData);

            return TaskResource::make($task);
    }




    //   @param  \App\Models\Task  $task
    //   @return \Illuminate\Http\Response

    public function show(Task $task)
    {
        return TaskResource::make($task);
    }




    //   @param  \App\Http\Requests\UpdateTaskRequest  $request
    //   @param  \App\Models\Task  $task
    //   @return \Illuminate\Http\Response

    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update($request->validate());

        return TaskResource::make($task);
    }



    //  @param  \App\Models\Task  $task

    //  @return \Illuminate\Http\Response


    public function destroy(Task $task)
    {
        $task->delete();

        return response()->noContent();
    }
}
