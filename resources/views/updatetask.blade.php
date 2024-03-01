<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Update Task</title>
</head>
<body>
    <div class="container">
        <br>
        <br>
        <br>

        <form action="{{ url('/updatetasks') }}" method="post">

        @csrf
            <input type="text" class="form-control" name="task" value="{{$taskdata->task}}">
            <input type="hidden" name="id" value="{{$taskdata->id}}">
            <br>
            <br>
            <input type="submit" class="btn btn-warning" value="Update">
            &nbsp;&nbsp;<input type="button" class="btn btn-danger" value="Cancel">
        </form>
    </div>
</body>
</html>