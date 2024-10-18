@extends('layouts.app')

@section('content')
    <h1>Bem-vindo, Aluno!</h1>
    <p>Aqui você pode enviar seus projetos e visualizar os aprovados.</p>
    <a href="{{ route('projects.create') }}">Enviar Projeto</a>
    <a href="{{ route('projects.index') }}">Ver Projetos Aprovados</a>
@endsection
