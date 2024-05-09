@extends('frontend.base')
@section('content')
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="w-50">
            <h2 class="text-center mb-4">Ajouter un commentaire pour {{ $university->name }}</h2>
            <form action="{{ route('storeco', ['universityId' => $university->id]) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="content">Contenu du commentaire :</label>
                    <textarea class="form-control" id="content" name="content" rows="5"></textarea>
                    @error('content')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-3">Ajouter le commentaire</button>
            </form>
        </div>
    </div>
@endsection
