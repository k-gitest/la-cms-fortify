<?php
$title = '投稿一覧';
?>
@extends('back.layouts.base')
 
@section('content')
<div class="card-header">投稿一覧</div>
<div class="card-body">
    
    <a href="{{ route('back.posts.create') }}" class="btn btn-primary mb-3">新規登録</a>
    
    @if(0 < $posts->count())
        <table class="table table-striped table-bordered table-hover table-sm">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">タイトル</th>
                    <th scope="col" style="width: 4.3em">状態</th>
                    <th scope="col" style="width: 9em">公開日</th>
                    <th scope="col" style="width: 12em">編集</th>
                    <th scope="col">編集者</th>
                </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->is_public_label }}</td>
                    <td>{{ $post->published_format }}</td>
                    <td class="d-flex justify-content-center">
                      
                        <a href="{{ route('front.posts.show' , $post->id) }}" class="btn btn-secondary btn-sm m-1" target="_blank">詳細</a>
                    
                        <a href="{{ route('back.posts.edit' , $post->id) }}" class="btn btn-secondary btn-sm m-1">編集</a>

                        <form method="post" action="{{ route('back.posts.destroy' , $post->id) }}">
                            @csrf
                            @method('DELETE')
                        <input type="submit" value="削除" onClick="return confirm('本当に削除しますか?')" class="btn btn-danger btn-sm m-1">
                        </form>
                        
                    </td>
                    <td>{{ $post->user->name }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    @endif
</div>
@endsection