<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
    <div class="container">
        <form action="{{ route('post.store') }}" method="POST">
        @csrf
            <label for="title">Titulo</label>
            <input type="text" id="title" name="title" required>

            <label for="slug">Slug</label>
            <input type="text" id="slug" name="slug" required>

            <label for="content">Contenido</label>
            <textarea  id="content" name="content" required></textarea>

            <label for="category_id">Selecciona una categoría:</label>
            <select name="category_id" id="category_id">
                @foreach($categories as $id => $titulo)
                    <option value="{{ $titulo }}">{{ $id }}</option>
                @endforeach
            </select>

            <label for="description">Descripción</label>
            <textarea id="description" name="description" required></textarea>

            <label for="posted">Postear</label>
            <select name="posted" id="posted">
                <option value="not">Not</option>
                <option value="yes">Yes</option>
            </select>

            <button type="submit">Enviar</button>
        </form>
    </div>
</body>
</html>