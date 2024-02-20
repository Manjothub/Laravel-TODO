<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TODO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">TODO</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="btn btn-danger" href="{{ route ('logout') }}">Logout</a>
                </li>
            </ul>
        </div>        
        </div>
      </nav>
      @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif  
<div class="d-flex justify-content-center mt-5">
    <div class="card shadow">
        <div class="card-body">
    <form action="{{ route('update', $todo->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $todo->id }}">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Task Name</label>
            <input type="text" class="form-control" name="task_name" value="{{ $todo->task_name }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Task Description</label>
            <input type="text" class="form-control" name="task_desc" value="{{ $todo->task_desc }}">
        </div>
        <div class="mb-3">
            <label for="taskStatus" class="form-label">Task Status</label>
            <select class="form-select" name = "task_status" value = "{{ $todo->task_status }}">
              <option value="pending">Pending</option>
              <option value="completed">Completed</option>
            </select>
          </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
        </div>
    </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>