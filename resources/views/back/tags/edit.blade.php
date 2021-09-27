<?php
$title = 'ユーザー編集';
?>
@extends('back.layouts.base')
 
@section('content')
<div class="card-header">{{ $title }}</div>

<div class="card-body">
    <form method="post" action="{{ route('back.tags.update', $tag) }}">
    @csrf
    @method('PUT')
    @include('back.tags._form')
    </form>
</div>

<table class="table">
    <tr>
        <th>登録日時</th>
        <td>{{ $tag->created_at }}</td>
    </tr>
    <tr>
        <th>編集日時</th>
        <td>{{ $tag->updated_at }}</td>
    </tr>
</table>
@endsection