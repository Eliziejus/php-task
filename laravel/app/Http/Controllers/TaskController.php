<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::orderBy('id', 'desc')->get();
        return view('home', compact('tasks'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $priority = [
    [
        'label' => 'high',
        'value' => 'high',
    ],
    [
        'label' => 'medium',
        'value' => 'medium',
    ],
    [
        'label' => 'low',
        'value' => 'low',
    ],
];
$statuses = [
    [
        'label' => 'new',
        'value' => 'new',
    ],
    [
        'label' => 'In progress',
        'value' => 'In progress',
    ],
    [
        'label' => 'complate',
        'value' => 'complate',
    ],
];

$percentes = [
    [
        'label' => '0%',
        'value' => '0%',
    ],
    [
        'label' => '25%',
        'value' => '25%',
    ],
    [
        'label' => '50%',
        'value' => '50%',
    ],
    [
        'label' => '100%',
        'value' => '100%',
    ],
];

return view('create', compact('priority', 'statuses', 'percentes'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
    'subject' => 'required',
]);
$task = new Task();
$task->subject = $request->subject;
$task->priority = $request->priority;
$task->date = $request->date;
$task->status = $request->status;
$task->percentCompleted = $request->percentCompleted;
$task->save();
return redirect()->route('home');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);
$priority = [
    [
        'label' => 'high',
        'value' => 'high',
    ],
    [
        'label' => 'medium',
        'value' => 'medium',
    ],
    [
        'label' => 'low',
        'value' => 'low',
    ],
];
$statuses = [
    [
        'label' => 'new',
        'value' => 'new',
    ],
    [
        'label' => 'In progress',
        'value' => 'In progress',
    ],
    [
        'label' => 'complate',
        'value' => 'complate',
    ],
];

$percentes = [
    [
        'label' => '0%',
        'value' => '0%',
    ],
    [
        'label' => '25%',
        'value' => '25%',
    ],
    [
        'label' => '50%',
        'value' => '50%',
    ],
    [
        'label' => '100%',
        'value' => '100%',
    ],
];

return view('edit', compact('task', 'priority', 'statuses', 'percentes', ));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);

$request->validate([
    'subject' => 'required',
]);

$task->subject = $request->subject;
$task->priority = $request->priority;
$task->date = $request->date;
$task->status = $request->status;
$task->percentCompleted = $request->percentCompleted;
$task->save();
return redirect()->route('home');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
    $task->delete();
    return redirect()->route('home');

    }
}
