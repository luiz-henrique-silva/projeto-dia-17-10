@extends('layouts.app')

@section('content')
<h1>Enviar Projeto</h1>

<form action="{{ route('projects.store') }}" method="POST">
    @csrf
    <label for="title">Título</label>
    <input type="text" name="title" id="title" required>
    
    <label for="description">Descrição</label>
    <textarea name="description" id="description" required></textarea>

    <button type="submit">Enviar</button>
</form>
@endsection
