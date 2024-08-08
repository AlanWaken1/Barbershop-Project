<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Exportar Cortes de Cabello a PDF</title>
    <style>
        /* Aquí puedes agregar estilos personalizados para el PDF */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Lista de Cortes de Cabello</h1>
    <table>
        <thead>
            <tr>
                <th>Empleado</th>
                <th>Fecha</th>
                <th>Precio</th>
                <th>Característica</th>
                <th>Productos</th>
                <th>Precio2</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($haircuts as $haircut)
                <tr>
                    <td>{{ $haircut->employee->name }}</td>
                    <td>{{ $haircut->date }}</td>
                    <td>${{ $haircut->price }}</td>
                    <td>{{ $haircut->feature ?? 'Ninguna' }}</td>
                    <td>
                        @if ($haircut->products->isNotEmpty())
                            <ul>
                                @foreach ($haircut->products as $product)
                                    <li>{{ $product->name }}</li>
                                @endforeach
                            </ul>
                        @else
                            Ninguno
                        @endif
                    </td>
                    <td>${{ $haircut->price2 ?? '0.00' }}</td>
                    <td>${{ $haircut->total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
