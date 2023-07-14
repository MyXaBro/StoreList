@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center">{{ $list->title }}</h2>
                        <img src="{{ asset('storage/' . $list->preview_image) }}" alt="Превью" class="img-fluid mx-auto d-block">
                        <div class="content mt-2">
                            {!! htmlspecialchars_decode($list->content) !!}
                        </div>
                        <div class="tags">
                            <strong>Теги:</strong>
                            @foreach($list->tags as $tag)
                                <span class="badge badge-primary text-dark">{{ $tag->title }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

