@extends('layouts.box-app')
@vite('resources/js/posts/create.js')

@section('box-title')
    {{ __('Add post') }}
@endsection

@section('box-content')
    <form id="create" method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="body">{{ _('Body') }}</label>
            <textarea id="body" name="body" class="form-control"></textarea>
            <div id="body-error" class="alert alert-danger alert-dismissible fade show" style="visibility:hidden"></div>

        </div>
        <div class="form-group">
            <label for="upload">{{ _('File') }}</label>
            <input type="file" id="upload" name="upload" class="form-control" />
            <div id="upload-error" class="alert alert-danger alert-dismissible fade show" style="visibility:hidden"></div>

        </div>
        <div class="form-group">            
                <label for="latitude">{{ _('Latitude') }}</label>
                <input type="text" id="latitude" name="latitude" class="form-control"
                    value="41.2310371"/>
                <div id="latitude-error" class="alert alert-danger alert-dismissible fade show" style="visibility:hidden"></div>

        </div>
        <div class="form-group">            
            <label for="longitude">{{ _('Longitude') }}</label>
            <input type="text" id="longitude" name="longitude" class="form-control"
                    value="1.7282036"/>
            <div id="longitude-error" class="alert alert-danger alert-dismissible fade show" style="visibility:hidden"></div>

        </div>
        <div class="form-group">            
            <label for="visibility_id">{{ _('visibility_id') }}</label>
            <input type="number" id="visibility_id" name="visibility_id" class="form-control"
                    value="1"/>
            <div id="visibility_id-error" class="alert alert-danger alert-dismissible fade show" style="visibility:hidden"></div>

        </div>
        <button type="submit" class="btn btn-primary">{{ _('Create') }}</button>
        <button type="reset" class="btn btn-secondary">{{ _('Reset') }}</button>
    </form>
@endsection