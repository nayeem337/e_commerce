@extends('admin.master')

@section('body')
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="text-center text-success">{{ Session::has('success') ? Session::get('success') : '' }}</p>
                    <h4 class="card-title">Manage Unit</h4>
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-striped border">
                            <thead>
                            <tr>
                                <th>SL NO</th>
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
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $unit->name }}</td>
                                        <td>{{ $unit->code }}</td>
                                        <td>{!! $unit->description !!}</td>
                                        <td>{{ $unit->status == 1 ? 'published' : 'unpublished' }}</td>
                                        <td>
                                            <a href="{{ route('units.edit', $unit->id) }}" class="btn btn-success">
                                                <i class="ti-settings"></i>
                                            </a>
                                            <form action="{{ route('units.destroy', $unit->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button onclick="return confirm('Are You Sure Want To Delete This Unit?');" class="btn btn-danger">
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
