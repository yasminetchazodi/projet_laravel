<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des notations') }}
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
                                <th class="px-4 py-2">Utilisateur</th>
                                <th class="px-4 py-2">Note</th>
                                <th class="px-4 py-2">Université concernée</th>
                                <th class="px-4 py-2">Actions</th> 
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($ratings as $rating)
                                <tr class="{{ $loop->even ? 'bg-gray-100' : 'bg-gray-50' }}">
                                    <td class="border px-4 py-2">{{ $rating->user->name }}</td>
                                    <td class="border px-4 py-2">{{ $rating->score }}</td>
                                    <td class="border px-4 py-2">{{ $rating->university->name }}</td>
                                    <td class="border px-4 py-2">
                                        <!-- Formulaire pour supprimer -->
                                        <form action="{{ route('destroyra', $rating->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="border px-4 py-2 text-center">Pas encore de notation</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>
</div>
</x-app-layout>