@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')
            <h1>Editar</h1>
            <div class="form-group">
                <label for="title">Titulo</label>
                <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}" required>
            </div>

            <div class="form-group">
                <label for="slug">Slug</label>
                <input type="text" id="slug" name="slug" value="{{ old('slug', $post->slug) }}" required>
            </div>

            <div class="form-group">
                <label for="content">Contenido</label>
                <textarea id="content" name="content" required>{{ old('content', $post->content) }}</textarea>
            </div>

            <div class="form-group">
                <label for="category_id">Selecciona una categoría:</label>
                <select name="category_id" id="category_id">
                    @foreach($categories as $id => $titulo)
                        <option value="{{ $id }}" {{ old('category_id', $post->category_id) == $id ? 'selected' : '' }}>{{ $titulo }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea id="description" name="description" required>{{ old('description', $post->description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="posted">Postear</label>
                <select name="posted" id="posted">
                    <option value="not" {{ old('posted', $post->posted) == 'not' ? 'selected' : '' }}>Not</option>
                    <option value="yes" {{ old('posted', $post->posted) == 'yes' ? 'selected' : '' }}>Yes</option>
                </select>
            </div>

            <br />
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@endsection