@extends('layout.app')
@section('content')
    <h1>Detalles del Empleado</h1>
    <p><strong>Nombre:</strong> {{ $employee->name }}</p>
    <p><strong>Rol:</strong> {{ $employee->role }}</p>
    <a href="{{ route('employees.edit', $employee) }}" class="btn btn-primary">Editar</a>
    <form action="{{ route('employees.destroy', $employee) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
    </form>
@endsection
