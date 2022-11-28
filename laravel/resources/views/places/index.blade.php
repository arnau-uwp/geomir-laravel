@extends('layouts.box-app')

@section('box-title')
    {{ __('Places') }}
@endsection

@section('box-content')
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <td scope="col">'ID'</td>
                    <td scope="col">Name</td>
                    <td scope="col">Description</td>
                    <td scope="col">File</td>
                    <td scope="col">Lat</td>
                    <td scope="col">Lng</td>
                    <td scope="col">visibility_id</td>
                    <td scope="col">Created</td>
                    <td scope="col">Updated</td>
                    <td scope="col"></td>
                    <td scope="col"></td>
                </tr>
            </thead>
            <tbody>
                @foreach ($places as $place)
                <tr>
                    <td>{{ $place->id }}</td>
                    <td>{{ $place->name }}</td>
                    <td>{{ substr($place->description,0,10) . "..." }}</td>
                    <td>{{ $place->file_id }}</td>
                    <td>{{ $place->latitude }}</td>
                    <td>{{ $place->longitude }}</td>
                    <td>{{ $place->visibility_id }}</td>
                    <td>{{ $place->created_at }}</td>
                    <td>{{ $place->updated_at }}</td>
                    <td>
                        <a title="{{ _('View') }}" href="{{ route('places.show', $place) }}">👁️</a>
                        <a title="{{ _('Edit') }}" href="{{ route('places.edit', $place) }}">📝</a>
                        <a title="{{ _('Delete') }}" href="{{ route('places.show', [$place, 'delete' => 1]) }}">🗑️</a>
                    </td>
                    <td>
                        @if($place->authUserHasFavorite())
                        <form action="{{ route('places.unfavorite', $place) }}" method="post">
                        @csrf
                            <button>
                                like
                            </button>
                        </form>
                        @else
                            <form action="{{ route('places.favorite', $place) }}" method="post">
                            @csrf
                                <button>
                                    unlike
                                </button>
                            </form> 
                        @endif
                    </td>                
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <a class="btn btn-primary" href="{{ route('places.create') }}" role="button">➕ {{ _('Add new place') }}</a>
@endsection