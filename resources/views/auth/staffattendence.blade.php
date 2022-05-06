<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('#flexCheckDefault').click(function(event){
            if(this.checked){
                $(':checkbox').each(function(){
                    this.checked=true;
                });
            }
            else{
                $(':checkbox').each(function(){
                    this.checked=false;
                });
            }
        });
    });
</script>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Staff Attendence</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{URL('/home')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{URL('/attendenceList')}}">Attendence List  </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<form  action="/staff-present" method="POST">
  @csrf
<div class="form-check mt-3" class="row justify-content-center">
  <label for="html">Select Date: </label>
  <input type="date" name="date" id="date" value="date">
 
</div>
<table class="table table-striped table-bordered mx-auto mt-4" style="width:900px">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Category</th>
        <th>Mark</th>
    </tr>
    @if(isset($data))
    @foreach($data as $value)
        <tr>
            <td>{{$value->id}}</td>
            <td>{{$value->name}}</td>
            <td>{{$value->category}}</td>
            <input type="hidden" id="scales.{{$value->id}}" name="present[]" value="{{$value->id}}">
            <td><input type="checkbox" id="scales.{{$value->id}}" name="present[]" value="{{$value->id}}"></td>
        </tr>
    @endforeach
      
</table>
<div class="text-center">
<button type="submit" id="present" class="btn btn-success">Submit</button>
</form>
</div>
@endif