@extends('comman.main')

@section('content')
    @include('componets/breadcrumb', [
        'items' => [
            ['label' => 'Shop']
        ]
    ])
    @include('componets.shop')
@endsection