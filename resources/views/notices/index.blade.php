@extends('app')

@section('content')

	<h1 class="page-heading">Your Notices</h1>

	<table class="table table-striped table-bordered">
		<thead>
			<th>This Content:</th>
			<th>Accessible Here:</th>
			<th>Is Infringing Upon My Work Here:</th>
			<th>Notice Sent:</th>
			<th>Content Removed:</th>
		</thead>

		<tbody>
			@foreach ($notices->where('content_removed', 0, false) as $notice)
				<tr>
					<td>{{ $notice->infringing_title }}</td>
					<td>{!! link_to($notice->infringing_link) !!}</td>
					<td>{!! link_to($notice->original_link) !!}</td>
					<td>{{ $notice->created_at->diffForHumans() }}</td>
					<td>
						{!! Form::open(['method' => 'PATCH', 'url' => 'notices/' . $notice->id]) !!}					
							<div class="form-group">
								{!! Form::checkbox('content_removed', $notice->content_removed, $notice->content_removed) !!}
								{!! Form::submit('Submit') !!}
							</div>
						{!! Form::close() !!}
					</td>					
				</tr>	
			@endforeach
		</tbody>
	</table>
	@unless(count($notices))
		<p class="text-center">You haven't sent any DMCA notices yet!</p>
	@endunless
@endsection