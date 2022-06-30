@extends('layouts.admin')
@include('partials/popupdelete')
@section('content')



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
          <button type="submit" onclick="boolpres.openModal(event, {{$category->id}})" class="btn btn-warning delete">Delete</button>
        </form>
      </td>
    </tr> 
    @endforeach
     
     
    </tbody>
  </table>
  {{ $categories->links()}}
@endsection