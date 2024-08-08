<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('brands.index', compact('brands'));
    }

    public function create()
    {
        return view('brands.create');
    }

    public function store(Request $request)
    {
        Brand::create($request->validate([
            'name' => 'required|string|max:255',
        ]));

        return redirect()->route('brands.index')->with('success', 'Marca creada exitosamente.');
    }

    public function show(Brand $brand)
    {
        return view('brands.show', compact('brand'));
    }

    public function edit(Brand $brand)
    {
        return view('brands.edit', compact('brand'));
    }

    public function update(Request $request, Brand $brand)
    {
        $brand->update($request->validate([
            'name' => 'required|string|max:255',
        ]));

        return redirect()->route('brands.index')->with('success', 'Marca actualizada exitosamente.');
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect()->route('brands.index')->with('success', 'Marca eliminada exitosamente.');
    }
}

