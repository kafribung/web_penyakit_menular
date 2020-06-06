@extends('auth.master_auth')
@section('title', 'LOGIN | Nomads Dev')
@section('content')

<div class="limiter">
	<div class="container-login100" style="background-image: url('{{ asset('log/images/bg-01.jpg') }}');">
		<div class="wrap-login100">
			<h4>info : </h4>
			<ul style="list-style-type:square">
				<li>Email : kafri@kafri.com</li>
				<li>Pass  : belajardanberdoa</li>
				<li>ProtecEmail  : required|string|min:3|max:20</li>
				<li>ProtecPass   : required|string|min:3|max:20</li>
			</ul>
			<form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
				@csrf
				<span class="login100-form-logo">
					<img class="rounded-circle" src="{{asset('log/images/bg-02.jpg')}}" alt="error" width="100" height="100"></i>
				</span>

				<span class="login100-form-title p-b-34 p-t-27">
					Log in
				</span>

				

				{{-- Username --}}
				<div class="wrap-input100 validate-input" data-validate = "Enter Email">
					<input class="input100 @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Email">
					<span class="focus-input100" data-placeholder="&#xf207;"></span>

					@error('email')
						<p class="alert alert-danger">{{$message}}</p>
					@enderror
				</div>

				{{-- Password --}}
				<div class="wrap-input100 validate-input" data-validate="Enter password">
					<input class="input100 @error('password') is-invalid @enderror" type="password" name="password" autocomplete="current-password" placeholder="Password">
					<span class="focus-input100" data-placeholder="&#xf191;"></span>

					@error('password')
						<p class="alert alert-danger">{{$message}}</p>
					@enderror
				</div>

				{{-- Remember --}}
				<div class="contact100-form-checkbox">
					<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember"  {{ old('remember') ? 'checked' : '' }}>
					<label class="label-checkbox100" for="ckb1">
						Remember me
					</label>
				</div>

				<div class="container-login100-form-btn">
					<button type="submit" class="login100-form-btn">
						{{ __('Login') }}
					</button>
				</div>

				{{-- Forget --}}
				<div class="text-center p-t-90">
					@if (Route::has('password.request'))
					<a href="{{ route('password.request') }}" class="txt1" href="#">
						Forgot Password?
					</a>
					@endif
				</div>
			</form>
		</div>
	</div>
</div>

	
@endsection