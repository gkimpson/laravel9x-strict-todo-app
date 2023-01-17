<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTodoRequest;
use App\Http\Resources\TodoResource;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TodoApiController extends Controller
{
    public function index()
    {
        // Todo::factory(10)->create();
        $todos = Todo::all();

        return TodoResource::collection($todos);
    }

    public function show($todo)
    {
        return new TodoResource(Todo::findOrFail($todo));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store(StoreTodoRequest $request)
    {
        $todo = Todo::create($request->all());
        return new TodoResource($todo);
    }

    public function update($todo, StoreTodoRequest $request)
    {
        $todo = Todo::findOrFail($todo);
        $todo->update($request->all());
        return new TodoResource($todo);
    }

    public function destroy($todo)
    {
        $todo = Todo::findOrFail($todo);
        $todo->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }


}
