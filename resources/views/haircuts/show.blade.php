@extends('layout.app')
@section('content')
    <h1>Detalles del Corte de Cabello</h1>
    <p><strong>Fecha:</strong> {{ $haircut->date }}</p>
    <p><strong>Precio:</strong> ${{ $haircut->price }}</p>
    <p><strong>Característica:</strong> {{ $haircut->feature }}</p>
    <p><strong>Precio2:</strong> ${{ $haircut->price2 }}</p>
    <p><strong>Total:</strong> ${{ $haircut->total }}</p>
    <a href="{{ route('haircuts.edit', $haircut) }}" class="btn btn-primary">Editar</a>
    <form action="{{ route('haircuts.destroy', $haircut) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
    </form>
@endsection
