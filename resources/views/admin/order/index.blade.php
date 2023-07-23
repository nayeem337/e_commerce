@extends('admin.master')

@section('title','All Order')

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
                        @foreach($orders as $order)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$order->id}}</td>
                                <td>{{$order->order_date}}</td>
                                <td>{{$order->customer->name.'('.$order->customer->mobile. ')' }}</td>
                                <td>{{$order->order_total}}</td>
                                <td>{{$order->order_status}}</td>
                                <td>{{ $order->paymen_status}}</td>
                                <td>
                                    <a href="{{route('admin.order-detail',['id' =>$order->id])}}" class="btn btn-info btn-sm" title="View Order Detail">
                                        <i class="ti-book"></i>
                                    </a>
                                    <a href="{{route('admin.order-edit',['id' =>$order->id])}}" class="btn btn-success btn-sm" title=" Order Edit">
                                        <i class="ti-reddit"></i>
                                    </a>
                                    <a href="{{route('admin.order-invoice',['id' =>$order->id])}}" class="btn btn-primary btn-sm" title="View Order Invoice">
                                        <i class="ti-infinite"></i>
                                    </a>
                                    <a href="{{route('admin.print-invoice',['id' =>$order->id])}}" class="btn btn-warning btn-sm" title="Print Order Detail">
                                        <i class="ti-dropbox"></i>
                                    </a>

                                    <a href="{{route('admin.order-delete',['id' =>$order->id])}}" onclick="return confirm('Are You sure')" title="Delete Order" class="btn btn-danger btn-sm">
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
