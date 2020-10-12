<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Home
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg bg-red-100 w-2/3 p-4 ">
                <form action="{{route('search')}}" method="post" class="flex justify-start items-center">

                    @csrf
                    <div class="form-group w-1/3 mr-2">
                        <select name="location" id="location" class="px-2 py-2 w-full">
                            @foreach ($locations as $location)
                            <option value="{{ $location->name }}">{{ $location->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mr-2 w-1/3">

                        <input type="text" name="text" id="text"
                            class="rounded w-full border border-gray-100 px-2 py-2">
                    </div>

                    <div class="form-group w-1/3">

                        <button type="submit"
                            class="px-2 py-2 bg-indigo-600 hover:bg-indigo-500 text-white w-full rounded">
                            Search</button>
                    </div>



                </form>
                <hr>

                @if(isset($details))
                <p class="mt-10"> The Search results for your query <b> {{ $query }} </b> are :</p>
                <h2>Medicine is avaiable in this location at :</h2>

                <table class="table-auto">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">Medicine Name</th>
                            <th class="px-4 py-2">Pharamcy</th>
                            <th class="px-4 py-2">Location</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($details as $med)
                        <tr>
                            <td class="border px-4 py-2">{{$med->name}}</td>
                            <td class="border px-4 py-2">{{$med->pharmacy->name}}</td>
                            <td class="border px-4 py-2">{{$med->pharmacy->location->name}}</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

                @endif

                @if (isset($message))

                <p class="">{{$message}}</p> for medicine "{{$query}}"

                @endif
            </div>
        </div>
    </div>
</x-app-layout>