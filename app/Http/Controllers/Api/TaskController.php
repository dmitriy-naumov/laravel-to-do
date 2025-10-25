<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Response;

class TaskController extends Controller
{
    // GET /api/tasks
    public function index()
    {
        $tasks = Task::query()->latest('id')->paginate(20);
        return TaskResource::collection($tasks);
    }

    // POST /api/tasks
    public function store(TaskStoreRequest $request)
    {
        $task = Task::create($request->validated());

        return (new TaskResource($task))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    // GET /api/tasks/{task}
    public function show(Task $task)
    {
        return new TaskResource($task);
    }

    // PUT /api/tasks/{task}
    public function update(TaskUpdateRequest $request, Task $task)
    {
        $task->update($request->validated());
        return new TaskResource($task);
    }

    // DELETE /api/tasks/{task}
    public function destroy(Task $task)
    {
        $task->delete();
        return response()->noContent(); // 204
    }
}
