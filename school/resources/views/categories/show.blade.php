@extends('layouts.web')
@section('title', $category->name . ' - Posts List')
@section('content')

<div class="container py-2">
    <h2>{{ $category->name }} - Posts List</h2>
    <hr>

    @if ($category->posts->count() > 0)
    <ul class="list-group mt-3">
        @foreach ($category->posts as $post)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ $post->title }}
            <span class="badge bg-primary rounded-pill">{{ $post->created_at->format('d M Y') }}</span>
        </li>
        @endforeach
    </ul>
    @else
    <div class="alert alert-warning mt-3">
        No posts found under this category.
    </div>
    @endif
</div>

@endsection