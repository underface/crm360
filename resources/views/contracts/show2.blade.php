@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row">
        <div class="col-md-12">
<h4>Contract List</h4>


@foreach($klienci as $klient)
<div class="panel panel-default">
    <div class="panel-heading"><h3><a href="{{ route('customer.show',$klient['customer_id']) }}" class="btn btn-default btn-lg"><i class="fa fa-address-card" aria-hidden="true"></i><b> {{ $klient['name'] }}</b></a>
            <span class="number">{{ $klient['customer_number'] }}</span><button class="btn btn-xs btn-info" data-clipboard-text="{{ $klient['customer_number'] }}" data-toggle="tooltip" title="Skopiowano!"><i class="fa fa-clipboard" aria-hidden="true"></i> Kopiuj</button> {{ $klient['customer_type'] }}</h3></div>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Numer telefonu</th>
                        <th></th>
                        <th>Od - do </th>
                        <th>Numer umowy</th>
                        <th width="50">Komentarze</th>
                        <th>Funkcje</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i=1 @endphp
                @foreach($klient['kontakty'] as $kontakty)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $kontakty['phone_number'] }}</td>
                        <td><button class="btn btn-xs btn-info" data-clipboard-text="{{ $kontakty['phone_number'] }}" data-toggle="tooltip" title="Skopiowano!"><i class="fa fa-clipboard" aria-hidden="true"></i></button></td>
                        <td>{{ $kontakty['data_start'] }} - {{ $kontakty['data_end'] }}</td>
                        <td>{{ $kontakty['contract_number'] }}</td>
                        <td><button class="btn btn-sm btn-info"><i class="fa fa-comments" aria-hidden="true"></i> Czytaj</button></td>

                        <td>
                            <div class="btn-group" role="group" aria-label="...">
                                <button class="btn btn-warning btn-sm"><i class="fa fa-commenting" aria-hidden="true"></i> Komentarz</button>
                                <button class="btn btn-primary btn-sm"><i class="fa fa-calendar" aria-hidden="true"></i> Zmień datę</button>
                                <button class="btn btn-success btn-sm"><i class="fa fa-check-square" aria-hidden="true"></i> Weryfyfikuj</button>
                                <button class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i> Usuń</button>
                            </div>

                        </td>
                        @php $i++ @endphp
                    </tr>
                @endforeach
                </tbody>
            </table>
    </div>
</div>
@endforeach
<center>{{ $contracts->links() }}</center>

@endsection


<!--


-->
