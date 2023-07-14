@extends('personal.layouts.layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавление нового списка</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route('personal.index')}}">Личный кабинет</a></li>
                            <li class="breadcrumb-item active"><a href="{{route('list.index')}}">Посты</a></li>
                            <li class="breadcrumb-item active">Добавление списка</li>
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
                        <form action="{{ route('list.save') }}" id="list-form" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group w-25">
                                <label for="title">Название</label>
                                @error('title')
                                <div class="text-danger mt-1">{{$message}}</div>
                                @enderror
                                <input type="text" name="title" class="form-control" id="title"
                                       placeholder="Введите название списка" value="{{old('title')}}">
                            </div>
                            <div class="form-group">
                                <label for="summernote">Творите</label>
                                @error('content')
                                <div class="text-danger mt-1">{{$message}}</div>
                                @enderror
                                <textarea id="summernote" name="content">{{old('content')}}</textarea>
                            </div>
                            <div class="form-group w-50">
                                <label for="exampleInputFile">Добавить превью</label>
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
                                        <option {{ is_array( old('tag_ids')) && in_array($tag->id, old('tag_ids')) ? ' selected' : ''}} value="{{$tag->id}}">{{$tag->title}}</option>
                                    @endforeach
                                </select>
                                </label>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Добавить">
                            </div>
                        </form>
                        <div id="success-message" style="display: none;">
                            Список успешно сохранен!  <a href="{{ route('list.index') }}" class="btn btn-primary">Вернуться</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#list-form').submit(function(e) {
                e.preventDefault();

                var form = $(this);

                $.ajax({
                    url: "{{ route('list.save') }}",
                    method: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(response) {
                        $('#success-message').show();
                        form[0].reset();
                    }
                });
            });
        });
    </script>

@endsection
