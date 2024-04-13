<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

/**
 * Controller for todos web API.
 */
class TodoApiController extends Controller
{
    /**
     * Creates a todo.
     *
     * @param Request $request
     * @return void
     */
    public function create(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'min:1', 'max:255'],
            'description' => ['nullable'],
        ]);

        $validated['user_id'] = auth()->id();

        $todo = Todo::create($validated);

        $serializedTodo = $todo->makeHidden('user_id')->toArray();

        return response()->json([
            'todo' => $serializedTodo,
        ]);
    }
}
