@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
           <div class="panel panel-default">
              <div class="panel-body">
                 <div class="row">
                    <div class="col-md-4">
                       <h4>Contract List</h4>
                    </div>
                    <div class="col-md-8">
                       {{ $customers->links() }}
                    </div>
                 </div>
              </div>
              <div class="panel-footer">
                 {{$time}} sekund
              </div>
           </div>
@foreach($customers as $customer)


    <div class="panel panel-default">
      <div class="panel-heading">
        <h4>
          <a href="{{ route('customer.show',$customer->id ) }}">{{ $customer->name }}</a> <label>{{$customer->customer_number}}</label>
        </h4>
      </div>
      <div class="panel-body">
        <table class="table table-striped tabel-hover table-condensed">
          <thead>
            <tr>
              <th>Numer</th><th>Data rozpoczęcia</th><th>Data zakończenia</th><th>Numer umowy</th><th>POS</th><th></th>
            </tr>
          </thead>
          @foreach($customer->contracts as $contract)
          <tr>
            <td>{{ $contract->phone_number }}</td>
            <td>{{ $contract->data_start }}</td>
            <td>{{ $contract->data_end }}</td>
            <td>{{ $contract->contract_number }}</td>
            <td>{{ $contract->pos }}</td>
             <td>
             <div class="btn-group" role="group" aria-label="...">
                                <button class="btn btn-warning btn-sm"><i class="fa fa-commenting" aria-hidden="true"></i> Komentarz</button>
                                <button class="btn btn-primary btn-sm"><i class="fa fa-calendar" aria-hidden="true"></i> Zmień datę</button>
                                <button class="btn btn-success btn-sm"><i class="fa fa-check-square" aria-hidden="true"></i> Weryfyfikuj</button>
                                <button class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i> Usuń</button>
                            </div>
             </td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
@endforeach
          <center> {{ $customers->links() }}</center>





        </div>
    </div>
</div>

@endsection


<!--


-->
