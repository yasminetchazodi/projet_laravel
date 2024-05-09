@extends('frontend.base')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center mb-4">Détails de l'Université {{ $university->name }}</h2>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Nom</th>
                                <th scope="col">Description</th>
                                <th scope="col">Emplacement</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $university->name }}</td>
                                <td>{{ $university->description }}</td>
                                <td>{{ $university->location }}</td>
                                <td>
                                    <a href="{{ route('rateun', ['universityId' => $university->id]) }}" class="btn btn-warning">Noter</a>
                                    <a href="{{ route('create_comment', ['universityId' => $university->id]) }}" class="btn btn-primary">Ajouter un commentaire</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
