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
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary position-fixed" style="top: 10%; right: 5px;" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add Task
      </button>    
      @if (session('success'))
      <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
  @endif  
  <!--Add Task Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST" action = "{{ route('savetask') }}">
                @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Task Name</label>
                  <input type="text" class="form-control" name = "task_name">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Task Description</label>
                    <input type="text" class="form-control" name = "task_desc">
                </div>

                <div class="mb-3">
                    <label for="taskStatus" class="form-label">Task Status</label>
                    <select class="form-select" name = "task_status">
                      <option value="pending">Pending</option>
                      <option value="completed">Completed</option>
                    </select>
                  </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
      </div>
    </div>
  </div>

  <table class="table table-bordered" style="margin-top: 100px; margin-left: auto; margin-right: auto;">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Task Name</th>
        <th scope="col">Task Description</th>
        <th scope="col">Task Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($todos as $todo)
        <tr>
            <td>{{ $todo->id }}</td>
            <td>{{ $todo->task_name }}</td>
            <td>{{ $todo->task_desc }}</td>
            <td>{{ $todo->task_status }}</td>
            <td>
              <a class="btn btn-primary" href="{{ route('edit', $todo->id) }}">Edit</a>
              <a class="btn btn-danger" href="{{ route('delete', $todo->id) }}" onclick="return confirm('Are you sure you want to delete this item?')">Delete</a>
          </td>
        </tr>
        @endforeach
    </tbody>
  </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>