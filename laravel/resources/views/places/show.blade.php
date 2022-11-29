@extends('layouts.box-app')

@section('box-title')
    {{ __('Place') . " " . $place->id }}
@endsection

@section('box-content')
<section class="main">
    <div class="wrapper">
        <div class="left-col">
            <div class="post">
                <div class="info">
                    <div class="user">
                        <div class="profile-pic"><img class="profile"  src="{{ asset('storage/'.$place->file->filepath) }}" alt=""></div>
                        <a title="{{ _('View') }}" href="{{ route('places.show', $place) }}"><p class="username">{{ $place->id }} {{ substr($place->body,0,10)}} {{ $place->file_id }}</p></a>
                    </div>
                    <a title="{{ _('Edit') }}" href="{{ route('places.edit', $place) }}" class="options" alt="">📝</a>
                    </div>

                    <img src="{{ asset('storage/'.$place->file->filepath) }}" class="post-image" alt="">
                    <div>
                    {{ $place->favorites_count }} @include('partials.buttons-favorites')
                    <p class="description"><span>Nombre author</span> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Pariatur tenetur veritatis placeat, molestiae impedit aut provident eum quo natus molestias?</p>
                    <p class="post-time">{{ $place->created_at }}</p>
                </div>

                <div class="comment-wrapper">
                <a title="{{ _('Delete') }}" href="{{ route('places.show', [$place, 'delete' => 1]) }}"><button class="comment-btn">Delete</button></a>
                </div>
            </div>

            </div>
    </div>
</section>

    <!-- Buttons -->
    <div class="container" style="margin-bottom:20px">
        <a class="btn" href="{{ route('places.index') }}" role="button">⬅️ {{ _('Back to list') }}</a>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ _('Are you sure?') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{ _('You are gonna delete post ') . $place->id }}</p>
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
