@include('layouts.master')
<div class="container">
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
@if (session('messages'))
    <div class="alert alert-danger">
        {{ session('messages') }}
    </div>
@endif 
<h1>Create User MSA</h1>
<form action="{{route('customers.store')}}" method="post" >
    @csrf
    <label for="validationServer03" class="form-label">First Name</label>
    <input type="text" class="form-control @if($errors->has('first_name'))is-invalid @endif" name="first_name" id="validationServer03" value="{{old('first_name')}}" aria-describedby="validationServer03Feedback" required>
    <div id="validationServer03Feedback" class="invalid-feedback">
    @error('first_name')
    {{$message}}
    @enderror
    </div>
<label for="validationServer03" class="form-label">Last Name</label>
    <input type="text" class="form-control  @if($errors->has('last_name'))is-invalid @endif" name="last_name" id="validationServer03" aria-describedby="validationServer03Feedback" value="{{old('last_name')}}" required>
    <div id="validationServer03Feedback" class="invalid-feedback">
@error('last_name')
{{$message}}
@enderror
</div>
<label for="validationServer03" class="form-label">Address</label>
    <input type="text" class="form-control  @if($errors->has('address'))is-invalid @endif" name="address" id="validationServer03" aria-describedby="validationServer03Feedback" value="{{old('address')}}" required>
    <div id="validationServer03Feedback" class="invalid-feedback">
@error('address')
{{$message}}
@enderror
</div>
<br>
<input type="submit" value="submit" class="btn btn-success float-end">
</form>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Ajax 
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Ajax Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <h1>Create User</h1>
      <span class="text-success" id="success-message"></span>
<form id="ajax-form" >
    @csrf
<label for="validationServer03" class="form-label">First Name</label>
    <input type="text" id="first_name" class="form-control @if($errors->has('first_name'))is-invalid @endif" name="first_name" id="validationServer03" value="{{old('first_name')}}" aria-describedby="validationServer03Feedback" required>
    <span class="text-danger" id="first_name-error"></span>
    <br>
<label for="validationServer03" class="form-label">Last Name</label>
    <input type="text" id="last_name" class="form-control  @if($errors->has('last_name'))is-invalid @endif" name="last_name" id="validationServer03" aria-describedby="validationServer03Feedback" value="{{old('last_name')}}" required>
    <span class="text-danger" id="last_name-error"></span>
    <br>
<label for="validationServer03" class="form-label">Address</label>
    <input type="text" id="address" class="form-control  @if($errors->has('address'))is-invalid @endif" name="address" id="validationServer03" aria-describedby="validationServer03Feedback" value="{{old('address')}}" required>
    <span class="text-danger" id="address-error"></span>
<br>
<input type="submit" value="submit" class="btn btn-success float-end">
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

   <script type="text/javascript">

    $('#ajax-form').on('submit',function(e){
        e.preventDefault();

        let first_name = $('#first_name').val();
        let last_name= $('#last_name').val();
        let address = $('#address').val();

        $.ajax({
          url: "/customers",
          type:"POST",
          data:{
            "_token": "{{ csrf_token() }}",
            first_name:first_name,
            last_name:last_name,
            address:address,
          },
          success:function(response){
            console.log(response);
            if (response) {
              $('#success-message').text('User Created Successfully'); 
              $("#ajax-form")[0].reset(); 
            }
          },
          error: function(response) {
            $('#first_name-error').text(response.responseJSON.errors.first_name);
            $('#last_name-error').text(response.responseJSON.errors.last_name);
            $('#address-error').text(response.responseJSON.errors.address);
           }
         });
        });
      </script>
