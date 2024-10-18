@extends('layouts.app')

@section('content')
<h1>Projetos Aprovados</h1>
<ul>
    @foreach($projects as $project)
        <li>{{ $project->title }} - {{ $project->description }}</li>
    @endforeach
</ul>
@endsection
