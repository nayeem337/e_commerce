@extends('admin.master')

@section('title','Add Unit')

@section('body')
    <div class="row">

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Table</h4>
                <h6 class="card-subtitle">Data table example</h6>
                <div class="col-md-3">
                    <a href="{{ route('unit.add') }}" class="btn btn-success">Add Unit</a>
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
                            <th>Unit Name</th>
                            <th>Unit Code</th>
                            <th>Unit Description</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($units as $unit)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$unit->name}}</td>
                            <td>{{$unit->code}}</td>
                            <td>{{$unit->description}}</td>
                            <td>{{ $unit->status == 1 ? 'Published' : 'Unpublished' }}</td>
                            <td>
                                <a href="{{route('unit.edit',['id' =>$unit->id])}}" class="btn btn-success btn-sm">
                                    <i class="ti-agenda"></i>
                                </a>
                                <a href="{{route('unit.delete',['id' =>$unit->id])}}" onclick="return confirm('Are You sure')" class="btn btn-danger btn-sm">
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
