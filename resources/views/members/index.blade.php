@extends('layouts.main')

@section('title','| All Members')

@section('content')

	<div class="row">
		
		<div class="col-md-10">
		
			<h1>All Members</h1>
		</div>

		<div class="col-md-2">
			<a href="{{route('members.create')}}" class="btn  btn-block btn-primary btn-h1-spacing">Create New Member</a>
		</div>

		<hr>
	</div>

	<div class="row">
		<div class="col-md-12">
			<table class="table">
				
				<thead>
					<th>#</th>
					<th>Name</th>
					<th>Address</th>
					<th>Age</th>
					

				</thead>

				<tbody>
					
					@foreach($members as $member )

						<tr>
							<th>{{ $member->id }}</th>
							<td>{{ $member->name }}</td>
							<td>{{ $member->address }}</td>
							<td>{{ $member->age }}</td>
							{!! Form::open(['route' => ['members.destroy', $member->id],'method'=>
								'DELETE']) !!}
							<td>
								<a href="{{route('members.show', $member->id)}}" class="btn btn-default">View</a>
								<a href="{{ route('members.edit', $member->id)}}" class="btn btn-default">Edit</a>

								
								
								{!! Form::submit('Delete', ['class' => 'btn btn-danger ']) !!}

								
							</td>
							{!! Form::close() !!}
						</tr>

					@endforeach

				</tbody>

			</table>

		</div>
	</div>

@endsection