@extends('layouts.admin')

@section('content')

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id=deleteModalLabel>Confirm post delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Sei sicuro di voler eliminare la categoria con id: @{{itemid}} ?
      </div>
     
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-secondary" @@click="submitForm()">Save changes</button>
      </div>
    </div>
  </div>

</div>
<a href="{{route('admin.categories.create',)}}" class="btn btn-primary">Crea un nuovo post</a>
@if (session()->has('message'))
  <div class="alert alert-success">
    {{session()->get('message')}}
  </div>
    
@endif


<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Creation date</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($categories as $category)
    <tr>
      
      <td><a href="{{route('admin.categories.show', $category->id)}}">{{$category->id}}</a></td>
      <td><a href="{{route('admin.categories.show', $category->id)}}">{{$category->title}}</a></td>
      <td>{{$category->created_at}}</td>
      <td><a href="{{route('admin.categories.edit', $category->id)}}" class="btn btn-primary">Edit</a></td>
      <td>
        <form action="{{route('admin.categories.destroy',$category->id)}}" method="post">
          @csrf
          @method('DELETE')
          <button type="submit" @@click="openModal($event, {{$category->id}})" class="btn btn-warning delete">Delete</button>
        </form>
      </td>
    </tr> 
    @endforeach
     
     
    </tbody>
  </table>
  {{ $categories->links()}}
@endsection