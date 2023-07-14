@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('includes.sidebar', ['tags' => $tags])
            </div>
            <div class="col-md-9">
                <div class="row">
                    @foreach($filteredLists as $list)
                        <div class="col-md-4 mb-4">
                            <a href="{{ route('show', $list->id) }}" target="_blank">
                                <div class="preview-thumbnail">
                                    <div class="aspect-ratio">
                                        <img src="{{ asset('storage/' . $list->preview_image) }}" alt="Preview Image"
                                             class="img-fluid">
                                    </div>
                                    <div class="preview-overlay">
                                        <h4 class="preview-title">{{ $list->title }}</h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
