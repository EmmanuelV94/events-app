<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('events.store') }}">
            @csrf
            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
            <div class="mt-2">
                <label for="title">Titúlo</label>
                <input type="text" name="title"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    value="{{ old('title') }}" />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <div class="mt-2">
                <label for="category_id">Categoria</label>
                <select name="category_id"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                    @foreach ($categories as $category)
                        <option {{ $category->id == old('category_id') ? 'selected' : '' }} value="{{ $category->id }}">
                            {{ $category->title }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
            </div>

            <div class="mt-2">
                <label for="description">Descripción</label>
                <input type="text" name="description"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    value="{{ old('description') }}" />
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div class="mt-2">
                <label for="start_date">Fecha Inicial</label>
                <input type="date" name="start_date"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    value="{{ old('start_date') }}" />
                <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
            </div>

            <div class="mt-2">
                <label for="end_date">Fecha Final</label>
                <input type="date" name="end_date"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    value="{{ old('end_date') }}" />
                <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
            </div>

            <x-secondary-button :href="route('events.index', ['year' => session('year'), 'month' => session('month')])" class="mt-4">{{ __('Cancelar') }}
            </x-secondary-button>
            <x-primary-button class="mt-4">{{ __('Guardar') }}</x-primary-button>

        </form>
    </div>
</x-app-layout>
