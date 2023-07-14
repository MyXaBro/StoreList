@extends('personal.layouts.layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование списка</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('personal.index')}}">Личный кабинет</a></li>
                            <li class="breadcrumb-item active"><a href="{{route('list.index')}}">Списки</a></li>
                            <li class="breadcrumb-item active">Редактирование списка</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <form action="{{route('list.update', $list->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group w-25">
                                <label for="title">Название</label>
                                @error('title')
                                <div class="text-danger mt-1">{{$message}}</div>
                                @enderror
                                <input type="text" name="title" class="form-control" id="title"
                                       placeholder="Введите название списка" value="{{ $list->title }}">
                            </div>
                            <div class="form-group">
                                <label for="summernote">Творите</label>
                                @error('content')
                                <div class="text-danger mt-1">{{$message}}</div>
                                @enderror
                                <textarea id="summernote" name="content">{{ $list->content }}</textarea>
                            </div>
                            <div class="form-group w-50">
                                <label for="exampleInputFile">Добавить превью</label>
                                <div class="w-25 mb-3">
                                    <img src="{{ asset('storage/' . $list->preview_image) }}" alt="preview_image" class="w-50">
                                </div>
                                @error('preview_image')
                                <div class="text-danger mt-1">{{$message}}</div>
                                @enderror
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="preview_image">
                                        <label class="custom-file-label">Выбрать фото</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Загрузить</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Добавить теги
                                <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Выбрать теги"
                                        style="width: 100%;">
                                    @foreach($tags as $tag)
                                        <option {{ is_array($list->tags->pluck('id')->toArray()) && in_array($tag->id, $list->tags->pluck('id')->toArray()) ? ' selected' : ''}} value="{{$tag->id}}">{{$tag->title}}</option>
                                    @endforeach
                                </select>
                                </label>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Обновить">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
