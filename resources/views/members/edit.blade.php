@extends('layouts.main')

@section('title','| Edit')

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			{!! Form::model($member , ['route' => ['members.update', $member->id] ,'method' =>'PUT' ,'files'=>true]) !!}
		    	{!! Form::label('name','Name:') !!}
		    	{!! Form::text('name', null,array('class' => 'form-control')) !!}

		    	{!! Form::label('address','Address:') !!}
		    	{!! Form::text('address', null,array('class' => 'form-control')) !!}

		    	{!! Form::label('age','Age:') !!}
		    	{!! Form::text('age', null,array('class' => 'form-control')) !!}

		    	{!! Form::label('photo','Upload Image')!!}
    			{!!  Form::file('photo', array('style' => 'margin-top:20px')) !!}

		    	{!! Form::submit('Save Change', array('class' => 'btn btn-success btn-lg btn-block' , 'style' => 'margin-top:20px')) !!}
		    	{!! Html::linkRoute('members.show', 'Cancel', array($member->id), array('class' => 'btn btn-danger btn-block')) !!}
			{!! Form::close() !!}
		</div>
	</div>

@endsection