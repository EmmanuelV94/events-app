<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="mt-6">
            <x-light-anchor :href="route('categories.create')">{{ __('Nuevo') }}</x-light-anchor>
        </div>
        <div class="flex flex-col bg-white mt-6">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full">
                            <thead class="border-b">
                                <tr>
                                    <th>

                                    </th>
                                    <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                                        Titúlo
                                    </th>
                                    <th scope="col" class="text-sm font-bold text-gray-900 px-6 py-4 text-left">
                                        Descripción
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr class="border-b">
                                        <td>
                                            <form action="{{ route('categories.destroy',$category->id) }}" method="Post">
                                                <x-info-anchor :href="route('categories.edit',$category->id)">{{ __('Editar') }}</x-info-anchor>
                                                @csrf
                                                @method('DELETE')
                                                <x-danger-button type="submit" class="btn btn-danger">Eliminar</x-danger-button>
                                            </form>
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $category->title }}</td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $category->description }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! $categories->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
