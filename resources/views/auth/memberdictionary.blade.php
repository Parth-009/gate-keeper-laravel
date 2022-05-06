<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Member Directory</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{url('/home')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="{{url('/member-add')}}">Add Member</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<br>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand">Select the wing</a>
    <div id="button" class="collapse navbar-collapse" id="navbarSupportedContent">
    <button type="button" class="btn btn-primary me-1" onclick="window.location='{{ URL('/a-wing-Member'); }}'">Wing-A</button>
    <button type="button" class="btn btn-primary me-1" onclick="window.location='{{ URL('/b-wing-Member'); }}'">Wing-B</button>
    <button type="button" class="btn btn-primary me-1" onclick="window.location='{{ URL('/c-wing-Member'); }}'">Wing-C</button>
    <button type="button" class="btn btn-primary me-1" onclick="window.location='{{ URL('/d-wing-Member'); }}'">Wing-D</button>
    </div>
  </div>
</nav>
@if(isset($data))
<div class="container">
<table class="table table-striped table-bordered mx-auto mt-4" style="width:900px">
       
        <thead>
            <tr>
                <th>Member Name</th>
                <th>Mobile</th>
                <th>House_No</th>
            </tr>
        </thead>
        @foreach($data as $member)
        <tr>
            <td>{{$member->name}}</td>
            <td>{{$member->mobile}}</td>
            <td>{{$member->house_no}}</td>
            <td><button class="btn btn-danger"><a href="{{'/member-delete/'.$member->id}}" style="color:white; text-decoration: none">Delete</a></button></td>
        </tr>
        @endforeach
</table>
        <div class="pagination justify-content-end">
          {!! $data->links() !!}
        </div>  
</div>
@endif