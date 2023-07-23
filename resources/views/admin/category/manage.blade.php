@extends('admin.master')

@section('title','Add Category')

@section('body')
    <div class="row">

        <div class="card">
            <div class="card-body">
                <div class="col-md-12">
                    <div class="col-md-9">
                        <h4 class="card-title">Data Table</h4>
                        <h6 class="card-subtitle">Data table example</h6>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('category.add') }}" class="btn btn-success">Add Category</a>
                    </div>
                </div>

                <div class="text-center">

                    <h5 class="text-success">
                        {{Session::get('success')}}
                    </h5>
                </div>
                <div class="table-responsive m-t-40">
                    <table id="myTable" class="table table-striped border">
                        <thead>
                        <tr>
                            <th>SL Number</th>
                            <th>Category Name</th>
                            <th>Category Description</th>
                            <th>Category Image</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->description}}</td>
                            <td>
                                <img src="{{asset($category->image)}}" alt="" style="height: 80px ; width: 80px">
                            </td>
                            <td>{{ $category->status == 1 ? 'Published' : 'Unpublished' }}</td>
                            <td>
                                <a href="{{route('category.edit',['id' =>$category->id])}}" class="btn btn-success btn-sm">
                                    <i class="ti-agenda"></i>
                                </a>
                                <a href="{{route('category.delete',['id' =>$category->id])}}" onclick="return confirm('Are You sure')" class="btn btn-danger btn-sm">
                                    <i class="ti-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
