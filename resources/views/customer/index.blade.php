@include('layouts.master')
@if (session('message'))
    <div class="alert alert-danger">
        {{ session('message') }}
    </div>
@endif
@if (session('status'))
    <div class="alert alert-primary">
        {{ session('status') }}
    </div>
@endif
<h2 style="text-align: center"><u>Customer Details</u></h2>

<table border="1" class="table table-dark table-hover">
<th>Customer id</th>
<th>First Name</th>
<th>Last Name</th>
<th>Address</th>
<th colspan='4' style="text-align: center">Function</th>
@foreach($customer as $customer)
<tr>
<td>{{$customer->id}}</td>
<td>{{$customer->first_name}}</td>
<td>{{$customer->last_name}}</td>
<td>{{$customer->address}}</td>
<td><a href="{{route('customers.show',$customer->id)}}" class="btn btn-primary">Show</a></td>
<td><a href="{{route('customers.edit',$customer->id)}}" class="btn btn-warning">edit</a></td>
<td><form action="{{route('customers.destroy',$customer->id)}}" method="post" >
<a href="#" title="delete" class="delete" onclick="return confirm('Are you sure you want to delete this {{$customer->first_name}} {{$customer->last_name}} customer!!! ')">
    @csrf
    @method('delete')
    <input type="submit" value="delete" class="btn btn-danger"></a>
</form></td>
</tr>
@endforeach
</table>

<button class="btn btn-secondary"><a href="{{route('customers.create')}}" class="text-reset" >Create Customer</a></button><br><br>
