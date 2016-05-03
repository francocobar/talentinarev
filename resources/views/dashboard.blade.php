@extends('masterpage')
@section('content')
<section id="join">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Lanjutkan Pendaftaran</h2>
                <hr class="star-primary">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                <form name="sentMessage" id="contactForm" novalidate method="post" action="{{ URL::route('loginorjoin')}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Email Address</label>
                            <input value="{{ Input::get('email') }}" name="email" type="email" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Isi Email Address">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Password</label>
                            <input value="{{ Input::get('password') }}" name="password" type="text" class="form-control" placeholder="Password" id="password" required data-validation-required-message="Isi Password">
                            <p class="help-block text-danger"></p>
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

@endsection
