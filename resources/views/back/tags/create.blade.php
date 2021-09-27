<?php
$title = 'ユーザー登録';
?>
@extends('back.layouts.base')
 
@section('content')
    <div class="card-header">{{ $title }}</div>
    <div class="card-body">
        <form method="post" action="{{ route('back.tags.store') }}">
        @csrf
        @method('POST')
        @include('back.tags._form')
        </form>
    </div>
@endsection