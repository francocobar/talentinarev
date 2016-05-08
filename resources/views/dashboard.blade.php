@extends('masterpage')
@section('content')
Selamat datang {{ $user-> name}}
<br/>
<a href="/dashboard/update">Edit</a>
<br/>
<a href="/logout">Logout</a>
@endsection
