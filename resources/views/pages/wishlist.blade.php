@extends('comman.main')

@section('content')
    @include('componets/breadcrumb', [
        'items' => [
            ['label' => 'Wishlist']
        ]
    ])
    @include('componets.wishlist')
@endsection