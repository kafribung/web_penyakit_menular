@extends('auth.master_auth')
@section('title', 'REGISTER | Nomads Dev')
@section('content')

<div class="limiter">
	<div class="container-login100" style="background-image: url('{{ asset('log/images/bg-01.jpg') }}');">

		<div class="wrap-login100">

			@if (session('msg'))
				<p class="alert alert-danger">{{session('msg')}}</p>

				@else

				<h4>info : </h4>
				<ul style="list-style-type:square">
					<li>ProtecUserName  : 'required', 'string', 'min:3','max:20'</li>
					<li>ProtecEmail   : 'required', 'string', 'email', 'max:255', 'unique:users'</li>
					<li>ProtecPass   : 'required', 'string', 'min:8', 'max:20', 'confirmed'</li>
				</ul>

			@endif

			

			<form class="login100-form validate-form" method="POST" action="{{ route('register') }}">
				@csrf
				<span class="login100-form-logo">
					<img class="rounded-circle" src="{{asset('log/images/bg-02.jpg')}}" alt="error" width="100" height="100"></i>
				</span>

				<span class="login100-form-title p-b-34 p-t-27">
					Register
				</span>

				{{-- Username --}}
				<div class="wrap-input100 validate-input" data-validate = "Enter username">
					<input class="input100 @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" autocomplete="name" autofocus placeholder="Username">
					<span class="focus-input100" data-placeholder="&#xf207;"></span>

					@error('name')
						<p class="alert alert-danger">{{ $message }}</p>
					@enderror
				</div>

				{{-- Email --}}
				<div class="wrap-input100 validate-input" data-validate = "Enter email">
					<input class="input100 @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}"  autocomplete="email" placeholder="Email">
					<span class="focus-input100" data-placeholder="&#xf207;"></span>

					@error('email')
						<p class="alert alert-danger">{{ $message }}</p>
					@enderror
				</div>

				{{-- Password --}}
				<div class="wrap-input100 validate-input" data-validate="Enter password">
					<input class="input100 @error('password') is-invalid @enderror" type="password" name="password"  autocomplete="current-password" placeholder="Password">
					<span class="focus-input100" data-placeholder="&#xf191;"></span>

					@error('password')
						<p class="alert alert-danger">{{$message}}</p>
					@enderror
				</div>

				{{-- COnfirm --}}
				<div class="wrap-input100 validate-input" data-validate="Enter password">
					<input class="input100 @error('password') is-invalid @enderror" type="password" name="password_confirmation"  autocomplete="current-password" placeholder="Confirm Password">
					<span class="focus-input100" data-placeholder="&#xf191;"></span>

				</div>

				<div class="container-login100-form-btn">
					<button type="submit" class="login100-form-btn">
						Register
					</button>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection

