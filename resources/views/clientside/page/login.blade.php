@extends('clientside.layout.master')
@section('title', 'Map')
@section('headname','Map')
@section('content')

<!-- contact-page-block
			================================================== -->
		<section class="contact-page">
			<div class="container">
				<span class="contact-page__short-title">
					our office and contact information
				</span>
				<h1 class="contact-page__title">
					Contact Us
				</h1>
				<p class="contact-page__description">
					Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. 
				</p>

				<div class="row">
					<div class="col-lg-8 col-md-8">
						
						<!-- Contact form module -->
						<!-- <form class="contact-form" method="post" action="{{route('contact-process')}}">
						@csrf -->
							<!-- <h2 class="contact-form__title">
								Contact Form
								@if(Session::has('success'))
								<span class="text-success">{{Session('success')}} </span>
								@endif
								</h2>
							<div class="row">
								<div class="col-md-6">
								<span class="text-danger">{{$errors->first('name')}} </span>

									<input class="contact-form__input-text" type="text" name="name" id="name" placeholder="Name:" / value="{{old('name')}}">
								</div>
								<div class="col-md-6">
								<span class="text-danger">{{$errors->first('email')}} </span>

									<input class="contact-form__input-text" type="email" name="email" id="mail" placeholder="Email:" / value="{{old('email')}}">
								</div>
							</div>
							<span class="text-danger">{{$errors->first('subject')}} </span>

							<input class="contact-form__input-text" type="text" name="subject" id="subject" placeholder="Subject" / value="{{old('subject')}}">
							<span class="text-danger">{{$errors->first('comment')}} </span>

							<textarea class="contact-form__textarea" name="comment" id="comment" placeholder="Message">{{old('comment')}}</textarea> -->
							<!-- <input class="contact-form__submit" type="submit" name="submit-contact" id="submit_contact" value="Submit Message" /> -->
							<!-- <button   class="contact-form__submit" type="submit">Submit Message</button> -->
						<!-- </form> -->
						<!-- End Contact form module -->
						<form class="contact-form" method="post" action="{{route('login-process')}}">
						@csrf
							<h2 class="contact-form__title"> 
								Contact Form
								@if(Session::has('success'))
								<span class="text-success">{{Session('success')}} </span>
								@endif
								</h2>
							<div class="row">
								<div class="col-md-12">
								<label>Your Name</label>
								<span class="text-danger">{{$errors->first('email')}} </span>

									<input class="contact-form__input-text" type="email" name="email" id="name" placeholder="Name:" / value="{{old('name')}}">
								</div>
                                </div>
                            <div class="row">
								<div class="col-md-12">
									<label>Email</label>
								<span class="text-danger">{{$errors->first('password')}} </span>

									<input class="contact-form__input-text" type="password" name="password" id="mail" placeholder="Email:" / value="{{old('email')}}">
								</div>
							</div>
							
						

							
							<!-- <input class="contact-form__submit" type="submit" name="submit-contact" id="submit_contact" value="Submit Message" /> -->
							<button   class="contact-form__submit" type="submit">Submit Message</button>
						</form>

					</div>

					<div class="col-lg-3 offset-lg-1 col-md-4">

						<!-- contact-post-module -->
						<div class="contact-post">
							<i class="la la-map-marker"></i>
							<div class="contact-post__content">
								<h2 class="contact-post__title">
									Location:
								</h2>
								<p class="contact-post__description">
									Lorem ipsum lorem ipsum lorem ipsum lorem 
								</p>
							</div>
						</div>
						<!-- End contact-post-module -->

						<!-- contact-post-module -->
						<div class="contact-post">
							<i class="la la-phone"></i>
							<div class="contact-post__content">
								<h2 class="contact-post__title">
									Phone:
								</h2>
								<p class="contact-post__description">
									(XXX) XXX - XX - XX <br> (XXX) XXX - XX - XX
								</p>
							</div>
						</div>
						<!-- End contact-post-module -->

						<!-- contact-post-module -->
						<div class="contact-post">
							<i class="la la-envelope"></i>
							<div class="contact-post__content">
								<h2 class="contact-post__title">
									Email:
								</h2>
								<p class="contact-post__description">
									info@example.com <br> support@mail.com
								</p>
							</div>
						</div>
						<!-- End contact-post-module -->

					</div>

				</div>

			</div>
		</section>
		<!-- End contact-page-block -->

@endsection