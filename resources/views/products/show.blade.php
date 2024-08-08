@extends('layout.app')
@section('content')
    <h1>Detalles del Producto</h1>
    <p><strong>Nombre:</strong> {{ $product->name }}</p>
    <p><strong>Marca:</strong> {{ $product->brand->name }}</p>
    <p><strong>Tipo:</strong> {{ $product->type }}</p>
    <p><strong>Precio:</strong> ${{ $product->price }}</p>
    <a href="{{ route('products.edit', $product) }}" class="btn btn-primary">Editar</a>
    <form action="{{ route('products.destroy', $product) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
    </form>
@endsection
