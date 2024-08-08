@extends('layout.app')
@section('content')
    <h1>Detalles de la Marca</h1>
    <p><strong>Nombre:</strong> {{ $brand->name }}</p>
    <a href="{{ route('brands.edit', $brand) }}" class="btn btn-primary">Editar</a>
    <form action="{{ route('brands.destroy', $brand) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
    </form>
@endsection
