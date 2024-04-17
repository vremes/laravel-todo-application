<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Hard limit for todos per user.
     */
    protected const TODOS_LIMIT = 50;

    /**
     * Creates a todo.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function create(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'min:1', 'max:255'],
            'description' => ['nullable'],
        ]);

        $userId = auth()->id();

        $currentTodosAmount = Todo::where('user_id', $userId)->count();

        if ($currentTodosAmount >= self::TODOS_LIMIT) {
            return back()->withErrors([
                __('You have added the maximum amount of todos.'),
            ]);
        }

        Todo::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'user_id' => $userId,
        ]);

        return redirect()->back()->with('message-success', __('Todo created successfully.'));
    }

    /**
     * Deletes todo.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function delete(Request $request, ?string $id): RedirectResponse
    {
        $todo = Todo::find($id);

        if ($todo === null) {
            return redirect()->back();
        }

        $userId = auth()->id();
        $todoUserId = $todo->getAttribute('user_id');

        if ($userId !== $todoUserId) {
            return redirect()->back();
        }

        if ($todo->delete() === false) {
            return redirect()->back()->withErrors([
                __('Todo deletion failed.'),
            ]);
        }

        return redirect()->back()->with('message-success', __('Todo deleted successfully.'));
    }
}
