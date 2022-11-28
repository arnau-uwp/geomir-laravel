@extends('layouts.box-app')

@section('box-title')
    {{ __('Post') . " " . $post->id }}
@endsection

@section('box-content')

    <!-- <img class="img-fluid" src="{{ asset('storage/'.$file->filepath) }}" title="Image preview"/>
    <table class="table">
            <tr>
                <td><strong>ID<strong></td>
                <td>{{ $post->id }}</td>
            </tr>
            <tr>
                <td><strong>Body</strong></td>
                <td>{{ $post->body }}</td>
            </tr>
            <tr>
                <td><strong>Lat</strong></td>
                <td>{{ $post->latitude }}</td>
            </tr>
            <tr>
                <td><strong>Lng</strong></td>
                <td>{{ $post->longitude }}</td>
            </tr>
            <tr>
                <td><strong>Visibility_id</strong></td>
                <td>{{ $post->visibility_id }}</td>
            </tr>
            <tr>
                <td><strong>Author</strong></td>
                <td>{{ $author->name }}</td>
            </tr>
            <tr>
                <td><strong>Created</strong></td>
                <td>{{ $post->created_at }}</td>
            </tr>
            <tr>
                <td><strong>Updated</strong></td>
                <td>{{ $post->updated_at }}</td>
            </tr>
        </tbody>
    </table>

    <!-- Buttons 
    
    <div class="container" style="margin-bottom:20px">
        <a class="btn btn-warning" href="{{ route('posts.edit', $post) }}" role="button">📝 {{ _('Edit') }}</a>
        <form id="form" method="POST" action="{{ route('posts.destroy', $post) }}" style="display: inline-block;">
            @csrf
            @method("DELETE")
            <button id="destroy" type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmModal">🗑️ {{ _('Delete') }}</button>
        </form>
        <a class="btn" href="{{ route('posts.index') }}" role="button">⬅️ {{ _('Back to list') }}</a>
        @if(!$boolean)
        <a>
            <form action="{{ route('posts.like', $post) }}" method="post">
            @csrf
                <button>
                    like
                </button>
            </form>
        </a>
        @else
        <a>
        <form action="{{ route('posts.unlike', $post) }}" method="post">
        @csrf
            <button>
                unlike
            </button>
        </form>
        </a>
        @endif
    </div>

    <!-- Modal 
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
    </div> -->

    <section class="main">
    <div class="wrapper">
        <div class="left-col">
            <div class="post">
                <div class="info">
                    <div class="user">
                        <div class="profile-pic"><img src="../../public/img/blue.jpg" alt=""></div>
                        <p class="username">{{ $post->id }} {{ substr($post->body,0,10)  }} {{ $post->file_id }}</p>
                        <p class="username">{{ $author->name }}</p>
                    </div>
                    <img src="{{ asset('storage/'.$post->file->filepath) }}" class="options" alt="">
                </div>
                <img src="{{ asset('storage/'.$post->file->filepath) }}" class="post-image" alt="">
                <div class="post-content">
                    <div class="reaction-wrapper">
                        <img src="img/like.PNG" class="icon" alt="">
                        <img src="img/comment.PNG" class="icon" alt="">
                        <img src="img/send.PNG" class="icon" alt="">
                        <img src="img/save.PNG" class="save icon" alt="">
                    </div>
                    <p class="likes">   

                    @if(!$boolean)
        <a>
            <form action="{{ route('posts.like', $post) }}" method="post">
            @csrf
                <button>
                    like
                </button>
            </form>
        </a>
        @else
        <a>
        <form action="{{ route('posts.unlike', $post) }}" method="post">
        @csrf
            <button>
                unlike
            </button>
        </form>
        </a>
        @endif




                    
                </p>
                    <p class="description"><span>Nombre author</span> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Pariatur tenetur veritatis placeat, molestiae impedit aut provident eum quo natus molestias?</p>
                    <p class="post-time">{{ $post->created_at }}</p>
                </div>
                <div class="comment-wrapper">
                    <img src="img/smile.PNG" class="icon" alt="">
                    <input type="text" class="comment-box" placeholder="Add a comment">
                    <button class="comment-btn">post</button>
                </div>
            </div>



            
        </div>
    </div>
</section>
<div class="container" style="margin-bottom:20px">
        <a class="btn btn-warning" href="{{ route('posts.edit', $post) }}" role="button">📝 {{ _('Edit') }}</a>
        <form id="form" method="POST" action="{{ route('posts.destroy', $post) }}" style="display: inline-block;">
            @csrf
            @method("DELETE")
            <button id="destroy" type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmModal">🗑️ {{ _('Delete') }}</button>
        </form>
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
