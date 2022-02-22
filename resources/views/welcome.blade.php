@include('layouts.master')
<h1>Welcome To Apptimus</h1>
<button type="button" class="btn btn-success"><a href="{{route('customers.create')}}" class="text-reset">Create Customer</a></button>
<button type="button" class="btn btn-primary"><a href="{{route('customers.index')}}" class="text-reset">Show Customers</a></button>

