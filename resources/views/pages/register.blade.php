@extends('comman.main')


@section('content')
    @include('componets/breadcrumb', [
        'items' => [
            ['label' => 'Register']
        ]
    ])
    @include('componets.register')
@endsection