@extends('admin.master')

@section('body')
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="text-center text-success">{{ Session::has('success') ? Session::get('success') : '' }}</p>
                    <h4 class="card-title">Manage Brand</h4>
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-striped border">
                            <thead>
                            <tr>
                                <th>SL NO</th>
                                <th>Brand Name</th>
                                <th>Brand Description</th>
                                <th>Brand Image</th>
                                <th>Publication Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($brands as $brand)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $brand->name }}</td>
                                        <td>{!! $brand->description !!}</td>
                                        <td>
                                            <img src="{{ asset($brand->image) }}" alt="" style="height: 60px">
                                        </td>
                                        <td>{{ $brand->status == 1 ? 'published' : 'unpublished' }}</td>
                                        <td>
                                            <a href="{{ route('brands.edit', $brand->id) }}" class="btn btn-success">
                                                <i class="ti-settings"></i>
                                            </a>
                                            <form action="{{ route('brands.destroy', $brand->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button onclick="return confirm('Are You Sure Want To Delete This Brand?');" class="btn btn-danger">
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
