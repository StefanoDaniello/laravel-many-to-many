@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="mb-4 row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


{{-- 

<form action="{{ route('verification.send') }}" class="form">


    <p class="title">Login </p>
    <p class="message">Sign in to continue</p>
    <label for="email">
        <input id="email" type="email" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        <span>Email Address</span>
    </label> 
        
    <label for="password">
        <input id="password" type="password" class="input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        <span>Password</span>
    </label>
    
    <div class="form-check d-flex justify-content-center">
        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
        <label class="form-check-label mx-2" for="remember" >
            {{ __('Remember Me') }}
        </label>
    </div>
    
    <button type="submit" class="submit">
        {{ __('Login') }}
    </button>
    
    @if (Route::has('password.request'))
    <a class="btn btn-link" href="{{ route('password.request') }}">
        {{ __('Forgot Your Password?') }}
    </a>
    @endif
    
    <p class="signin">Don't have an acount ? <a href="{{ route('register') }}">Register</a> </p>






</form> --}}



<style lang="scss" scoped>

    .form {
      display: flex;
      flex-direction: column;
      gap: 10px;
      max-width: 400px;
      background-color: #fff;
      padding: 20px;
      border-radius: 20px;
      position: relative;
    }
    
    .title {
      font-size: 28px;
      color:  #0C7CEC;
      font-weight: 600;
      letter-spacing: -1px;
      position: relative;
      display: flex;
      align-items: center;
      padding-left: 30px;
    }
    
    .title::before,.title::after {
      position: absolute;
      content: "";
      height: 16px;
      width: 16px;
      border-radius: 50%;
      left: 0px;
      background-color:  #0C7CEC;
    }
    
    .title::before {
      width: 18px;
      height: 18px;
      background-color:  #0C7CEC;
    }
    
    .title::after {
      width: 18px;
      height: 18px;
      animation: pulse 1s linear infinite;
    }
    
    .message, .signin {
      color: rgba(88, 87, 87, 0.822);
      font-size: 14px;
    }
    
    .signin {
      text-align: center;
    }
    
    .signin a {
      color: #0C7CEC;
    }
    
    .signin a:hover {
      text-decoration: underline #0C7CEC;
    }
    
    .flex {
      display: flex;
      width: 100%;
      gap: 6px;
    }
    
    .form label {
      position: relative;
    }
    
    .form label .input {
      width: 100%;
      padding: 10px 10px 20px 10px;
      outline: 0;
      border: 1px solid rgba(105, 105, 105, 0.397);
      border-radius: 10px;
    }
    
    .form label .input + span {
      position: absolute;
      left: 10px;
      top: 15px;
      color: grey;
      font-size: 0.9em;
      cursor: text;
      transition: 0.3s ease;
    }
    
    .form label .input:placeholder-shown + span {
      top: 15px;
      font-size: 0.9em;
    }
    
    .form label .input:focus + span,.form label .input:valid + span {
      top: 30px;
      font-size: 0.7em;
      font-weight: 600;
    }
    
    .form label .input:valid + span {
      color: green;
    }
    
    .submit {
      border: none;
      outline: none;
      background-color: #0C7CEC;
      padding: 10px;
      border-radius: 10px;
      color: #fff;
      font-size: 16px;
      transform: .3s ease;
    }
    
    .submit:hover {
      background-color: #2883df;
    }
    
    @keyframes pulse {
      from {
        transform: scale(0.9);
        opacity: 1;
      }
    
      to {
        transform: scale(1.8);
        opacity: 0;
      }
    }



</style>