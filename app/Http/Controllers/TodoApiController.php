<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTodoRequest;
use App\Http\Resources\TodoResource;
use App\Models\Todo;
use Illuminate\Http\Response;

class TodoApiController extends Controller
{
    public function index(): \Illuminate\Http\Resources\Json\ResourceCollection
    {
        $todos = Todo::with('user')->get();

        return TodoResource::collection($todos);
    }

    public function show(string $todo): \Illuminate\Http\Resources\Json\JsonResource
    {
        return new TodoResource(Todo::findOrFail($todo));
    }

    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
    {
        return view('todos.create');
    }

    public function store(StoreTodoRequest $request): \Illuminate\Http\Resources\Json\JsonResource
    {
        $todo = Todo::create($request->all());

        return new TodoResource($todo);
    }

    public function update(string $todo, StoreTodoRequest $request): \Illuminate\Http\Resources\Json\JsonResource
    {
        $todo = Todo::findOrFail($todo);
        $todo->update($request->all());

        return new TodoResource($todo);
    }

    // TODO: fix phpstan return error
    public function destroy(string $todo)
    {
        $todo = Todo::findOrFail($todo);
        $todo->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
