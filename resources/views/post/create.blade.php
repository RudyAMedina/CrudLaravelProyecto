<!-- Pagina 100 -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Registro</h1>
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Titulo</label>
                <input type="text" id="title" name="title" required>
            </div>

            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" id="slug" name="slug" required>
            </div>

            <div class="form-group">
                <label for="content">Contenido</label>
                <textarea  id="content" name="content" required></textarea>
            </div>

            <div class="form-group">
                <label for="category_id">Selecciona una categoría:</label>
                <select name="category_id" id="category_id">
                    @foreach($categories as $id => $titulo)
                        <option value="{{ $titulo }}">{{ $id }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea id="description" name="description" required></textarea>
            </div>

            <div class="form-group">
                <label for="posted">Postear</label>
                <select name="posted" id="posted">
                    <option value="not">Not</option>
                    <option value="yes">Yes</option>
                </select>
            </div>
            <br />
            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
    </div>
@endsection