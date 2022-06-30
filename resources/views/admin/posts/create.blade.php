@extends('layouts.admin')

@section('content')
<form action="{{route('admin.posts.store')}}" method="POST" enctype="multipart/form-data" class="container">
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}" placeholder="Inserisci titolo" required>
    </div>
    <div class="mb-3">
      <label for="content" class="form-label">content</label>
      <textarea name="content" id="content" cols="30" rows="10">{{old('content')}}</textarea>
    </div>

    <div class="mb-3">
      <label for="category" class="form-label">Category</label>
      <select name="category_id" id="category" class="form-control">
        <option value="">Select category</option>
        @foreach ($categories as $category)
          <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
      </select>
    </div>

    
      <div class="form-group">
        <img id="uploadPreview" width="100" src="https://via.placeholder.com/300x200">
        <label for="image">Aggiungi immagine</label>
        <input type="film" id="image" name="image" onchange="boolpress.previewImge();">
        @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
  

    <div class="mb-3">
      <div class="form-group">
        <h5>Tags</h5>
        @foreach ($tags as $tag)
          <div class="form-check-inline">
            <input type="checkbox" class="form-check-input" {{in_array($tag->id, old("tags", [])) ? 'chexked' : ''}} id="{{$tag->slug}}" name="tags[]" value="{{$tag->id}}">
            <label class="form-check-label"  for="{{$tag->slug}}">{{$tag->name}}</label>
          </div>
        @endforeach
      </div>
    </div>


    <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" {{old('published') ? 'chexked' : ''}} id="published" name="published">
      <label class="form-check-label"  for="published">Pubblicato</label>
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection