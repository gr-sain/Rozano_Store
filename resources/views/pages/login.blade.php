@extends('comman.main')


@section('content')
    @include('componets/breadcrumb', [
        'items' => [
            ['label' => 'Login']
        ]
    ])
    @include('componets.login')
@endsection