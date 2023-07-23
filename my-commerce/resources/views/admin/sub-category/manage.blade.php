@extends('admin.master')

@section('body')
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <span>{{ Session::has('success') ? Session::get('success') : '' }}</span>
                    <h4 class="card-title">Manage Sub Categories</h4>
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-striped border">
                            <thead>
                            <tr>
                                <th>SL NO</th>
                                <th>Category Name</th>
                                <th>Sub Category Name</th>
                                <th>Sub Category Description</th>
                                <th>Sub Category Image</th>
                                <th>Publication Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($subCategories as $subCategory)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $subCategory->category->name }}</td>
                                        <td>{{ $subCategory->name }}</td>
                                        <td>{!! $subCategory->description !!}</td>
                                        <td>
                                            <img src="{{ asset($subCategory->image) }}" alt="" style="height: 60px">
                                        </td>
                                        <td>{{ $subCategory->status == 1 ? 'published' : 'unpublished' }}</td>
                                        <td>
                                            <a href="{{ route('sub-categories.edit', $subCategory->id) }}" class="btn btn-success">
                                                <i class="ti-settings"></i>
                                            </a>
                                            <form action="{{ route('sub-categories.destroy', $subCategory->id) }}" method="post" onsubmit="return confirm('Are You Sure Want To Delete This Sub Category?')">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="ti-trash"></i>
                                                </button>
                                            </form>
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
