@include('layouts.master')
<h1 style="text-align:center"> Details</h1>
<p><b>ID: </b>{{$customer->id}}</p>
<p><b>First Name: </b>{{$customer->first_name}}</p>
<p><b>Last Name: </b>{{$customer->last_name}}</p>
<p><b>Customer: </b>{{$customer->address}}</p>
