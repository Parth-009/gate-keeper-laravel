<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 align-middle">
            <div class="card mt-xl-5">
                <div class="card-header">{{ __('Delete Staff Member') }}</div>     
                <div class="card-body">
                    <form method="POST" action="/delete-staff">
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
        <td><button type="button" class="btn btn-danger"><a href="{{'/delete-member/'.$data->id}}" style=" color:white; text-decoration: none">Delete</a></button></td>
       
    </tr>
    @endforeach
    @endif

  </tbody>
</table>
<table>
    
</table>