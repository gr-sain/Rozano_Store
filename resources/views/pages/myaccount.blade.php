@extends('comman.main')

@section('content')
    @include('componets/breadcrumb', [
        'items' => [
            ['label' => 'My Account']
        ]
    ])
    @include('componets.myaccount')
@endsection