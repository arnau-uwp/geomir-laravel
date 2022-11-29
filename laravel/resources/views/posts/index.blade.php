@extends('layouts.box-app')

@section('box-title')
    {{ __('Files') }}
@endsection

@section('box-content')

@foreach ($posts as $post)


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
                        <p class="likes">   
                            <p>{{$post->likes_count}} @include('partials.buttons-likes')</p>
                        </p>
                        <p class="description"><span>Nombre author</span> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Pariatur tenetur veritatis placeat, molestiae impedit aut provident eum quo natus molestias?</p>
                        <p class="post-time">{{ $post->created_at }}</p>
                        <a title="{{ _('Delete') }}" href="{{ route('posts.show', [$post, 'delete' => 1]) }}"><button class="comment-btn" >Delete</button></a>
                    </div>            
            </div>
        </div>
    </section>
    
@endforeach
            </tbody>
        </table>



    </div>
    <a class="btn btn-primary" href="{{ route('posts.create') }}" role="button">➕ {{ _('Add new post') }}</a>
@endsection