<!-- resources/views/frontend/classement.blade.php -->
@extends('frontend.base')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center">Classement des universités</h1>

            <table class="table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Score moyen</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($universities as $university)
                        <tr>
                            <td>{{ $university->name }}</td>
                            <td>{{ $university->average_score }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
