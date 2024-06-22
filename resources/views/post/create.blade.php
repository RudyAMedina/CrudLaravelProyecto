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
        <form action="{{ route('store') }}" method="POST">
        @csrf
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}">

            <label for="slug">Slug</label>
            <input type="text" name="slug" id="slug" value="{{ old('slug') }}">

            <label for="content">Content</label>
            <textarea name="content" id="content">{{ old('content') }}</textarea>

            <label for="category_id">Selecciona una categoría:</label>
            <select name="category_id" id="category_id">
                @foreach($categories as $id => $titulo)
                    <option value="{{ $id }}">{{ $id }}</option>
                @endforeach
            </select>

            <label for="description">Description</label>
            <textarea name="description" id="description">{{ old('description') }}</textarea>

            <label for="posted">Posted</label>
            <select name="posted" id="posted">
                <option value="not">Not</option>
                <option value="yes">Yes</option>
            </select>

            <button type="submit">Send</button>
        </form>
    </div>
</body>
</html>