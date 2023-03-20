@extends('layouts.app')
@section('content')

<form action="{{route('store')}}" method="post">
    @csrf
    <div class="mb-3 mt-5">
      <label for="name" class="form-label">Name Product</label>
      <input type="text" name="name" class="form-control" id="name">
      @error('name')
        <div class="text-danger">{{$message}}</div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="price" class="form-label">Price Product</label>
      <input type="number" name="price" class="form-control" id="price">
      @error('price')
        <div class="text-danger">{{$message}}</div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="category_id" class="form-label">Category</label>
      <select name="category_id" class="form-control">
        @foreach ($category as $categories)
          <option value="{{$categories->id}}">{{$categories->name}}</option>
        @endforeach
      </select>
      @error('category_id')
        <div class="text-danger">{{$message}}</div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Description</label>
      <input type="text" name="description" class="form-control" id="description">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection