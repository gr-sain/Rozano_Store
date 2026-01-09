@extends('comman.main')

@section('content')
    @include('componets/breadcrumb', [
        'items' => [
            ['label' => 'Shop', 'url' => url('/shop')],
            ['label' => 'Compare']
        ]
    ])
    @include('componets.compare')
@endsection