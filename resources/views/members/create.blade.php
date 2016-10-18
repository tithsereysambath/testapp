@extends('layouts.main')

@section('title','|Create Members')


@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">

			<h1>Create Members</h1>
			<hr>
			{!! Form::open(['route' => 'members.store','files'=>true] ) !!}
    			{!! Form::label('name','Name:') !!}
    			{!! Form::text('names', null,array('class' => 'form-control')) !!}

    			{!! Form::label('addresses','Address:') !!}
    			{!! Form::text('addresses', null,array('class' => 'form-control')) !!}

    			{!! Form::label('ages','Age:') !!}
    			{!! Form::text('ages', null,array('class' => 'form-control')) !!}

    			{!! Form::label('photoes','Upload Image')!!}
    			{!!  Form::file('photoes', array('style' => 'margin-top:20px')) !!}

    			{!! Form::submit('Create Member', array('class' => 'btn btn-success btn-lg btn-block' , 'style' => 'margin-top:20px')) !!}
			{!! Form::close() !!}
		</div>

	</div>

@endsection