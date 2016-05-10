@extends('dashboard')
@section('dashboardcontent')
<form id="multipleupload" method="post" action="{{ URL::route('multipleupload')}}" enctype="multipart/form-data">
	<input type="file" name= "files[]" id="files" multiple />
	<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
	<div id="message"></div>
	<button type="submit" id="submit">Upload</button>
</form>
@endsection