<!doctype html>
<html lang="ar" dir="rtl">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">

    <title>Starter_edit</title>
  </head>
  <body>
   <div class="container">
    <a href="{{ url('/') }}" class="btn btn-primary my-3">Show data</a>
      {{-- @if ($errors->any())
        <div class="alert alert-danger ">
            <ul>
                @foreach ($errors-all() as $error )
                <li>{{ $error }}</li>

                @endforeach
            </ul>

        </div>
      @endif --}}
      {{-- @if(Session::has('msg'))
        <p class="alert alert-success ">{{ Session::get('msg') }}</p>
      @endif --}}
     <form action="{{ url('/update-data/'.$editData->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" name="name" value={{ $editData->name }} placeholder="Enter your name">
            @error('name')
              <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="text" class="form-control" name="email"  value={{ $editData->email }} placeholder="Enter your email">
            @error('email')
            <span class="text-danger">{{ $message }}</span>
          @enderror
          {{-- <input type="hidden" name="page" value="{{ $editData->page }}"> --}}
          <input type="hidden" name="page" value="{{ $page }}">


        <input type="submit" class="btn btn-primary " value="Submit">
     </form>
   </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>



  </body>
</html>
