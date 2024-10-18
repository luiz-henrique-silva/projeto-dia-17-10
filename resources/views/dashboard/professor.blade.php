@extends('layouts.app')

@section('content')
    <h1>Bem-vindo, Professor!</h1>
    <p>Aqui você pode aprovar os projetos enviados pelos alunos.</p>
    <a href="{{ route('projects.approve') }}">Ver Projetos Pendentes</a>
    <a href="{{ route('projects.index') }}">Ver Projetos Aprovados</a>
@endsection
