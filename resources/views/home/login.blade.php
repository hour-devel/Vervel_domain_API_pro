@extends('home.layout.app')

@section('title','Login')

@section('content')
<div class="login" style="margin-top:145px;margin-bottom:45px">
    <div class="d-flex justify-content-center mt-5" >
        <div class="card p-3 w-25" style="background-color: #343A40">
            <h3 style="margin-left: 40%;font-weight: bold;color:#28a745">Login</h3>
            <form method="POST" action="{{route('login_customer')}}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label" style="color: #fff">Email</label>
                    <input 
                        type="text" 
                        class="form-control  @error('email') is-invalid @enderror" 
                        id="email" name="email" value="{{ old('email') }}" />
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label" style="color: #fff">Password</label>
                    <input
                        type="password"
                        class="form-control  @error('password') is-invalid @enderror"
                        id="password"
                        name="password"
                        />
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary" style="width: 100%;margin-top:20px">Sign in</button>
                <div class="mb-3" style="text-align: center;margin-top:20px">
                    <label for="captcha" class="form-label" style="color: #fff">
                        New Customer ?  <a href="{{route('sign-in')}}" style="color: #28a745">Create Account</a>
                    </label>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('script')
<script
src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
crossorigin="anonymous"
>
</script>
@endsection