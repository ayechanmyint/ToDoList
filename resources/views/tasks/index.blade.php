@extends('layouts.app')
@section('content')

<div class="col-6">
<div class="panel-body">

        <!-- New Task Form -->
        <form action="{{route('task.store')}}" method="POST" class="form-horizontal">
            @csrf

            <!-- Task Name -->
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Task</label>

                <div class="col-sm-6">
                    <input type="text" name="task" id="task-name" class="form-control">
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-plus"></i> Add Task
                    </button>
                </div>
            </div>
        </form>
    </div>

   
   
    <div class="panel panel-default">


            <div class="panel-body">

                    <!-- Table Headings -->
                    <div class="panel-heading">
                    <h6 style="font-weight:bold;">Current Tasks</h6>
                 </div>
            @if(count($tasks) > 0)
            <table class="table  task-table">
                    <!-- Table Body -->
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div><a href="{{url('task/'.$task->id.'/complete')}}"> {{ $task->task }} </a></div>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
            @else
                    <p> - No Data</p>
                    @endif
                </table>

                <div class="panel-heading">
                    <h6 style="font-weight:bold;">Completed Tasks</h6>
                 </div>
                @if(count($completed_tasks) > 0)
                <table class="table  task-table">
                <tbody>               
                    @foreach($completed_tasks as $c_task)
                        <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div><a href="#"> {{ $c_task->task }} </a></div>
                                </td>

                                <td>
                                   <form action="{{route('task.destroy',$c_task->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                   </form>
                                </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p>- No Data</p>
            @endif



            </div>
        </div>
    </div>
   

@endsection


