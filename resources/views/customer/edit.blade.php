@include('layouts.master')
@if (session('status'))
    <div class="alert alert-warning">
        {{ session('status') }}
    </div>
@endif
@if($errors->any())
@foreach($errors->all() as $err)
<li style="color:red;">{{$err}}</li>
@endforeach
@endif
<div class="container">
<h1>Edit User</h1>
<form action="{{route('customers.update',$customer->id)}}" method="post" >
@csrf
@method('put')
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">First Name</span>
  <input type="text" class="form-control" value="{{$customer->first_name}}" placeholder="First Name" name="first_name" aria-label="firstname" aria-describedby="basic-addon1">
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Last Name</span>
  <input type="text" class="form-control" value="{{$customer->last_name}}" placeholder="Last Name" name="last_name" aria-label="lastname" aria-describedby="basic-addon1">
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Address</span>
  <textarea class="form-control" placeholder="Address" aria-label="address" name="address" aria-describedby="basic-addon1">{{$customer->address}}</textarea>
</div>
<input type="submit" value="submit" class="btn btn-success float-end">
</form>
  </div>