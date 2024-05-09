@extends('frontend.base')
@section('content')

<section class="bg-02-a">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="_head_01">
                    <h2>Universités</h2>
                    <p>Accueil<i class="fas fa-angle-right"></i><span>Universités</span></p>
                </div>
            </div>
        </div>
    </div>
</section>

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
                                <th class="px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($universities as $university)
                            <tr class="{{ $loop->even ? 'bg-gray-100' : 'bg-gray-50' }}">
                                <td class="border px-4 py-2">{{ $university->name }}</td>
                                <td class="border px-4 py-2">{{ $university->description }}</td>
                                <td class="border px-4 py-2">{{ $university->location }}</td>
                                <td class="border px-4 py-2">                
                                    <!-- Bouton pour noter -->
                                    <button>
                                        <a href="{{ route('rateun', ['universityId' => $university->id]) }}" class="bg-yellow-500 hover:bg-yellow-700 text-black font-bold py-2 px-3 rounded">Noter</a>
                                    </button>
                                    
                                    <button>
                                        <a href="{{ route('showun',['id' => $university->id]) }}" class="bg-green-500 hover:bg-green-700 text-black font-bold py-2 px-3 rounded">Détails</a>
                                    </button>
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
    </div>
</div>
@endsection
