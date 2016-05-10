@extends('dashboard')
@section('dashboardcontent')
<section id="join">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>
                @if($action=='update') 
                    Update Data
                @else 
                    Lengkapi Data
                @endif
                </h2>
                <hr class="star-primary">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                <form name="sentMessage" id="contactForm" novalidate method="post" action="{{ URL::route('completedata')}}" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_action" value="{{ $action }}">
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Nama</label>
                            <input value="{{ $user->name }}" name="name" type="text" class="form-control" placeholder="Nama" id="txtName" required data-validation-required-message="Isi Nama Anda">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Deskripsi Singkat (30 Karakter)</label>
                             <input value="{{ $user->shortdesc }}" name="shortdesc" type="text" class="form-control" placeholder="Deskripsi Singkat, ex: Web Developer, SPG, Freelance Android Developer" id="txtShortDesc" required data-validation-required-message="Isi Deskripsi Singkat Anda">
                            <p class="help-block text-danger"></p>
                        </div>  
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label>Tentang</label>
                                <textarea rows="5" name="about" class="form-control" placeholder="Tentang Anda" id="txtAbout" required data-validation-required-message="Isi Tentang Anda">{{ $user->about}}</textarea>
                                <p class="help-block text-danger"></p>
                        </div>
                    </div>    
                    
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Nomor Telpon</label>
                            <input type="tel" value="{{ $user->phone }}" name="phone" class="form-control" placeholder="Nomor Telpon" id="phone" required data-validation-required-message="Isi Nomor Telpon Anda">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
  
                   
                    <div class="row control-group" id="row">
                        <div class="form-group col-xs-12 floating-label-form-group controls">                           
                            <div class="col-xs-3">Foto Profil</div>
                                <div class="col-xs-9">
                                @if($user->profilpict =="noimage.jpg" || $user->profilpict =="")
                                <input id="profilpict" name="profilpict" type="file" required data-validation-required-message="Pilih Foto Profil Anda">
                                @else
                                <img width = "100px" height="100px" src="{{ asset('pictures/user')}}{{$user->id}}/{{$user->profilpict}}">
                                <input id="profilpict" name="profilpict" type="file" >
                                @endif
                                </div>
                                <div style="clear: both;"><div>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <button type="submit" class="btn btn-success btn-lg">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
$(function() {


    $("#contactForm input,#contactForm textarea").jqBootstrapValidation({
        preventSubmit: true,
        // submitError: function($form, event, errors) {
        //     // additional error messages or events
        // },
    });
});
</script>
@endsection
