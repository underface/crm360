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
              <th></th><th>Numer</th><th>Data rozpoczęcia</th><th>Data zakończenia</th><th>Numer umowy</th><th>POS</th><th></th>
            </tr>
          </thead>
          @foreach($customer->contracts as $contract)
          <tr id="row_{{$contract->id}}">
            <td>{{ $contract->id }}</td>
            <td>{{ $contract->phone_number }}</td>
            <td>{{ $contract->data_start }}</td>
            <td>{{ $contract->data_end }}</td>
            <td>{{ $contract->contract_number }}</td>
            <td>{{ $contract->pos }}</td>
             <td>
             <div class="btn-group" role="group" aria-label="...">
                <button data-toggle="modal" data-target="#view-modal" data-id="{{$contract->id}}" id="getComments" class="btn btn-sm btn-info">
                  Komentarze ({{ $contract->comments->count() }})
                </button>

                <button data-toggle="modal" data-target="#view-modal" data-id="{{$contract->id}}" id="getCommentsjson" class="btn btn-sm btn-default">
                  Komentarze <small></small>JSON({{ $contract->comments->count() }})
                </button>
             </div>
             </td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
@endforeach

<div id="view-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
     <div class="modal-dialog">
          <div class="modal-content">

               <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="modal-title">
                      Komentarze
                    </h4>
               </div>
               <div class="modal-body">

                   <div id="modal-loader" style="display: none; text-align: center;">

                      <div class="progress">
                       <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                         <span class="sr-only">Wyszukiwanie...</span>
                       </div>
                     </div>
                   </div>

                   <!-- content will be load here -->
                   <div id="dynamic-content"></div>

                </div>
                <div class="modal-footer">

                      <button type="button" class="btn btn-default" data-dismiss="modal">Zamknij</button>
                </div>

         </div>
      </div>
</div><!-- /.modal -->

          <center> {{ $customers->links() }}</center>

        </div>
    </div>
</div>

@endsection

@section('scripts')
   <script>
   $(document).ready(function(){

   	//////////////get by html
   	$(document).on('click', '#getComments', function(e)
      {
   		e.preventDefault();
   		var uid = $(this).attr('data-id');
   		   $('#dynamic-content').hide();
   	   	$('#modal-loader').show();
            $('#row_'+uid).hide();
   		$.ajax({
            url: '{{route('testajax.get')}}',
            type: 'POST',
            data: {
                 "_token": "{{ csrf_token() }}",
                 "id": uid,
            },
   			dataType: 'html',
   		})
   		.done(function(data){
            console.log(data);

   			$('#dynamic-content').html('');
   			$('#dynamic-content').html(data); // load response
   			$('#modal-loader').delay(2000).hide();		  // hide ajax loader
            $('#dynamic-content').show();
   		})
   		.fail(function(){
            $('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
   			$('#modal-loader').hide();
   		});
   	});



      ////////////////////////////////////////////////json
      $(document).on('click', '#getCommentsjson', function(e)
      {
   		e.preventDefault();
   		var uid = $(this).attr('data-id');
   		   $('#dynamic-content').hide();
   	   	$('#modal-loader').show();
   		$.ajax({
            url: '{{route('testajax.getjson')}}',
            type: 'POST',
            data: {
                 "_token": "{{ csrf_token() }}",
                 "id": uid,
            },
   			dataType: 'json',
   		})
   		.done(function(data){
            //console.log(data);
            var output= '';
            for(var i=0; i< data.length;i++)
            {
               output += "<blockquote>";
                  output += data[i].comments;
                  output += "<footer>";
                  output += data[i].created_at;
                  output += "</footer>";
               output += "</blockquote>";

               console.log(output);
            }
   			$('#dynamic-content').html('');
   			$('#dynamic-content').html(output); // load response
   			$('#modal-loader').delay(2000).hide();		  // hide ajax loader
            $('#dynamic-content').show();
   		})
   		.fail(function(){
            $('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
   			$('#modal-loader').hide();
   		});
   	});

   });

   </script>
@endsection
<!--


-->
