<?php
$title = '投稿登録';
?>
@extends('back.layouts.base')
 
@section('content')
    <div class="card-header">{{ $title }}</div>
    <div class="card-body">
        <form method="post" action="{{ route('back.posts.store') }}">
        @csrf
        @method('POST')
        @include('back.posts._form')
        </form>
    </div>
@endsection