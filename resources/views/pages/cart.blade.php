@extends('comman.main')

@section('content')
    @include('componets/breadcrumb', [
        'items' => [
            ['label' => 'Cart']
        ]
    ])
    @include('componets.cart')
@endsection