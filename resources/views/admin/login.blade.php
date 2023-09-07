<!doctype html>
<html lang="en">
  <head>
    <title>Admin Login</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('admin_login_assets/css/style.css') }}">
    <style>
    /* Body Background */
body.img.js-fullheight {
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center center;
}

/* Heading Styles */
.heading-section {
    color: #2c3e50; 
    text-shadow: 1px 1px 2px rgba(0,0,0,0.2);
    font-size: 42px;
}

/* Login Form Styling */
.login-wrap {
    width: 100%; /* Set to the desired width; 80% will make it relatively large */
    max-width: 700px; /* Maximum width limit to ensure it doesn't become too large on big screens */
    margin: 0 auto; /* Centering the box if the width is less than 100% */
    padding: 40px 50px; /* Increased padding */
    border-radius: 35px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.12);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}


.login-wrap:hover {
    transform: translateY(-5px); /* Slight lift on hover */
    box-shadow: 0 7px 20px rgba(0, 0, 0, 0.15); /* Deeper shadow on hover */
}


.signin-form .form-control {
    border-radius: 5px;
    margin-bottom: 15px;
}

.signin-form .btn-primary {
    background-color: #3498db;
    border-color: #3498db;
}

.form-group .checkbox-wrap {
    display: flex;
    align-items: center;
}

.form-group .checkbox-wrap .checkmark {
    margin-left: 5px;
}

.w-50 a {
    text-decoration: underline;
}


    </style>
    {{-- https://source.unsplash.com/featured/3840x2160 --}}

  </head>
  <body class="img js-fullheight" style="background-image: url(https://source.unsplash.com/1920x1080/?nature);">
    {{-- <body class="img js-fullheight" style="background-image: url({{ asset('admin_login_assets/images/bg.jpg') }});"> --}}
    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6 text-center mb-5">
            <h2 class="heading-section">CHaA</h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-6 col-lg-4">
            <div class="login-wrap p-0">
              <h3 class="mb-4 text-center">Admin Dashboard Login</h3>
              <form action="{{ route('admin.login.authenticate') }}" method="POST" class="signin-form">
                @csrf
                <div class="form-group">
                  <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email', Cookie::get('email')) }}" required >
                  @error('email')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <input id="password-field" type="password" name="password" class="form-control" placeholder="Password" required>
                  @error('password')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                  @error('error')
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
                      <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
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
    <script>
      // get email from local storage
      document.getElementById('email').value = localStorage.getItem('email');
    
      document.querySelector('form').addEventListener('submit', function() {
        if (document.getElementById('remember').checked) {
          // save email to local storage
          localStorage.setItem('email', document.getElementById('email').value);
        } else {
          // clear email from local storage
          localStorage.removeItem('email');
        }
      });
    </script>

  </body>
</html>
