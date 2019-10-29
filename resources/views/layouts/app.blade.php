<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
 <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
 <link href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css" rel="stylesheet">
 <script src="https://kit.fontawesome.com/f42913f22f.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .dataTables_filter input{border:1px solid #ccc; padding:3px;}
    </style>
    @stack('styles')
</head>
    <body class="bg-gray-100 font-sans leading-normal tracking-normal">
        <div id="app">
            {{-- <nav class="navbar navbar-expand-md navbar-light bg-white">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> --}} @include('partials.header')
            <div class="flex md:flex-row-reverse flex-wrap">

               <!--Main Content-->
               <div class="w-full md:full bg-gray-100">
                <div class="topbar w-full bg-gray-500 text-white p-4 shadow-sm">
                    &nbsp;
                </div>
                  <div class="container bg-gray-100">
                     @yield('content1')
                  </div>
               </div>

               <!--Sidebar-->
               {{--  <div class="w-full md:w-1/5 bg-gray-900 md:bg-gray-900 px-2 text-center fixed bottom-0 md:pt-8 md:top-0 md:left-0 h-16 md:h-screen md:border-r-4 md:border-gray-600">
                <h1 class="text-white pb-6">RECIDIWORX</h1>
                     --}}
               </div>
            </div>
         </body>
         @stack('modals')
         @stack('scripts')
         <!-- DataTables -->
         <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
        <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
        <script>
                /*
                  * LetterAvatar
                  * 
                  * Artur Heinze
                  * Create Letter avatar based on Initials
                  * based on https://gist.github.com/leecrossley/6027780
                  */
                  (function(w, d){
               
               
                   function LetterAvatar (name, size) {
               
                       name  = name || '';
                       size  = size || 60;
               
                       var colours = [
                               "#1abc9c", "#2ecc71", "#3498db", "#9b59b6", "#34495e", "#16a085", "#27ae60", "#2980b9", "#8e44ad", "#2c3e50", 
                               "#f1c40f", "#e67e22", "#e74c3c", "#ecf0f1", "#95a5a6", "#f39c12", "#d35400", "#c0392b", "#bdc3c7", "#7f8c8d"
                           ],
               
                           nameSplit = String(name).toUpperCase().split(' '),
                           initials, charIndex, colourIndex, canvas, context, dataURI;
               
               
                       if (nameSplit.length == 1) {
                           initials = nameSplit[0] ? nameSplit[0].charAt(0):'?';
                       } else {
                           initials = nameSplit[0].charAt(0) + nameSplit[1].charAt(0);
                       }
               
                       if (w.devicePixelRatio) {
                           size = (size * w.devicePixelRatio);
                       }
                           
                       charIndex     = (initials == '?' ? 72 : initials.charCodeAt(0)) - 64;
                       colourIndex   = charIndex % 20;
                       canvas        = d.createElement('canvas');
                       canvas.width  = size;
                       canvas.height = size;
                       context       = canvas.getContext("2d");
                        
                       context.fillStyle = colours[colourIndex - 1];
                       context.fillRect (0, 0, canvas.width, canvas.height);
                       context.font = Math.round(canvas.width/2)+"px Arial";
                       context.textAlign = "center";
                       context.fillStyle = "#FFF";
                       context.fillText(initials, size / 2, size / 1.5);
               
                       dataURI = canvas.toDataURL();
                       canvas  = null;
               
                       return dataURI;
                   }
               
                   LetterAvatar.transform = function() {
               
                       Array.prototype.forEach.call(d.querySelectorAll('img[avatar]'), function(img, name) {
                           name = img.getAttribute('avatar');
                           img.src = LetterAvatar(name, img.getAttribute('width'));
                           img.removeAttribute('avatar');
                           img.setAttribute('alt', name);
                       });
                   };
               
               
                   // AMD support
                   if (typeof define === 'function' && define.amd) {
                       
                       define(function () { return LetterAvatar; });
                   
                   // CommonJS and Node.js module support.
                   } else if (typeof exports !== 'undefined') {
                       
                       // Support Node.js specific `module.exports` (which can be a function)
                       if (typeof module != 'undefined' && module.exports) {
                           exports = module.exports = LetterAvatar;
                       }
               
                       // But always support CommonJS module 1.1.1 spec (`exports` cannot be a function)
                       exports.LetterAvatar = LetterAvatar;
               
                   } else {
                       
                       window.LetterAvatar = LetterAvatar;
               
                       d.addEventListener('DOMContentLoaded', function(event) {
                           LetterAvatar.transform();
                       });
                   }
               
               })(window, document);
               </script>
        
    </div>
</html>
