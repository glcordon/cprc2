@extends('layouts.app')

@section('content1')
<div class="container" style="margin-top: 5.5em">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading display-3">Login</div>
                    <div class="panel-body">
     
                        @if ($errors->has('email'))
                            <div class="alert alert-warning">
                                <strong>{{ $errors->first('email') }}</strong>
                            </div>
                        @endif
     
                        @if(session()->has('error'))
                            <div class="alert alert-danger">
                                {{ session()->get('error') }}
                            </div>
                        @endif
     
                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif
     
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('login.action') }}">
                            {{ csrf_field() }}
     
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>
     
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                </div>
                            </div>
     
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password</label>
     
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>
     
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
     
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>
     
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Login
                                    </button>
     
                                    {{-- <a class="btn btn-link" href="{{ route('password.request') }}"> --}}
                                        Forgot Your Password?
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
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
        
