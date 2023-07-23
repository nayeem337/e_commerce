@extends('admin.master')

@section('title','Order Edit')

@section('body')
    <div class="row">

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">All Order Information</h4>
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
                            <th>Order No</th>
                            <th>Order Date</th>
                            <th>Customer Info</th>
                            <th>Order total</th>
                            <th>Order Status</th>
                            <th>Payment Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
