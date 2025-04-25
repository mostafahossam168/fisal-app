@extends('layouts.app', [
    'title' => ' الرئيسية',
    'catName' => 'dashboard',
    'breadcrumbs' => [' الرئيسية'],
    'scrollspy' => 0,
    'simplePage' => 0,
])


@section('content')
    <x-toster></x-toster>
@endsection
