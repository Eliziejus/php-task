
@extends('layout')

@section('main-content')

<h4 class="pb-3">My task </h4>

<table class="table">
<thead>
<tr>
<th>Nr</th>
<th>Subject</th>
<th>Priority</th>
<th>Date</th>
<th>Status</th>
<th>Persent Complated</th>
<th>Modified on</th>
<th>Action</th>
</tr>
</thead>
@foreach ($tasks as $task)
<tr>
<th>{{$task->id}}</th>
<th>{{$task->subject}}</th>
@if ($task->priority === "high")
<th class="float-start rounded-pill bg-danger text-dark text-justify">{{$task->priority}}</th>

@elseif ($task->priority === "medium")
<th class="float-start rounded-pill bg-warning text-dark text-justify">{{$task->priority}}</th>
@else
<th class="float-start rounded-pill bg-success text-dark text-justify">{{$task->priority}}</th>

@endif
<th>{{$task->date}}</th>
<th>{{$task->status}}</th>
@if($task->percentCompleted ==="100%")
<th><div class="progress">
  <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">{{$task->percentCompleted}}</div>
</div></th>
@elseif($task->percentCompleted ==="50%")
<th><div class="progress">
  <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">{{$task->percentCompleted}}</div>
</div></th>
@elseif($task->percentCompleted ==="25%")
<th><div class="progress">
  <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{$task->percentCompleted}}</div>
</div></th>
@else
<th><div class="progress">
  <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">{{$task->percentCompleted}}</div>
</div></th>
@endif

<th>{{$task->updated_at -> diffForHumans()}}</th>
<th><a href="{{route('task.edit', $task->id)}}" class="btn btn-secondary">Edit</a>
<form action="{{route('task.destroy', $task->id)}}" style="display:inline" method="POST">
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger">Delete</button>
</form>
</tr>
@endforeach

</table>

@endsection