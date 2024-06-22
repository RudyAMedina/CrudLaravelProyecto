<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorias;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Categorias::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        try {
            Categorias::create($request->all());
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }

        return redirect()->route('categories.index')
                         ->with('success', 'Categoria agregada.');
    }

    public function show(Categorias $category)
    {
        return view('categories.show', compact('category'));
    }

    public function edit(Categorias $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Categorias $category)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')
                         ->with('success', 'La categoria se actualizo.');
    }

    public function destroy(Categorias $category)
    {
        $category->delete();

        return redirect()->route('categories.index')
                         ->with('success', 'Categoria eliminada.');
    }
}
