@extends('comman.main')

@section('content')
    @include('componets/breadcrumb', [
        'items' => [
            ['label' => 'Fashion'],
            ['label' => 'Henley Shirt']
        ]
    ])
    @include('componets.details')
@endsection