<?php
$title = '投稿一覧';
?>
@extends('front.layouts.base')
 
@section('content')
<div class="card-header">{{ $title }}</div>
<div class="card-body">
    @if($posts->count() <= 0)
        <p>表示する投稿はありません。</p>
    @else
        <table class="table">
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->published_format }}</td>
                    <td><a href="{{ route('front.posts.show' , $post->id) }}">{{ $post->title}}</a></td>
                </tr>
            @endforeach
        </table>
        <div class="d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    @endif
</div>
@php
var_dump($posts)
@endphp
<ul class="nav nav-pills mb-2">
    <li class="nav-item">
        <a href="{{ route('front.posts.index') }}" class="nav-link{{ request()->segment(3) === null ? ' active' : '' }}">すべて</a>
    </li>
    @if(isset($tag))
        @foreach($tags as $tag)
            <li class="nav-item">
                <a href="{{ route('front.posts.index.tag') }}" name="$tag->slug" class="nav-link{{ request()->segment(3) === $tag->slug ? ' active' : '' }}">$tag->name</a>
            </li>
        @endforeach
    @endif
</ul>
@endsection