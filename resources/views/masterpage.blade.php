<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">

      <title>Talentina. Direktori Talenta Indonesia</title>

      <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
      <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
      <!-- Custom CSS -->
      <link href="{{ asset('css/freelancer.css') }}" rel="stylesheet">

      <!-- Custom Fonts -->
      <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
      <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

      <!-- jQuery -->
      <script src="{{ asset('js/jquery.js')}}"></script>

      <!-- Bootstrap Core JavaScript -->
      <script src="{{ asset('js/bootstrap.min.js')}}"></script>

      <!-- Plugin JavaScript -->
      <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
      <script src="{{ asset('js/classie.js')}}"></script>
      <script src="{{ asset('js/cbpAnimatedHeader.js')}}"></script>
      <!--<script src="{{ asset('js/loginorjoin.js')}}"></script> -->

      <!-- Contact Form JavaScript -->
      <script src="{{ asset('js/jqBootstrapValidation.js')}}"></script>

      <!-- Custom Theme JavaScript -->
      <script src="{{ asset('js/freelancer.js')}}"></script>
    </head>
    <body id="page-top" class="index">

      @yield('content')
      

      </body>
</html>
