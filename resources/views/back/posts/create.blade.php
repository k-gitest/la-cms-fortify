<?php
$title = '投稿登録';
?>
@extends('back.layouts.base')
 
@section('content')
    <div class="card-header">{{ $title }}</div>
    <div class="card-body">
        <form method="post" action="back.posts.store">
        @csrf
        @include('back.posts._form')
        </form>
    </div>
@endsection