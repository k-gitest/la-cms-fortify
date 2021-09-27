<?php
$title = 'ユーザー一覧';
?>
@extends('back.layouts.base')
 
@section('content')
<div class="card-header">{{ $title }}</div>
<div class="card-body">
    
    <a href="{{ route('back.users.create') }}" class="btn btn-primary mb-3">新規登録</a>
    
    @if(0 < $users->count())
        <table class="table table-striped table-bordered table-hover table-sm">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">ユーザー名</th>
                    <th scope="col" >メールアドレス</th>
                    <th scope="col" >権限</th>
                    <th scope="col" >編集</th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role_label }}</td>
                    <td class="d-flex justify-content-center">
                    
                        <a href="{{ route('back.users.edit' , $user->id) }}" class="btn btn-secondary btn-sm m-1">編集</a>

                        <form method="post" action="{{ route('back.users.destroy' , $user->id) }}">
                            @csrf
                            @method('DELETE')
                        <input type="submit" value="削除" onClick="return confirm('本当に削除しますか?')" class="btn btn-danger btn-sm m-1">
                        </form>
                        
                    </td>
                    
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $users->links() }}
        </div>
    @endif
</div>
@endsection