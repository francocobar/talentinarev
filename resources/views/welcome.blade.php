 @extends('masterpage')

@section('content')

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#page-top">Talentina.</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        @if(Request::session()->has('islogin'))
                        <li class="page-scroll">
                                <a href="/dashboard">Dashboard</a>
                            </li>
                        
                        @else
                        <li class="page-scroll">
                            <a href="#join">Masuk atau Daftar</a>
                        </li>
                        @endif
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>

        <!-- Favourite Grid Section -->
        <section id="portfolio">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2>Latest Talent</h2>
                        <hr class="star-primary starsfive-primary">
                    </div>
                </div>
                <div class="row" id="containerlistuser">
                    @foreach($allusers as $user_)
                        <div class="col-sm-4 portfolio-item">
                            <a href="#portfolioModal1" userid="{{$user_->id}}" class="portfolio-link" data-toggle="modal">
                                <div class="caption">
                                    <div class="caption-content">
                                        <i class="fa fa-search-plus fa-3x"></i>
                                    </div>
                                </div>
                                @if($user_->profilpict == "noimage.jpg")
                                <img src="{{ asset('pictures/noimage.jpg')}}" class="img-responsive" alt="" style="height: 360px !important;">
                                @else
                                <img src="{{ $ofs->getpath($user_->id) }}{{$user_->profilpict}}" class="img-responsive" alt="" style="height: 360px !important;">
                                @endif
                            </a>
                        </div>
                    @endforeach
<div class="col-sm-4 portfolio-item loadmoretemplate" style="display: none;">
    <a href="#portfolioModal1" userid="" class="portfolio-link" data-toggle="modal">
        <div class="caption">
            <div class="caption-content">
                <i class="fa fa-search-plus fa-3x"></i>
            </div>
        </div>
        <img src="" class="img-responsive" alt="" style="height: 360px !important;">
    </a>
</div>
                    <!-- <div class="col-sm-4 portfolio-item">
                        <a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">
                            <div class="caption">
                                <div class="caption-content">
                                    <i class="fa fa-search-plus fa-3x"></i>
                                </div>
                            </div>
                            <img src="img/portfolio/cabin.png" class="img-responsive" alt="">
                        </a>
                    </div>
                    <div class="col-sm-4 portfolio-item">
                        <a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">
                            <div class="caption">
                                <div class="caption-content">
                                    <i class="fa fa-search-plus fa-3x"></i>
                                </div>
                            </div>
                            <img src="img/portfolio/cake.png" class="img-responsive" alt="">
                        </a>
                    </div>
                    <div class="col-sm-4 portfolio-item">
                        <a href="#portfolioModal3" class="portfolio-link" data-toggle="modal">
                            <div class="caption">
                                <div class="caption-content">
                                    <i class="fa fa-search-plus fa-3x"></i>
                                </div>
                            </div>
                            <img src="img/portfolio/circus.png" class="img-responsive" alt="">
                        </a>
                    </div> -->
                </div>
            </div>
        </section>
        <section id="portfolio">
            <div class="container">
            <div id="morename"></div>
                <div id="loadmore" attr-skip="6" class="btn btn-danger">LOAD MORE</div>
            </div>
        </section>
    @if(!Request::session()->has('islogin'))
        <!-- Join Section -->
        <section id="join">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2>Masuk atau Daftar</h2>
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
                                    <input value="{{ Input::get('password') }}" name="password" type="password" class="form-control" placeholder="Password" id="password" required data-validation-required-message="Isi Password">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>

                            <br>
                            <div id="success">
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
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
        @endif
        <!-- Portfolio Modals -->
        <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-content">
                <div class="close-modal closeeee" data-dismiss="modal">
                    <div class="lr">
                        <div class="rl">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <h2 style="font-size: 150%;">Project Title</h2>
                                <hr class="star-primary">
                                <img width="360" src="" class="img-responsive img-centered" alt="">
                                <div id="descContent">

                                </div>
                                <button attr-redirect="" type="button" class="btn btn-default seeprofile"><i class="fa fa-user"></i>Lihat Profil</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  

        <script type="text/javascript">

            $(document).ready(function(){
                $('.seeprofile').click(function() {
                    window.location.replace($(this).attr('attr-redirect'));
                });

                $('#loadmore').click(function() {
                    var skip = parseInt($(this).attr('attr-skip'));
                    $(this).attr('attr-skip', parseInt($(this).attr('attr-skip'))+6);
                    $.ajax({
                        type: "GET",
                        url: "/getmoreuser/" + skip,
                        dataType: "json",
                        success: function(listuser) {
                            //alert("sukses");
                            for(x in listuser)
                            {
                                var loadmoretemp = $('.loadmoretemplate').clone(true);
                                $(loadmoretemp).removeClass('loadmoretemplate');
                                $(loadmoretemp).addClass('loadmoretemplate'+listuser[x].id);
                                $(loadmoretemp).find('a').attr('userid',listuser[x].id);
                                $(loadmoretemp).find('img').attr('src','pictures/user'+ listuser[x].id + '/'+ listuser[x].profilpict);
                                $(loadmoretemp).show();
                                $('#containerlistuser').append(loadmoretemp);
                                
                                
                            }

                            if(listuser.length == 0 || listuser.length <6)
                                $('#loadmore').remove();
                        },
                        error: function() {
                            alert('error');
                        }
                    });
                });

                $('.portfolio-link').click(function() {
                    //alert("masuk");
                    var urlImage = $(this).find('img').attr('src');
                    $('#portfolioModal1').find('img').attr('src',urlImage);
                    $('#portfolioModal1').find('#descContent').html(urlImage);
                    var dataString = "id="+ $(this).attr("user-id");
                    $.ajax({
                        type: "GET",
                        url: "/getuser/" + $(this).attr('userid'),
                        success: function(data) {
                            $('.modal-body').find('h2').html(data.name);
                            $('.seeprofile').attr('attr-redirect','/profile/' + data.id);
                        }
                    });
                });

                $('.closeeee').click(function() {
                    $('#portfolioModal1').find('img').attr('src','');
                    $('.modal-body').find('h2').html('');
                    $('#portfolioModal1').find('#descContent').html('');
                    $('.seeprofile').attr('attr-redirect','');
                });
            });
           
        </script>
@endsection
