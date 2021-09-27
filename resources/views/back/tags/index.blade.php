<?php
$title = 'タグ一覧';
?>
@extends('back.layouts.base')
 
@section('content')
<div class="card-header">{{ $title }}</div>
<div class="card-body">
    
    <a href="{{ route('back.tags.create') }}" class="btn btn-primary mb-3">新規登録</a>
    
    @if(0 < $tags->count())
        <table class="table table-striped table-bordered table-hover table-sm">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">タグ名</th>
                    <th scope="col" >スラッグ</th>
                    <th scope="col" >編集</th>
                </tr>
            </thead>
            <tbody>
            @foreach($tags as $tag)
                <tr>
                    <td>{{ $tag->id }}</td>
                    <td>{{ $tag->name }}</td>
                    <td>{{ $tag->slug }}</td>
                    <td class="d-flex justify-content-center">
                    
                        <a href="{{ route('back.tags.edit' , $tag->id) }}" class="btn btn-secondary btn-sm m-1">編集</a>

                        <form method="post" action="{{ route('back.tags.destroy' , $tag->id) }}">
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
            {{ $tags->links() }}
        </div>
    @endif
</div>
@endsection