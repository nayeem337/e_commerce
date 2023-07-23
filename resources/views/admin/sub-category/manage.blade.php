@extends('admin.master')

@section('title','Manage Sub Category')

@section('body')
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">Manage Sub Category</h4>
                    <h6 class="card-subtitle text-center">Data table example</h6>
                    <div class="col-md-3">
                        <a href="{{ route('sub-category.add') }}" class="btn btn-success">Add Category</a>
                    </div>
                    <hr>
                    <div class="text-center">
                        <h5 class="text-success">
                            {{Session::get('success')}}
                        </h5>
                    </div>
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-striped border">
                            <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Category Name</th>
                                <th>Sub Category Name</th>
                                <th>Sub Category Description</th>
                                <th>Sub Category Image</th>
                                <th>Publication Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sub_categories as $sub_category)

                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{optional($sub_category->category)->name}}</td>
                                    <td>{{$sub_category->name}}</td>
                                    <td>{{$sub_category->description}}</td>
                                    <td>
                                        <img src="{{asset($sub_category->image)}}" style="height: 80px" alt="">
                                    </td>
                                    <td>{{$sub_category->status==1 ? 'Published' :'Unpublished'}}</td>
                                    <td>
                                        <a href="{{route('sub-category.edit',['id'=>$sub_category->id])}}" class="btn btn-success btn-sm">
                                            <i class="ti-agenda"></i>
                                        </a>
                                        <a href="{{route('sub-category.delete',['id'=>$sub_category->id])}}" onclick="return confirm('Are You Sure ?')" class="btn btn-danger btn-sm">
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
