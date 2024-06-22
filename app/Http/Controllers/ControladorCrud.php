<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use App\Models\ModeloCrud;
use Illuminate\Http\Request;
use App\Models\categorias;
use Illuminate\Http\RedirectResponse;

class ControladorCrud extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = Categorias::pluck('id', 'titulo');
        //dd($categories);
        return view('post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|integer',
            'description' => 'nullable|string',
            'posted' => 'required|string|in:not,yes',
        ]);

        // Crear una nueva instancia de Post y asignar los valores validados
        $post = new Post;
        $post->title = $validated['title'];
        $post->slug = $validated['slug'];
        $post->content = $validated['content'];
        $post->category_id = $validated['category_id'];
        $post->description = $validated['description'] ?? ''; // En caso de que sea nulo
        $post->posted = $validated['posted'];
        $post->save();

        // Redireccionar a la lista de posts
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(ModeloCrud $ModeloCrud)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ModeloCrud $ModeloCrud)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ModeloCrud $ModeloCrud)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ModeloCrud $ModeloCrud)
    {
        //
    }
}
