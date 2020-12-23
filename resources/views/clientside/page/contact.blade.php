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
						<form class="contact-form">
							<h2 class="contact-form__title">
								Contact Form
							</h2>
							<div class="row">
								<div class="col-md-6">
									<input class="contact-form__input-text" type="text" name="name" id="name" placeholder="Name:" />
								</div>
								<div class="col-md-6">
									<input class="contact-form__input-text" type="text" name="mail" id="mail" placeholder="Email:" />
								</div>
							</div>
							<input class="contact-form__input-text" type="text" name="subject" id="subject" placeholder="Subject" />
							<textarea class="contact-form__textarea" name="comment" id="comment" placeholder="Message"></textarea>
							<!-- <input class="contact-form__submit" type="submit" name="submit-contact" id="submit_contact" value="Submit Message" /> -->
							<a id="submit_contact" href="{{url('/addlisting')}}" class="contact-form__submit">Submit Message</a>
						</form>
						<!-- End Contact form module -->

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