@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            
            <div class="panel panel-default">
                <div class="panel-heading"><h4>Customers List</h4></div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Nazwa</th>
                                <th>Numer Klienta</th>
                                <th>Numer kontaktowy</th>
                                <th>Funkcje</th>
                            </tr>
   
                        </thead>
                        <tbody>
                        @foreach($customers as $customer)
                            <tr>
                                <td>{{ $customer->id }}</td>
                              <td><a href="{{ route('customer.show',$customer->id ) }}">{{ $customer->name }}</a></td>
                                <td>{{ $customer->customer_number }}</td>
                                <td>{{ $customer->customer_contact }}</td>
                               <td>
                                  <div class="btn-group" role="group" aria-label="btn-group-customer">
                                    <a href="{{ route('customer.show',$customer->id ) }}" class="btn btn-info btn-sm"><i class="fa fa-user" aria-hidden="true"></i></a>
                                    <a href="{{ route('customer.show',$customer->id ) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                 </div>
                              </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    <center>{{ $customers->links() }}</center>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


<!-- 

            
-->