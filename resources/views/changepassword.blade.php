@extends('dashboard')
@section('dashboardcontent')

<form id="changepassword">
<input type="hidden" name="_token" value="{{ csrf_token() }}"   />
<input type="password" id="oldPassword" placeholder="password lama" class="form-control" />
<input type="password" id="newPassword" placeholder="password baru" class="form-control"/>
<input type="password" id="reNewPassword" placeholder="ulangi password baru" class="form-control"/>
<div id="message" style="text-align: center;">&nbsp;</div>
<button type="submit" id="submit" class="btn btn-default">Ganti Password</button>
</form>
<script type="text/javascript">

	$(document).ready(function(){
		$.ajaxSetup({
			headers: {
				'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$('#changepassword').submit(function(event) {
			event.preventDefault();     
			var dataString = "oldPassword=" + $('#oldPassword').val() + "&newPassword=" + $('#newPassword').val() + "&reNewPassword=" + $('#reNewPassword').val();
			$.ajax({
				type: "POST",
				url: "/dashboard/changepassword/submit",
				data: dataString,
				success: function(data) {
					$('#message').html(data);
					$('input[type="password"]').val("");
				},
		        error: function() {
		          alert("ajax error");
		        }
			});
		});
	});
</script>
@endsection