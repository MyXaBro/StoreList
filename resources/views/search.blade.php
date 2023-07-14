@extends('layouts.app')

@section('content')
    <h1>Результаты поиска</h1>

    <p>Вы искали: {{ $search }}</p>

    @if ($lists->count() > 0)
        <div class="row">
            @foreach ($lists as $list)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <a href="{{ route('show', $list->id) }}">
                            <img src="{{ asset('storage/' . $list->preview_image) }}" class="card-img-top" alt="Превью">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">{{ $list->title }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>По вашему запросу ничего не найдено.</p>
    @endif
@endsection
