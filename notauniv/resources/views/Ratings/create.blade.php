@extends('frontend.base')
@section('content')

<section class="bg-02-a">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="_head_01">
                    <h2>Noter une université</h2>
                    <p>Accueil<i class="fas fa-angle-right"></i><span>Notation</span></p>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <form action="{{ route('rating', ['universityId' => $university->id]) }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="university_id" class="block text-gray-700 text-sm font-bold mb-2">Université :</label>
                        <select name="university_id" id="university_id" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="{{ $university->id }}">{{ $university->name }}</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="criteria_id">Critère:</label>
                        <select name="criteria_id" id="criteria_id" class="form-control" required>
                            <option value="">Sélectionner un critère</option>
                            @foreach($criteriaList as $criteria)
                                <option value="{{ $criteria->id }}">{{ $criteria->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="score" class="block text-gray-700 text-sm font-bold mb-2">Note (de 1 à 5) :</label>
                        <input type="number" name="score" id="score" min="1" max="5" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">Noter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
