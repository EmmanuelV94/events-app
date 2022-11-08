<x-app-layout>
    <div class="max-w-xxl mx-auto p-4 sm:p-6 lg:p-8">

        <div class="max-w-xl  mx-auto mt-6">
            <form action="" method="GET" class="flex flex-wrap">
                <select id="month" name="month"
                    class="
                    flex-1
                    w-40
                    px-3
                    py-1.5
                    text-base
                    font-normal
                    text-gray-700
                    bg-white bg-clip-padding bg-no-repeat
                    border border-solid border-gray-300
                    rounded
                    transition
                    ease-in-out
                    m-0
                    focus:text-gray-700 focus:bg-white focus:border-red-600 focus:outline-none">
                    <option {{ $month == 1 ? 'selected' : '' }} value="1">Enero</option>
                    <option {{ $month == 2 ? 'selected' : '' }} value="2">Febrero</option>
                    <option {{ $month == 3 ? 'selected' : '' }} value="3">Marzo</option>
                    <option {{ $month == 4 ? 'selected' : '' }} value="4">Abril</option>
                    <option {{ $month == 5 ? 'selected' : '' }} value="5">Mayo</option>
                    <option {{ $month == 6 ? 'selected' : '' }} value="6">Junio</option>
                    <option {{ $month == 7 ? 'selected' : '' }} value="7">Julio</option>
                    <option {{ $month == 8 ? 'selected' : '' }} value="8">Agosto</option>
                    <option {{ $month == 9 ? 'selected' : '' }} value="9">Septiembre</option>
                    <option {{ $month == 10 ? 'selected' : '' }} value="10">Octubre</option>
                    <option {{ $month == 11 ? 'selected' : '' }} value="11">Noviembre</option>
                    <option {{ $month == 12 ? 'selected' : '' }} value="12">Diciembre</option>
                </select>

                <input type="number" name="year"
                    class="
                        flex-1
                        w-40
                        px-3
                        py-1.5
                        text-base
                        font-normal
                        text-gray-700
                        bg-white bg-clip-padding
                        border border-solid border-gray-300
                        rounded
                        transition
                        ease-in-out
                        m-0
                        focus:text-gray-700 focus:bg-white focus:border-red-600 focus:outline-none
                    "
                    value="{{ $year }}" id="year" placeholder="Año" />

                <x-primary-button class="flex-1 w-20 text-align-center ml-2 !block">{{ __('Buscar') }}
                </x-primary-button>

            </form>
        </div>
        <div class="mt-6">
            <x-light-anchor :href="route('events.create')">{{ __('Nuevo') }}</x-light-anchor>
        </div>
        <div class="mt-6">
            <div class="max-w flex flex-wrap">
                @foreach ($events as $event)
                    <div
                        class="ml-4 mr-4 flex-1 bg-white shadow-md border border-gray-200 rounded-lg max-w-sm dark:bg-gray-800 dark:border-gray-700">
                        <div class="p-5">
                            <a href="{{ route('events.edit', $event->id) }}">
                                <h5
                                    class="text-center text-gray-900 font-bold text-2xl tracking-tight mb-2 dark:text-white">
                                    {{ $event->title }}</h5>
                            </a>
                            <h6 class="text-gray-900 text-center font-bold text-l tracking-tight mb-2 dark:text-white">
                                {{ date('d/m/Y', strtotime($event->start_date)) }} hasta
                                {{ date('d/m/Y', strtotime($event->end_date)) }}</h6>
                            <p class="font-normal text-gray-700 mb-3 dark:text-gray-400">
                                {{ $event->description }}
                            </p>
                            <form action="{{ route('events.destroy', $event->id) }}" method="Post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" href="#"
                                    class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center  dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                    Eliminar
                                    <strong class="ml-2">X</strong>
                                </button>
                            </form>
                        </div>
                    </div>

                    {{-- <tr class="border-b"> --}}
                    {{-- <td>
                    <form action="{{ route('events.destroy',$event->id) }}" method="Post">
                        <x-info-anchor :href="route('events.edit',$event->id)">{{ __('Editar') }}</x-info-anchor>
                        @csrf
                        @method('DELETE')
                        <x-danger-button type="submit" class="btn btn-danger">Eliminar</x-danger-button>
                    </form>
                </td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{ $event->title }}</td>
                <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                    {{ $event->description }}</td> --}}
                    {{-- </tr> --}}
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
