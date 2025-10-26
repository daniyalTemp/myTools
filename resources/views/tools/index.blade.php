@extends('tools.layout.layout')

@section('content')


    @include('tools.navbar')

{{--    @if(isset($action))--}}
{{--        @dd($action)--}}
{{--    @endif--}}






    @include('tools.enc')

    @include('tools.dec')

    @include('tools.encode')


    @include('tools.decode')

    @include('tools.gis')


@endsection
