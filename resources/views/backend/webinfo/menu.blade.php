@extends('backend.layouts.main')

@section('title')
{{$page_name}}
@endsection

@section('css')
@endsection

@section('content')
    {!! Menu::render() !!}
@endsection

@section('js')
    {!! Menu::scripts() !!}
@endsection
