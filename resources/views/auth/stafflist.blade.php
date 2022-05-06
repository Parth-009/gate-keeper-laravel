<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
     function dosomething(data){
        let getData = JSON.parse(data.value);
        console.log(getData);
        document.getElementById("name").value = getData.name;
        document.getElementById("mobile").value = getData.mobile;
        document.getElementById("id").value = getData.id;
        document.getElementById("stafflist").value = getData.category;

    }
</script>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Staff List</a>
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
    <h1 style="text-align: center;margin-top: 20px;">Staff List</h1>
    
    <table  style="margin-left: 32%;width:450px">
        <tr>
            <td style="margin-top:3px" class="justify content center">
                <form action="/staff-list" method="POST" class="d-flex justify-content-between">
                    @csrf
                    <select name="stafflist" id="stafflist"class="form-select form-select-sm" aria-label=".form-select-sm example">
                        <option selected>Select Category</option>
                        <option value="security">Security</option>
                        <option value="gardner">Gardner</option>
                        <option value="maintenance">Maintenance</option>
                    </select>
                    <button type="submit" class="btn btn-success mx-3">Submit</buton>
                </form>
            </td>
            <td><button type="button" class="btn btn-primary fa fa-plus" style="text-align:right;height:40px;margin-top:-14px" onclick="window.location='{{ URL('/add-staff'); }}'">Add</button></td>
        </tr>
    </table>
    
    @if(isset($find))
    <table class="table table-striped table-bordered mx-auto mt-4" style="width:900px">
       
        <thead>
            <tr>
                <th>Staff Member Name</th>
                <th>Mobile</th>
                <th>Register Number</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        @foreach($find as $data)
        <tr>
            <td>{{$data->name}}</td>
            <td>{{$data->mobile}}</td>
            <td>{{$data->staff_no}}</td>
            <td>
              <button id="edit" type="button" class="btn btn-primary fa fa-pencil" data-toggle="modal" data-target="#exampleModalCenter" value="{{json_encode($data,TRUE)}}" onclick="dosomething(this)"></button>
            </td>
            <td>
              <button type="button" class="fa fa-trash btn btn-danger"><a href="{{'/delete-member/'.$data->id}}" style=" color:white; text-decoration: none"></a></button>
            </td>
        </tr>
        @endforeach
    </table>
    <div class="pagination justify-content-center">
          {!! $find->links() !!}
    </div> 
    
    @endif
    <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/edit-detail" method="POST">
            @csrf
            <input id="id" name="id"type="text" readonly>
            <input id="name" name="name"type="text">
            <input id="mobile"name="mobile"type="text">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>