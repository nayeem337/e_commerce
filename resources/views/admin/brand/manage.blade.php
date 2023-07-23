@extends('admin.master')

@section('title','Add Brand')

@section('body')
    <div class="row">

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Table</h4>
                <h6 class="card-subtitle">Data table example</h6>
                <div class="col-md-3">
                    <a href="{{ route('brand.add') }}" class="btn btn-success">Add Brand</a>
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
                            <td>{{$loop->iteration}}</td>
                            <td>{{$brand->name}}</td>
                            <td>{{$brand->description}}</td>
                            <td>
                                <img src="{{asset($brand->image)}}" alt="" style="height: 80px ; width: 80px">
                            </td>
                            <td>{{ $brand->status == 1 ? 'Published' : 'Unpublished' }}</td>
                            <td>
                                <a href="{{route('brand.edit',['id' =>$brand->id])}}" class="btn btn-success btn-sm">
                                    <i class="ti-agenda"></i>
                                </a>
                                <a href="{{route('brand.delete',['id' =>$brand->id])}}" onclick="return confirm('Are You sure')" class="btn btn-danger btn-sm">
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
