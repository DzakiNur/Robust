@extends('layouts.app')
@section('content')

<style>
    .container {
        text-align: center;
    }

    .form-control {
        width: 50%;
        
    }
</style>

<form action="{{route('storeCategory')}}" method="post">
    @csrf
    <div class="container mb-3 mt-5">
      <label for="name" class="form-label">Name</label>
      <input type="text" name="name" class="form-control" id="name">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection