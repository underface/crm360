@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row" style="margin-bottom:5px;">
    <div class="col-md-12">
      <a href="{{ URL::previous() }}" class="pull-left btn btn-info btn-sm"><i class="fa fa-chevron-left" aria-hidden="true"></i> Wstecz</a>
    </div>
  </div>
    <div class="row">
        <div class="col-md-4">
          <div class="panel panel-default">
                <div class="panel-heading"><h4>{{ $customer->name }}</h4></div>
                <div class="panel-body">
                  <table class="table">
                    <tr>
                      <td>Nr klienta:</td>
                      <td class="number"><b>{{ $customer->customer_number }}</b>
                      <button class="btn btn-xs btn-info" data-clipboard-text="{{ $customer->customer_number }}" data-toggle="tooltip" title="Skopiowano!">
                          <i class="fa fa-clipboard" aria-hidden="true"></i> Kopiuj
                      </button>

                      </td>
                    </tr>
                    <tr>
                      <td>Typ Klienta:</td>
                      <td><b>{{ ($customer->customer_type == 'P') ? "Prywatny": "Firma" }}</b></td>
                    </tr>
                    <tr>
                      <td>Numer kontaktowy</td>
                      <td><b>{{ $customer->customer_contact }}</b></td>
                    </tr>
                  </table>
                </div>
            <div class="panel-footer">
              <a href="#" class="btn btn-warning btn-block btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i></i> Edytuj dane profilu</a>

            </div>
            </div>
          <div class="panel panel-default">
            <div class="panel-heading"><h5>Narzędzia</h5></div>
                <div class="panel-body">
                <p>UM
                   @foreach($contracts as $contract)
                      <input type="checkbox" name="checkbox" id="checkbox_{{ $contract->id }}" value="value">
                   @endforeach
                  </p>
                  <p>
                    Prepaid
                    @foreach($prepaids as $prepaid)
                      <input type="checkbox" name="checkbox" id="checkbox_{{ $prepaid->id }}" value="value">
                   @endforeach
                  </p>
                </div>
          </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
              <div class="panel-heading"><h4>Umowy</h4><small><i class="fa fa-info" aria-hidden="true"></i> Kliknij na numer aby wybrać</small></div>
                <div class="panel-body">
                  <div class="table-responsive">
                    <table class="table table-hover table-condensed" >
                      <thead>
                        <tr>
                          <th>Numer</th>
                          <th>Od - Do</th>
                          <th>Numer Umowy</th>
                          <th>POS</th>
                          <th>Komentarze</th>
                        </tr>

                      </thead>
                      <tbody>
                        @foreach($contracts as $contract)
                         <tr>
                            <td class="td_select"><label for="checkbox_{{ $contract->id }}">{{ $contract->phone_number }}</label></td>
                            <td>{{ $contract->data_start }} - {{ $contract->data_end }}</td>
                            <td>{{ $contract->contract_number }}</td>
                            <td>{{ $contract->pos }}</td>
                            <td><a href="#" class="btn btn-info btn-sm"><i class="fa fa-comment" aria-hidden="true"></i> Komentarze</a></td>
                          </tr>

                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>

          <div class="panel panel-default">
              <div class="panel-heading"><h4>Prepaid</h4><small><i class="fa fa-info" aria-hidden="true"></i> Kliknij na numer aby wybrać</small></div>
                <div class="panel-body">
                  <div class="table-responsive">
                    <table class="table table-hover table-condensed">
                      <thead>
                        <tr>
                          <th>Numer</th>
                          <th>Data dodania</th>
                          <th>POS</th>
                          <th>Komentarze</th>
                        </tr>

                      </thead>
                      <tbody>
                        @foreach($prepaids as $prepaid)
                          <tr>
                            <td class="td_select"><label  for="checkbox_{{ $prepaid->id }}">{{ $prepaid->phone_number }}</label></td>
                            <td>{{ $prepaid->data_start }}</td>
                            <td>{{ $prepaid->pos }}</td>
                            <td><a href="#" class="btn btn-info btn-sm"><i class="fa fa-comment" aria-hidden="true"></i> Komentarze</a></td>
                          </tr>

                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
        </div>

        </div>
  <div class="row">
              <div class="panel panel-default">
              <div class="panel-heading"><h4>Historia Kontaktów <i class="fa fa-comment" aria-hidden="true"></i></h4></div>
                <div class="panel-body">
                  <div class="table-responsive">
                    <table class="table table-hover table-striped table-condensed">
                      <thead>
                        <tr>
                          <th>#LP</th>
                          <th>Data</th>
                          <th>Numer/Klient</th>
                          <th>Dodał</th>
                          <th>Tresć</th>
                        </tr>

                      </thead>
                      <tbody>
                        <tr>
                          <td>#223</td>
                          <td>2017-01-24 14:54</td>
                          <td>693742000</td>
                          <td>Jan Kowalski (pos:Warszawa)</td>
                          <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque quis consectetur ligula. In pcing elit. Quisque quis consectetur ligula. In placlacerat facilisis congue. Vestibulum pretium, lorem pharetra rhoncus posuere,</td>
                        </tr>
                        <tr>
                          <td>#56</td>
                          <td>2017-03-24 14:54</td>
                          <td>Klient</td>
                          <td>Jan Kowalski (pos:Warszawa)</td>
                          <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque quis consectetur ligula. In placerat fcing elit. Quisque quis consectetur ligula. In placcing elit. Quisque quis consectetur ligula. In placacilisis congue. Vestibulum pretium, lorem pharetra rhoncus posuere,</td>
                        </tr>
                        <tr>
                          <td>#445</td>
                          <td>2017-02-12 16:54</td>
                          <td>790456456</td>
                          <td>Jan Kowalski (pos:Warszawa)</td>
                          <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque quis consectetur ligula. In placerat facilisis congue. Vestibulum pretium, lorem pharetra rhoncus posuere,</td>
                        </tr>
                        <tr>
                          <td>#2344</td>
                          <td>2017-02-12 16:54</td>
                          <td>790456456</td>
                          <td>Jan Kowalski (pos:Warszawa)</td>
                          <td>Lorem ipsum dolor sit amet,</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>

  </div>
    </div>
</div>

@endsection
