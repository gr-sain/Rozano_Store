@extends('comman.main')


@section('content')
    @include('componets/breadcrumb', [
        'items' => [
            ['label' => 'Login & Register']
        ]
    ])
    @include('componets.login-register')
@endsection