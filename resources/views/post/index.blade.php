@extends('layouts.app')

@section('content')
@section('content')
    <div class="container"></div>   
        <h1>Agregar</h1>
            <a href="{{ route('post.create') }}" class="btn btn-warning">Agregar </a>
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
                <th>titulo</th>
                <th>slug</th>
                <th>decripcion</th>
                <th>content</th>
                <th>categoria</th>
            </tr>
        </thead>
        <tbody>
            @foreach($postss as $crud)
                <tr>
                    <td>{{ $crud->id }}</td>
                    <td>{{ $crud->title }}</td>
                    <td>
                        <a href="{{ route('post.edit', $crud->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('post.destroy', $crud->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
@endsection