<html lang="en">
 
 <head>
 
   @include('partials.head')
 <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
 
 </head>
 
 <body style="margin-top:5.5em">
@include('partials.header') 
@yield('content1')
 
@include('partials.footer')
 
@include('partials.footer-scripts')

 </body>
 
</html>
