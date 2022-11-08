@extends('layouts.app')
 
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">{{ __('Files') }}</div>
               <div class="card-body">
                   <table class="table">
                       <thead>
                           <tr>
                               <td scope="col">ID</td>
                               <td scope="col">Filepath</td>
                               <td scope="col">Filesize</td>
                               <td scope="col">Created</td>
                               <td scope="col">Updated</td>
                           </tr>
                       </thead>
                       <tbody>
			<tr>
                               <td>{{ $file->id }}</td>
                               <td><img class="img-fluid" src="{{ asset("storage/{$file->filepath}") }}"/></td>
                               <td>{{ $file->filesize }}</td>
                               <td>{{ $file->created_at }}</td>
                               <td>{{ $file->updated_at }}</td>
                           </tr>
                       </tbody>
                   </table>
                   <a class="btn btn-primary" href="{{ route('files.create') }}" role="button">Add new file</a>
                   <a class="btn btn-primary" href={{ route('files.edit',$file)}} role="button">Edit file</a>
                   <a class="btn btn-primary" href="{{ route('files.destroy',$file) }}" role="button">Destroy file</a>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection