@extends('layouts.app')

@section('content')

    <div class="container">
            <h1>Agregar</h1>
                <!-- pagina 98 -->
                <a href="{{ route('posts.create') }}" class="btn btn-warning">Agregar </a>
                <div class="alerta">
                    @if(session('success'))
                        <div>
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
        
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Slug</th>
                    <th>Decripción</th>
                    <th>Contenido</th>
                    <th>Categoria</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->slug }}</td>
                        <td>{{ $post->description }}</td>
                        <td>{{ $post->content }}</td>
                        <td>{{ $post->category_id }}</td>
                        <td>
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        @if($posts->count())
            {{ $posts->links('vendor.pagination.semantic-ui') }}
        @else
            <p>No hay posts disponibles.</p>
        @endif
    </div>   
@endsection