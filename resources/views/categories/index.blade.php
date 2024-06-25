@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Categorias</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-warning">Agregar categorias </a>
   
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
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->titulo }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline-block;">
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
        @if($categories->count())
            {{ $categories->links('vendor.pagination.semantic-ui') }}
        @else
            <p>No hay posts disponibles.</p>
        @endif
</div>
@endsection