<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des critères de notation!') }}
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
                                    <th class="px-4 py-2">Action</th> 
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($criterias as $criteria)
                                <tr class="{{ $loop->even ? 'bg-gray-100' : 'bg-gray-50' }}">
                                    <td class="border px-4 py-2">{{ $criteria->name }}</td>
                                    <td class="border px-4 py-2">{{ $criteria->description }}</td>
                                    <td class="border px-4 py-2">
                                        <!-- Bouton pour éditer -->
                                        <a href="{{ route('editcr', $criteria->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded mr-2">Modifier</a>
                                        <!-- Formulaire pour supprimer -->
                                        <form action="{{ route('destroycr', $criteria->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="border px-4 py-2 text-center">Pas encore de critére de notation</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Bouton de création -->
            <div class="mt-4">
                <a href="{{ route('createcr') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Ajouter un critère</a>
            </div>
        </div>
    </div>
</x-app-layout>
