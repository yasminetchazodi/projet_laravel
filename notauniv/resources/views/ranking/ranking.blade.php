<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Classement des universités') }}
        </h2>
    </x-slot>

    <div class="py-12 d-flex justify-content-center align-items-center"> <!-- Ajout des classes Bootstrap -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-center"> <!-- Ajout de la classe text-center -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-center">Classement des universités</h1>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Position</th>
                                <th>Nom de l'Université</th>
                                <th>Score moyen</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($universities as $key => $university)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $university->name }}</td>
                                    <td>{{ $university->average_score }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
