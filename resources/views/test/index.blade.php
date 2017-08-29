
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body>

	<div class="container">



        <div class="row">

        	<div class="col-lg-12">

            		<table class="table table-striped table-bordered">
                     <h3>Tabela</h3>
            		<thead>
            			<tr>
            				<th>Name</th>
            				<th>client number</th>
                        <th></th>
                        <th>Test</th>
            			</tr>
            		</thead>

            		<tbody>

            	        @foreach($customers as $customer)
                          <tr>
                             <td>{{ $customer->name }}</td>
                             <td>{{ $customer->customer_number }}</td>
                             <td>
                                <button data-toggle="modal" data-target="#view-modal" data-id="{{ $customer->id }}" id="getUser" class="btn btn-sm btn-info">
         							<i class="glyphicon glyphicon-eye-open"></i> Podejejrzyj
   						            </button>
                              </td>
                              <td>
                                 <form action="{{route('testajax.get')}}" method="POST">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                    <input type="hidden" name="id" value="{{$customer->id}}">
                                    <input type="submit" name="submit" value="submit" class="btn btn-default"/>
                                 </form>
                              </td>
                          </tr>
                       @endforeach

            		</tbody>
            		</table>

            </div>

        </div>




        <div id="view-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
             <div class="modal-dialog">
                  <div class="modal-content">

                       <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">
                            	<i class="glyphicon glyphicon-user"></i> User Profile
                            </h4>
                       </div>
                       <div class="modal-body">

                       	   <div id="modal-loader" style="display: none; text-align: center;">
                       	   	<span class="glyphicon glyphicon-refresh"></span>
                       	   </div>

                           <!-- content will be load here -->
                           <div id="dynamic-content"></div>

                        </div>
                        <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>

                 </div>
              </div>
       </div><!-- /.modal -->

    </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<script>
$(document).ready(function(){

	$(document).on('click', '#getUser', function(e){

		e.preventDefault();

		var uid = $(this).data('id');   // it will get id of clicked row

		$('#dynamic-content').html(''); // leave it blank before ajax call
		$('#modal-loader').show();      // load ajax loader

		$.ajax({
			url: 'http://127.0.0.1:8000/testget/',
			//type: 'GET',
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
			$('#modal-loader').hide();		  // hide ajax loader
		})
		.fail(function(){
			$('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
			$('#modal-loader').hide();
		});

	});

});

</script>

</body>
</html>
