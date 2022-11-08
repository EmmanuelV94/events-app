<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">

        <form method="POST" action="{{ route('categories.update', $category->id) }}">
            @csrf
            @method('PUT')
            <input type="text" name="title" placeholder="Titulo"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                value="{{ $category->title }}" />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />

            <input type="text" name="description" placeholder="Descripción"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                value="{{ $category->description }}" />
            <x-input-error :messages="$errors->get('description')" class="mt-2" />


            <x-secondary-button :href="route('categories.index')" class="mt-4">{{ __('Cancelar') }}</x-secondary-button>
            <x-primary-button class="mt-4">{{ __('Guardar') }}</x-primary-button>
        </form>
    </div>
</x-app-layout>
