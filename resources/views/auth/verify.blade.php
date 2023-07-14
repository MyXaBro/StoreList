@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Подтвердите свой Email</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Ссылка уже была отправлена на ваш почтовый адресс
                        </div>
                    @endif

                    Вам необходимо проверить свою электронную почту и подтвердить её.
                    Если вы этого ещё не сделали,
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Отправить ещё раз</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
