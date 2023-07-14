@extends('personal.layouts.layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Личный кабинет</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Личный кабинет</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $data['listsCount'] }}</h3>

                                <p>Списки</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-clipboard"></i>
                            </div>
                            <a href="{{route('list.index')}}" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $data['tagsCount'] }}</h3>

                                <p>Теги</p>
                            </div>
                            <div class="icon">
                                <i class="fa-solid fa-tags"></i>
                            </div>
                            <a href="{{route('tag.index')}}" class="small-box-footer">Подробнее <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                </div>


            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
