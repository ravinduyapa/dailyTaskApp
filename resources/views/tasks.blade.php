<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Daily Tasks</title>
</head>
<body>
    <div class="container">
        <div class="text-center">
            <h1>Daily Task</h1>

            <div class="col-md-12 text-center">

                @foreach($errors->all() as $error)
                <div class="alert alert-danger" role="alert">{{$error}}</div>
                @endforeach

                <form action="saveTask" method="post">
                   
                    @csrf
                    <input type="text" class="form-control" placeholder="Enter your Task Here" name="task"><br>
                    <input type="submit" class="btn btn-primary" value="SAVE">
                    <input type="button" class="btn btn-warning" value="CLEAR">
                </form>           
                <br>
                <br>

                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Task</th>
                            <th>Completed</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach($tasks as $task)
                        <tr>
                            <td>{{$task->id}}</td>
                            <td>{{$task->task}}</td>
                            <td>
                                @if($task->isCompleted)
                                <button class="btn btn-success">Completed</button>
                                @else
                                <button class="btn btn-warning">Not Completed</button>
                                @endif
                            </td>
                            <td>
                                @if(!$task->isCompleted)
                              <a href="/markascompleted/{{ $task->id }}" class="btn btn-primary">Mark as Completed</a>
                              @else
                              <a href="/markasnotcompleted/{{ $task->id }}" class="btn btn-danger">Mark as Not Completed</a>
                              @endif
                                
                              <a href="/deletetask/{{ $task->id }}" class="btn btn-warning">Delete</a>

                              <a href="/updatetask/{{ $task->id }}" class="btn btn-success">Update</a>

                            </td>
                        </tr>
                    @endforeach    
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
