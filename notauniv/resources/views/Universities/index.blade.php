<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Universities\'s list') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="overflow-x-auto">
                        <table class="table-auto w-full">
                            <thead>
                                <tr class="bg-gray-200">
                                    <th class="px-4 py-2">Nom</th>
                                    <th class="px-4 py-2">Description</th>
                                    <th class="px-4 py-2">Emplacement</th>
                                    <th class="px-4 py-2">Action</th> <!-- Ajout de la colonne pour l'action -->
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($universities as $university)
                                <tr class="{{ $loop->even ? 'bg-gray-100' : 'bg-gray-50' }}">
                                    <td class="border px-4 py-2">{{ $university->name }}</td>
                                    <td class="border px-4 py-2">{{ $university->description }}</td>
                                    <td class="border px-4 py-2">{{ $university->location }}</td>
                                    <td class="border px-4 py-2">
                                        <!-- Bouton pour éditer -->
                                        <a href="{{ route('editun', $university->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded mr-2">Modifier</a>
                                        <!-- Formulaire pour supprimer -->
                                        <form action="{{ route('destroyun', $university->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="border px-4 py-2 text-center">Aucune université trouvée.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Bouton de création -->
            <div class="mt-4">
                <a href="{{ route('createun') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Ajouter une université</a>
            </div>
        </div>
    </div>
</x-app-layout>
