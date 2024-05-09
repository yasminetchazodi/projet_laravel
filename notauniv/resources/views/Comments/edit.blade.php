<!-- resources/views/frontend/edit_comment.blade.php -->

@extends('frontend.base')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Modifier le  Commententaire</div>

                <div class="card-body">
                    <form action="{{ route('updateco', $comment->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="content">Content:</label>
                            <textarea name="content" id="content" class="form-control" rows="4">{{ $comment->content }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary"> Valider</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
