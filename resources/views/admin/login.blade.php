<!doctype html>
<html lang="en">
  <head>
    <title>Admin Login</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('admin_login_assets/css/style.css') }}">
    {{-- https://source.unsplash.com/featured/3840x2160 --}}

  </head>
  <body class="img js-fullheight" style="background-image: url(https://source.unsplash.com/1920x1080/?nature);">
    {{-- <body class="img js-fullheight" style="background-image: url({{ asset('admin_login_assets/images/bg.jpg') }});"> --}}
    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6 text-center mb-5">
            <h2 class="heading-section">BitCrypto</h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-6 col-lg-4">
            <div class="login-wrap p-0">
              <h3 class="mb-4 text-center">Admin Dashboard Login</h3>
              <form action="{{ route('admin.login.authenticate') }}" method="POST" class="signin-form">
                @csrf
                <div class="form-group">
                  <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required >
                  @error('email')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <input id="password-field" type="password" name="password" class="form-control" placeholder="Password" required>
                  @error('password')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                  <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                </div>
                <div class="form-group">
                  <button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
                </div>
                <div class="form-group d-md-flex">
                  <div class="w-50">
                    <label class="checkbox-wrap checkbox-primary">
                      Remember Me
                      <input type="checkbox" name="remember" checked>
                      <span class="checkmark"></span>
                    </label>
                  </div>
                  <div class="w-50 text-md-right">
                    <a href="javascript:void(0)" style="color: #fff">Forgot Password Contact To Developer</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

    <script src="{{ asset('admin_login_assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin_login_assets/js/popper.js') }}"></script>
    <script src="{{ asset('admin_login_assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin_login_assets/js/main.js') }}"></script>

  </body>
</html>
