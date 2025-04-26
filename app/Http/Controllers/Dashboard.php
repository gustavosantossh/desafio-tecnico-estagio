<?php

namespace App\Http\Controllers;

use App\Enums\TaskStatusEnum;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Enum;

class Dashboard extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Auth::user()->tasks()->paginate(10);
        return view('dashboard', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $teste = Task::createTask(Auth::user()->id, $request->title, $request->description);

        return redirect()->back();
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

        $task = Task::where('id', $id)->where('user_id', Auth::user()->id)->first();

        if (!$task) return redirect()->back()->with('error', 'Tarefa ou usuário não encontrada!');

        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'status' => ['required', new Enum(TaskStatusEnum::class)]
        ]);

        Task::updateTask($id, $request->title, $request->description, TaskStatusEnum::from($request->status));

        return redirect(route('dashboard.index'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Task::deleteTask($id);
            return redirect()->back()->with('success', 'Tarefa deletada com sucesso');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }

    }
}
