@extends('admin.master')

@section('body')
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <span>{{ Session::has('success') ? Session::get('success') : '' }}</span>
                    <h4 class="card-title">Manage Categories</h4>
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-striped border">
                            <thead>
                            <tr>
                                <th>SL NO</th>
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
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{!! $category->description !!}</td>
                                        <td>
                                            <img src="{{ asset($category->image) }}" alt="" style="height: 60px">
                                        </td>
                                        <td>{{ $category->status == 1 ? 'published' : 'unpublished' }}</td>
                                        <td>
                                            <a href="{{ route('category.edit', ['id' => $category->id]) }}" class="btn btn-success">
                                                <i class="ti-settings"></i>
                                            </a>
                                            <a href="{{ route('category.destroy', ['id' => $category->id]) }}" onclick="return confirm('Are You Sure Want To Delete This Category?')" class="btn btn-danger">
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
    </div>
@endsection
