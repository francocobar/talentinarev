@extends('dashboard')
@section('dashboardcontent')
	@if($user->profilpict == "noimage.jpg")
    <img width="100" src="{{ asset('pictures/noimage.jpg')}}" class="img-responsive" alt="">
    @else
    <img width="100" src="{{ asset('pictures/user')}}{{$user->id}}/{{$user->profilpict}}" class="img-responsive" alt="">
    @endif
<form id="jsuploadformdata" method="post">
	
	<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
	<input type="file" id="files" name="files" />
	<div id="message"></div>
	<button type="submit" id="submit">Upload</button>
</form>

<script type="text/javascript">
	var form = document.querySelector('form');
	var request = new XMLHttpRequest();
	form.addEventListener('submit', function(e) {
		e.preventDefault();
		var formdata = new FormData(form);
		request.open('post','/dashboard/jsuploadformdata/submit');
		request.addEventListener("load", transferComplete);
		request.send(formdata);

		function transferComplete(data) {
			var theMsgReturn = JSON.parse(data.currentTarget.response);
			if(theMsgReturn.status == false) $('#message').html(theMsgReturn.message);
			else {
				$('img').attr('src',theMsgReturn.message);
				$('#message').html("berhasil");
			}
		}
	});
</script>
@endsection