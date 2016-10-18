@extends('layouts.main')

@section('title', '| View Post')


@section('content')

	<div class="row">

		<div class="col-md-2 col-md-offset-2">
			
			<img src="{{ asset('images/'.$member->photo )}}"  class="btn-h1-spacing"  />

		</div>

		<div class="col-md-5">
			
			<h1>Name : {{ $member->name }}</h1>
			<p class="lead">Address : {{ $member->address}}</p>
			<p class="lead">Age: {{ $member->age }}</p>

		</div>
		


	</div>
	

@endsection