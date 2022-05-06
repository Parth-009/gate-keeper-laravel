<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Complaint List</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{URL('/adminComplaintbox')}}">Back</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
  <div class="row justify-content-center"> 
  <div class="col md-3">
  <div class="card bg-info mx-3 mt-3" style="max-width: 18rem;">
      <div class="card-body">
        <h5 class="card-title" >Total Complaints</h5>
        @if(isset($data))
        <h1>{{$data}}</h1>
        @endif
    </div>
  </div>
  </div>
  <div class="col md-3">
  <div class="card bg-danger mx-3 mt-3" style="max-width: 18rem;">
      <div class="card-body">
        <h5 class="card-title">New Complaints</h5>
        @if(isset($new))
        <h1>{{$new}}</h1>
        @endif
    </div>
  </div>
  </div>
  <div class="col md-3">
  <div class="card bg-warning mx-3 mt-3" style="max-width: 18rem;">
      <div class="card-body">
        <h5 class="card-title">Pending Complaints</h5>
        @if(isset($pending))
        <h1>{{$pending}}</h1>
        @endif
    </div>
  </div>
  </div>
  <div class="col md-3">
  <div class="card bg-success mx-3 mt-3" style="max-width: 18rem;">
      <div class="card-body">
        <h5 class="card-title">Closed Complaints</h5>
        @if(isset($close))
        <h1>{{$close}}</h1>
        @endif
    </div>
  </div>
  </div>
  </div>
  </div>
  