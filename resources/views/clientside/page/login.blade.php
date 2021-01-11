@extends('clientside.layout.master')
@section('title', 'Map')
@section('headname','Map')
@section('content')
<style type="text/css">
	form.sign-form
	{
		left: 100%;
    	position: relative;
	}
</style>
<!-- sign-block
			================================================== -->
		<section class="sign">
			<div class="sign__area">
				<div class="tab-content" id="nav-tabContent">
					<div class="tab-pane fade show active" id="nav-sign" role="tabpanel" aria-labelledby="nav-sign-tab">

						<!-- sign-form-module -->
						<form class="sign-form border p-5" method="post" action="{{route('login-process')}}">
							@csrf
							@if(Session::has('success'))
								<span class="text-success">{{Session('success')}} </span>
							@endif
							<label class="sign-form__label" for="username">
								Email address:
							</label>
							<span class="text-danger">{{$errors->first('email')}} </span>
							<input class="sign-form__input-text" type="text" name="email" id="username" placeholder="Email" value="{{old('name')}}" />
							<label class="sign-form__label" for="password">
								Password:
							</label>
							<span class="text-danger">{{$errors->first('password')}} </span>
							<input class="sign-form__input-text" type="password" name="password" id="password" placeholder="Password" value="{{old('email')}}"/>
							
							<button  class="sign-form__submit" id="submit-loggin" type="submit">
								<i class="fa fa-sign-in" aria-hidden="true"></i>
								Login
							</button>
						</form>

						<!-- End sign-form-module -->

					</div>
				</div>
			</div>
			<div class="sign__background"></div>
		</section>
		<!-- End sign-block -->

@endsection