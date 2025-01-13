<!doctype html>
<html lang="ar" dir="rtl">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">

    <title>Starter</title>
  </head>
  <body>
   <div class="container">
    <a href="{{ url('/add-data') }}" class="btn btn-primary my-3">Add data</a>
    @if(Session::has('msg'))
    <p class="alert alert-success ">{{ Session::get('msg') }}</p>
    @endif
    <table class="table table-bordered ">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>

          </tr>
        </thead>
        <tbody>
            @foreach ($showdata as $key=>$data )
            <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->email }}</td>
                <td>
                    <a href="{{ url('/edit-data/'.$data->id) }}" class="btn btn-success ">Edit</a>
                    <a href="{{ url('/delete-data/'.$data->id) }}"  onclick= "return confirm('are you sure to delete it?') " class="btn btn-danger ">Delete</a>
                </td>
            </tr>

            @endforeach


        </tbody>
      </table>
      {{ $showdata->links('pagination::bootstrap-5') }}
   </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>



  </body>
</html>
