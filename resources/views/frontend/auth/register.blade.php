@extends('frontend.layouts.layout')
@section('content')

<section id="login" style="background-image: url('assets/images/loginbg.jpg')">
    <div class="container-fluid">
        <div class="login_top">
            <h3>Create an Account</h3>
        </div>
        <div class="login_body">
            {{-- @php
                $errors = Session::get('errors');
            @endphp --}}
            <form action="{{ route('user.registerUser')}}" method="post" id="form">
            @csrf
                <div class="form-group">
                    <label for="fname">First Name *</label>
                    <input type="text" name="fname" value="{{old('fname')}}">
                    @error('fname')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="lname">Last Name *</label>
                    <input type="text" name="lname" value="{{old('lname')}}">
                    @error('lname')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" name="email" value="{{old('email')}}">
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password *</label>
                    <input type="password" name="password">
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="checkbox" name="remember"><span class="remember">Remember me</span>
                </div>
                <div class="form-group">
                    <button class="login_btn">Submit</button>
                </div>
                <!-- <div class="form-group form-footer">
                    <a href="" class="forget_pwd">Forgot Password?</a>
                    <a href="create_account.php"class="create_acct">Create an account</a>
                </div> -->
                
            </form>
        </div>
        <div class="login_link">
            <p>Already have an account?<a href="{{ route('user.login')}}" class="login_linkbtn">Login</a></p>
        </div>
    </div>
</section>
@endsection

@push('scripts')
    {{-- <script>
    $(document).ready(function(){
        $('#form').submit(function(e){
            e.preventDefault();
           $.ajax({
               type: 'post',
               url: "{{ route('user.registerUser') }}",
               data: $('#form').serialize(),
               headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },success:function(response){
                   console.log(response);
               }
           })
        })
    });

    </script>     --}}

@endpush