@extends('layouts.app')

@section('content')
<h1>Projetos Pendentes</h1>

<ul>
    @foreach($projects as $project)
        <li>
            {{ $project->title }} - {{ $project->description }}
            <form action="{{ route('projects.approveProject', $project->id) }}" method="POST">
                @csrf
                <button type="submit">Aprovar</button>
            </form>
        </li>
    @endforeach
</ul>
@endsection
