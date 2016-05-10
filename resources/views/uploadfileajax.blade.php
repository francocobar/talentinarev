@extends('dashboard')
@section('dashboardcontent')
	@if($user->profilpict == "noimage.jpg")
    <img width="100" src="{{ asset('pictures/noimage.jpg')}}" class="img-responsive" alt="">
    @else
    <img width="100" src="{{ asset('pictures/user')}}{{$user->id}}/{{$user->profilpict}}" class="img-responsive" alt="">
    @endif
	<form id="ajaxupload" enctype="multipart/form-data">
		<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
		<input type="file" id="files" name="files" />
		<div id="message"></div>
		<button type="submit" id="submit">Upload</button>
	</form>

	<div id="loading"></div>

<script type="text/javascript">
	$(document).ready(function() {

		$.ajaxSetup({
			headers: {
				'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$('#ajaxupload').submit(function(event) {
			event.preventDefault();
			 var fd = new FormData(this);

		    $.ajax({
		       url: "/dashboard/uploadfileajax/submit",
		        type: 'POST',
		        data: fd,
		        contentType: false, 
		        processData: false,
		        success: function (result) {
		        	if(result.status == true) {
		        		$('img').attr('src',result.message);
		        		$('#message').html("upload berhasillll");
		        	}
		            else $('#message').html(result.message);
		        },
		        error: function(result) {
		        	console.log(result);
		        },
		        xhr: function() { // custom xhr (is the best)
               
		               var xhr = new XMLHttpRequest();
		               var total = 0;
		                        
		               // Get the total size of files
		               $.each(document.getElementById('files').files, function(i, file) {
		                      total += file.size;
		               });
		    
		               // Called when upload progress changes. xhr2
		               xhr.upload.addEventListener("progress", function(evt) {
		                      // show progress like example
		                      var loaded = (evt.loaded / total).toFixed(2)*100; // percent

		                      $('#progress').text('Uploading... ' + loaded + '%' );
		               }, false);
		    
		               return xhr;
		          },
		    });         
		});
		
	});
</script>
@endsection