@extends('layouts.layout')

@section('main')
<div class="boolean__career__students">
	<div class="container">
		<div class="boolean__career__students__head">
			<h2 class="max-title">I nostri ex studenti su LinkedIn</h2>
		</div>
		<div class="boolean__career__students__body">
		@foreach ($students as $student)
			<div class="boolean__career__student">
				<img src="{{$student['img']}}" alt="{{$student['name']}}">
				<a href="{{route('student.show', ['slug' => $student['slug']])}}">
					<h3>{{$student['name']}}
					<span class="age">({{$student['age']}} anni)</span>
					</h3>
				</a>
				<span>{{($student['gender'] == 'F') ? 'Assunta' : 'Assunto'}} da {{$student['company']}} come {{$student['role']}}</span>
				<a class="link-edin" target="_blank" href="{{$student['linkedin_url']}}"><i class="fab fa-linkedin"></i></a>
				<p>{{$student['description']}}</p>
			</div>
		@endforeach
		</div>
	</div>
</div>
@endsection

</a>