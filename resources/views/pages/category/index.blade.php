@extends('layouts.app')
@section('content')
    
<style>
    table {
        font-size: 18px;
    }
</style>
</head>
<body>

    <a href="{{route('category_create')}}" class="btn btn-primary mt-5">Create Category</a>
    <table class="table table-striped table-hover mt-3">
        <thead>  
            <tr>
                <th>Name</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $category as $categories )
            <tr>
                <td>{{$categories->name}}</td>
                <td>{{$categories->created_at}}</td>
                <td>
                    <form action="{{route('deleteCategory', $categories->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <a href="{{route('editCategory', $categories->id)}}" class="btn btn-primary">Edit</a>
                        <button class="btn btn-danger" onclick="confirm('Are you sure? ')">Delete</button>
                    </form>
                </td>
            </tr>   
            @endforeach
        </tbody>
    </table>


@endsection