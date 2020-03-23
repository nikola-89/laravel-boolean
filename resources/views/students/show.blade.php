@extends('layouts.layout')

@section('main')
<div class="boolean__career__students">
	<div class="container">
		<div class="boolean__career__students__body">
			<div class="boolean__career__student">
				<img src="{{$student['img']}}" alt="{{$student['name']}}">
				<h3>{{$student['name']}}
					<span class="age">({{$student['age']}} anni)</span>
				</h3>
				<span>{{($student['gender'] == 'F') ? 'Assunta' : 'Assunto'}} da {{$student['company']}} come {{$student['role']}}</span>
				<a class="link-edin" target="_blank" href="{{$student['linkedin_url']}}"><i class="fab fa-linkedin"></i></a>
				<p>{{$student['description']}}</p>
			</div>
		</div>
	</div>
</div>
@endsection