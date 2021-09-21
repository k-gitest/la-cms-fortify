<?php
$title = '投稿編集';
?>
@extends('back.layouts.base')
 
@section('content')
<div class="card-header">投稿編集</div>
<div class="card-body">
    <form method="post" action="{{ route('back.posts.update', $post) }}">
    @csrf
    @method('PUT')
    @include('back.posts._form')
    </form>
</div>
@endsection