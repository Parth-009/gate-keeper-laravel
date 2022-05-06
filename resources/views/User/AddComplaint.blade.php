<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Complaint</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{URL('/home')}}">Home</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
  <h2>Complaint Form</h2>
  <form method="POST" action="/UseraddComplaint">
      @csrf
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name"  name="name" value="{{Auth::user()->name}}" readonly>
    </div>
    <div class="form-group">
      <label for="mobile">Mobile:</label>
      <input type="text" class="form-control" id="mobile" placeholder="Enter the mobile number" name="mobile">
    </div>
    <div class="form-group">
      <label for="type">Complaint-type:</label>
      <input type="text" class="form-control" id="type" placeholder="Enter Complaint-type" name="type">
    </div>
    <div class="form-group">
      <label for="complaint">Complaint</label>
      <input type="text" class="form-control" id="complaint" placeholder="Enter Complaint Desc" name="Complaint">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>

