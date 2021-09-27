<?php
$title = 'ユーザー編集';
?>
@extends('back.layouts.base')
 
@section('content')
<div class="card-header">{{ $title }}</div>

<div class="card-body">
    <form method="post" action="{{ route('back.users.update', $user) }}">
    @csrf
    @method('PUT')
    @include('back.users._form')
    </form>
</div>

<table class="table">
    <tr>
        <th>登録日時</th>
        <td>{{ $user->created_at }}</td>
    </tr>
    <tr>
        <th>編集日時</th>
        <td>{{ $user->updated_at }}</td>
    </tr>
</table>
@endsection