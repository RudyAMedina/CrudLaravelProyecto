<?php

namespace App\Http\Controllers;

use App\Models\ModeloCrud;
use Illuminate\Http\Request;
use App\Models\categorias;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Http\Requests\Post\PutRequest;

class ControladorCrud extends Controller
{
    /**
     * Display a listing of the resource.
     * Para el tema de paginación empieza en la pagina 93
     */
    public function index()
    {
        $posts= ModeloCrud::paginate(2);
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categorias::pluck('id', 'titulo');
        //dd($categories);
        return view('post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         //dd($request);
         $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|integer',
            'description' => 'nullable|string',
            'posted' => 'required|string|in:not,yes',
        ]);
        
        try {
            ModeloCrud::create($request->all());
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }

        // Redireccionar a la lista de posts pagina 41 del pdf
        return redirect()->route('posts.index')
                         ->with('success', 'Agregado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ModeloCrud $crud)
    {
        return view('posts.show', compact('crud'));
    }

    public function edit(ModeloCrud $post): View
    {
        $categories = Categorias::pluck('titulo', 'id');
        return view('post.edit', compact('post', 'categories'));
    }
    
    //uso de PutRequest pagina 103 del PDF
    public function update(PutRequest $request, ModeloCrud $post): RedirectResponse
    {
        $post->update($request->validated());
    
        return redirect()->route('posts.index')->with('success', 'Registro actualizado.');
    }

    public function destroy(ModeloCrud $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Registro eliminado.');
    }
}
