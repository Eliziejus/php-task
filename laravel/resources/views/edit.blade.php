@extends('layout')

@section('main-content')

<h4 class="pb-3">Edit Task </h4>

<form action="{{route('task.update', $task->id)}}" method="POST">
@csrf
@method('PUT')
  <div class="mb-3">
    <label for="subject" class="form-label">Subject</label>
    <input type="text" class="form-control" id="subject" name="subject" value="{{$task->subject}}">
  </div>
  <div class="mb-3">
    <label for="priority" class="form-label">Priority</label>
    <select name="priority" id="priority" class="form-control">
        @foreach ($priority as $priori)
        <option value="{{$priori['value'] }}" {{$task->priority === $priori['value'] ? 'selected' : ''}}>{{$priori['label']}}</option>
        @endforeach
        
    </select>
    </div>

    <div class="mb-3">
    <label for="date" class="form-label">Date</label>
   <input type="date" id="date" name='date' value="{{$task->date}}">
      
  </div>
    
    <div class="mb-3">
    <label for="status" class="form-label">Status</label>
    <select name="status" id="status" class="form-control">
        @foreach ($statuses as $status)
        <option value="{{$status['value'] }}" {{$task->status === $status['value'] ? 'selected' : ''}} >{{$status['label']}}</option>
        @endforeach
        
    </select>
      
  </div>

  <div class="mb-3">
    <label for="percentCompleted" class="form-label">Percent Completed</label>
    <select name="percentCompleted" id="percentCompleted" class="form-control">
        @foreach ($percentes as $percent)
        <option value="{{$percent['value'] }}" {{$task->percentCompleted === $percent['value'] ? 'selected' : ''}}>{{$percent['label']}}</option>
        @endforeach
        
    </select>
      
  </div>

  
  <button type="submit" class="btn btn-primary">Save</button>
</form>

@endsection