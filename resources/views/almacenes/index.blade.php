@extends('layouts.layout')

@section('contenido')
    <div class="grid grid-cols-6 gap-3">

        <div class="col-span-2">
            <h1 class="text-3xl font-bold text-white">Lista de Almacenes</h1>
            <p class="text-yellow-300 italic">Bienvenido a la página de almacenes.</p>

            @if (session('exito'))
                <p class="mt-3 bg-green-100 text-green-800 rounded py-2 px-4">{{ session('exito') }}</p>
            @endif

            <form action="{{ route('almacenes.web.store') }}" method="POST" class="mt-5">
                @csrf

                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Guardar Almacén
                </button>

                <input type="text" name="nombre" value="{{ old('nombre') }}" placeholder="Nombre.."
                    class="border border-gray-300 rounded py-2 px-4 w-full mt-3 hover:bg-white hover:text-black">
                @error('nombre') <p class="text-red-200 text-sm">{{ $message }}</p> @enderror

                <input type="text" name="direccion" value="{{ old('direccion') }}" placeholder="Dirección..."
                    class="border border-gray-300 rounded py-2 px-4 w-full mt-3 hover:bg-white hover:text-black">
                @error('direccion') <p class="text-red-200 text-sm">{{ $message }}</p> @enderror

                <input type="text" name="ciudad" value="{{ old('ciudad') }}" placeholder="Ciudad..."
                    class="border border-gray-300 rounded py-2 px-4 w-full mt-3 hover:bg-white hover:text-black">
                @error('ciudad') <p class="text-red-200 text-sm">{{ $message }}</p> @enderror
            </form>
        </div>

        <div class="col-span-4">
            <table class="table-auto w-full border border-gray-100 rounded-lg shadow-md">
                <thead class="text-white bg-gray-950 bg-opacity-25 p-4">
                    <tr>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>Ciudad</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($almacenes as $almacen)
                        <tr>
                            <td>{{ $almacen->nombre }}</td>
                            <td>{{ $almacen->direccion }}</td>
                            <td>{{ $almacen->ciudad }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-3">{{ $almacenes->links() }}</div>
        </div>

    </div>
@endsection