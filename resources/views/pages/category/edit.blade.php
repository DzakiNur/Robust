@extends('layouts.app')
@section('content')

<form action="{{route('updateCategory', $category->id)}}" method="post">
    @csrf
    @method('put')
    <div class="mb-3 mt-5">
      <label for="name" class="form-label">Name category</label>
      <input type="text" name="name" class="form-control" id="name" value="{{$category->name}}">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection