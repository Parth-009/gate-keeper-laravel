<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
     function dosomething(data){
        let getData = JSON.parse(data.value);
        document.getElementById("name").value = getData.name;
        document.getElementById("mobile").value = getData.mobile;
        document.getElementById("id").value = getData.id;
        // valuee=JSON.parse(data.value);
        //     $(document).ready(function(){
                
        //         $('#edit').click(function(valuee){
        //         $('#exampleModalCenter').show();
        //         console.log(valuee.name);
        //         $(input).attr('name',valuee.name);
        //         $('#mobile').val(valuee.name);
        //     });
        // });
    }
</script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 align-middle">
            <div class="card mt-xl-5">
                <div class="card-header">{{ __('Edit Member Detail') }}</div>     
                <div class="card-body">
                    <form method="POST" action="/edit-staff">
                        @csrf
                        <div class="row mb-3">
                            <label for="flat" class="col-md-4 col-form-label text-md-end">{{ __('category') }}</label>
                            <div class="col-md-6">
                            <select id="category" name="category"class="form-select form-select-sm" aria-label=".form-select-sm example" style="width:340px">
                                <option>Select Category</option>
                                <option value="security">Security</option>
                                <option value="gardner">Gardner</option>
                                <option value="maintenance">Maintenance</option>
                            </select>
                                @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Table for list staff member by category -->
<table class="table table-striped table-bordered mx-auto mt-4" style="width:900px">
  <thead>
    <tr>
      <th>Name</th>
      <th>Staff_No</th>
      <th>Mobile</th>
      <th>Category</th>
    </tr>
  </thead>

  <tbody>
  @if(isset($result))
    @foreach($result as $data)
    <tr>
        <td>{{$data->name}}</td>
        <td>{{$data->staff_no}}</td>
        <td>{{$data->mobile}}</td>
        <td>{{$data->category}}</td>
        <td><button id="edit" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter" value="{{$data}}" onclick="dosomething(this)"> Edit</button></td>
    </tr>
    @endforeach
    @endif
  </tbody>
</table>

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


