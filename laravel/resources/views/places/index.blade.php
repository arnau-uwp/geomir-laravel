@extends('layouts.box-app')

@section('box-title')
    {{ __('Places') }}
@endsection

@section('box-content')

@foreach ($places as $place)
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

                @endforeach
                </tbody>
        </table>



    </div>
    <a class="btn btn-primary" href="{{ route('places.create') }}" role="button">➕ {{ _('Add new place') }}</a>
@endsection




