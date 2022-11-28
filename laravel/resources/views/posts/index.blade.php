@extends('layouts.box-app')

@section('box-title')
    {{ __('Files') }}
@endsection

@section('box-content')
    <!-- <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <td scope="col">ID</td>
                    <td scope="col">Body</td>
                    <td scope="col">File</td>
                    <td scope="col">Lat</td>
                    <td scope="col">Lng</td>
                    <td scope="col">Visibility_id</td>
                    <td scope="col">Created</td>
                    <td scope="col">Updated</td>
                    <td scope="col">Modifi</td>
                    <td scope="col" colspan="2"> Like</td>
                </tr>
            </thead>
            <tbody> -->
                @foreach ($posts as $post)


                <section class="main">
    <div class="wrapper">
        <div class="left-col">
            <div class="post">
                <div class="info">
                    <div class="user">
                        <div class="profile-pic"><img src="../../public/img/blue.jpg" alt=""></div>
                        <p class="username">{{ $post->id }} {{ substr($post->body,0,10)  }} {{ $post->file_id }}</p>
                        <p></p>
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
                   
                    @if($post->authUserHasLike())
                        <form action="{{ route('posts.unlike', $post) }}" method="post">
                        @csrf
                            <button>
                                unlike
                            </button>
                        </form>
                        @else
                            <form action="{{ route('posts.like', $post) }}" method="post">
                            @csrf
                                <button>
                                    like
                                </button>
                            </form> 
                        @endif
                        <a title="{{ _('View') }}" href="{{ route('posts.show', $post) }}">👁️</a>
                        <a title="{{ _('Edit') }}" href="{{ route('posts.edit', $post) }}">📝</a>
                        <a title="{{ _('Delete') }}" href="{{ route('posts.show', [$post, 'delete' => 1]) }}">🗑️</a>
                        

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














                <!-- <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ substr($post->body,0,10) . "..." }}</td>
                    <td>{{ $post->file_id }}</td>
                    <td>{{ $post->latitude }}</td>
                    <td>{{ $post->longitude }}</td>
                    <td>{{ $post->visibility_id }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td>{{ $post->updated_at }}</td>
                    <td>
                        <a title="{{ _('View') }}" href="{{ route('posts.show', $post) }}">👁️</a>
                        <a title="{{ _('Edit') }}" href="{{ route('posts.edit', $post) }}">📝</a>
                        <a title="{{ _('Delete') }}" href="{{ route('posts.show', [$post, 'delete' => 1]) }}">🗑️</a>
                    </td>
                    <td>
                        @if($post->authUserHasLike())
                        <form action="{{ route('posts.unlike', $post) }}" method="post">
                        @csrf
                            <button>
                                like
                            </button>
                        </form>
                    </td>
                
                    <td>
                        @else
                        <form action="{{ route('posts.like', $post) }}" method="post">
                        @csrf
                            <button>
                                unlike
                            </button>
                        </form>
                        @endif
                    </td>
                
                </tr> -->



                @endforeach
            </tbody>
        </table>



    </div>
    <a class="btn btn-primary" href="{{ route('posts.create') }}" role="button">➕ {{ _('Add new post') }}</a>
@endsection