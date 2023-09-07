@extends('frontend.layouts.layout')
@section('content')

    
<section id="login" style="background-image: url('assets/images/loginbg.jpg')">
    <div class="container-fluid">
        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="login_body">
            <form action="{{route('user.login.authenticate')}}" method="post" id="form" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="email">Username or email address *</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}">
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password *</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="checkbox" name="remember"><span class="remember">Remember me</span>
                </div>
                <div class="form-group">
                    <button class="login_btn">Log in</button>
                </div>
                <div class="form-group form-footer">
                    <a href="" class="forget_pwd">Forgot Password?</a>
                </div>
                
            </form>
            
        </div>
    </div>
    <div class="login_link">
        <p>Don't have an account?<a href="{{ route('user.register')}}" class="login_linkbtn">Register</a></p>
    </div>
</section>

@endsection