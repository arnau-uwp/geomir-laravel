@extends('layouts.box-app')

@section('box-title')
    {{ __('Post') . " " . $post->id }}
@endsection

@section('box-content')

<section class="main">
        <div class="wrapper">
            <div class="left-col">
                <div class="post">
                    <div class="info">
                        <div class="user">
                            <div class="profile-pic"><img class="profile" src="{{ asset('storage/'.$post->file->filepath) }}" alt=""></div>
                            <a  title="{{ _('View') }}" href="{{ route('posts.show', $post) }}"><p class="username">{{ $post->id }} {{ substr($post->body,0,10)  }} {{ $post->file_id }}</p></a>
                            <p></p>
                        </div>
                        <a title="{{ _('Edit') }}" href="{{ route('posts.edit', $post) }}" class="options" alt="">📝</a>
                    </div>
                    <img src="{{ asset('storage/'.$post->file->filepath) }}" class="post-image" alt="">
                        <div>   
                            {{$post->likes_count}} @include('partials.buttons-likes')
                    </div>
                        <p class="description"><span>Nombre author</span> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Pariatur tenetur veritatis placeat, molestiae impedit aut provident eum quo natus molestias?</p>
                        <p class="post-time">{{ $post->created_at }}</p>
                        <a title="{{ _('Delete') }}" href="{{ route('posts.show', [$post, 'delete' => 1]) }}"><button class="comment-btn" >Delete</button></a>
                    </div>            
            </div>
        </div>
    </section>



<div class="container" style="margin-bottom:20px">
        <a class="btn" href="{{ route('posts.index') }}" role="button">⬅️ {{ _('Back to list') }}</a>

    </div>
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ _('Are you sure?') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{ _('You are gonna delete post ') . $post->id }}</p>
                    <p>{{ _('This action cannot be undone!') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button id="confirm" type="button" class="btn btn-primary">{{ _('Confirm') }}</button>
                </div>
            </div>
        </div>
    </div>

    @vite('resources/js/delete-modal.js')

@endsection
