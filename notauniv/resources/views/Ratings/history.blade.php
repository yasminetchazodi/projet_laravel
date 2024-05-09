@extends('frontend.base')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="bg-white p-4 shadow-sm rounded-lg">
                <h1 class="text-center mb-4">Votre Historique de notations</h1>
                <ul>
                    @foreach ($userRatings as $rating)
                        <li class="mb-3">
                            <strong>Date :</strong> {{ $rating->created_at }} <br>
                            <strong>Note :</strong> {{ $rating->score }} <br>
                            <strong>Université :</strong> {{ $rating->university->name }} <br>
                            <strong>Critère :</strong> {{ $rating->criteria->name }} <br>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
