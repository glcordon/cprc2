@extends('layouts.app')

@section('content1')
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Recidiworx
                </div>

            </div>
        </div>
        @endsection


        @push('scripts')
        <script>
            $(document).ready(function(){
                $('.btn-danger').on('click', function(){
                    e.preventDefault();
                    if(confirm('Are You Sure') !== true)
                    {
                        return false;
                    }else{
                        $(this).parent().parent().fadeOut();
                        
                        return true;
                    }
                })
            });
        </script>
        @endpush
        
