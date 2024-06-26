@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar categoria</h1>
    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="titulo">titulo</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo', $category->titulo) }}" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion">{{ old('descripcion', $category->descripcion) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection