@extends('layouts.app')
@section('content')
    
<style>
/* table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 16px;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
} */

table {
    font-size: 18px;
}
</style>
</head>
<body>
    <div class="row mt-5">
        <div class="col-8">        
            <a href="{{ route('product_create') }}" class="btn btn-primary">Create Product</a>
       </div>
       <div class="col-4">
            <input type="text" placeholder="Search Product...." value="{{request()->search}}" id="input-search" class="form-control">
       </div>
    </div>
    <table class="table table-striped table-hover mt-3">
        <thead>  
            <tr>
                <th>Name Product</th>
                <th>Price Product</th>
                <th>Description</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $product as $products )
            <tr>
                <td>{{$products->name}}</td>
                <td>{{$products->price}}</td>
                <td>{{$products->description}}</td>
                <td>{{$products->category->name}}</td>
                <td>
                    <form action="{{route('delete', $products->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <a href="{{route('edit', $products->id)}}" class="btn btn-primary">Edit</a>
                        <button class="btn btn-danger" onclick="confirm('Are you sure? ')">Delete</button>
                    </form>
                </td>
            </tr>   
            @endforeach
        </tbody>
    </table>

    {{$product->links()}}

@endsection

@push('script')
    <script>
        var searchInput = document.getElementById('input-search');
        searchInput.addEventListener('keypress', function(e) {
            if(e.keyCode == 13) {
                window.location.href = '/product?search='+e.target.value
            }
        })
    </script>
@endpush