@extends('layouts.app')

@section('content')

<div class="container">

    @include('partials.messages')

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">Add Task</div>

                <div class="card-body">
                    
                    @include('partials.addTask')

                </div>
            </div>

            <br>

            @if(count($tasks) >= 1)

                <table id="todos">
                      <tr>
                        <th>Serial</th>
                        <th>Name</th>
                        <th>Actions</th>
                      </tr>

                    @if(isset($tasks))
                        @php $i = 1 @endphp
                        @foreach($tasks as $task)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>
                                @if (isset($task->deleted_at))
                                    <del>{{$task->name}}</del>
                                @else
                                    {{$task->name}}
                                @endif</td>
                            <td>
                                
                                @if (!isset($task->deleted_at))
                                    <a href="{{ route('editTask',$task->id) }}" class="edit_icon" title="Edit"><i class="fa fa-edit"></i></a>
                                    <a class="" title="Delete" data-modal-size="modal-md" href="{{route('deleteTask', $task->id)}}">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    @endif

                </table>

            @endif

        </div>
    </div>
</div>
@endsection
