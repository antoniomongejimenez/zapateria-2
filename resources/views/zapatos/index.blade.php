<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Zapatos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-plantilla>
                        <table class="table-auto">
                            <thead>
                                <th class="px-6 py-2 text-gray-500">
                                    Codigo
                                </th>
                                <th class="px-6 py-2 text-gray-500">
                                    Denominacion
                                </th>
                                <th class="px-6 py-2 text-gray-500">
                                    Precio
                                </th>
                            </thead>
                            <tbody>
                                @foreach ($zapatos as $zapato)
                                    <tr>
                                        <td class="px-6 py-2">{{ $zapato->codigo }}</td>
                                        <td class="px-6 py-2">{{ $zapato->denominacion }}</td>
                                        <td class="px-6 py-2">{{ $zapato->precio }}</td>
                                        <td>
                                            <div class="text-sm text-gray-900 ">
                                                <form action="{{ route('anadiralcarrito', $zapato) }}" method="POST">
                                                    @csrf
                                                    @method('POST')
                                                    <button type="submit" class="px-4 py-1 text-sm text-white bg-red-400 rounded">Añadir al carrito</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </x-plantilla>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
