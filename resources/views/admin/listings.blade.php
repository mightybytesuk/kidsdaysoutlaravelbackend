@extends('layouts.admin')

@section('content')
<div class="container">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Image</th>
            <th scope="col">Website</th>
            <th scope="col">Actions</th>

          </tr>
        </thead>
        <tbody>
            @foreach ($listings as $listing)
            <tr>
                <th scope="row">{{$listing->id}}</th>
                <td>{{$listing->name}}</td>
                <td>This will be image</td>
                <td>{{$listing->website}}</td>
                <td><button class="btn btn-danger">Delete</button></td>

              </tr>
              
            @endforeach
        </tbody>
      </table>
    
</div>
@endsection