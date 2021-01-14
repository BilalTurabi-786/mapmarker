@extends('clientside.layout.master')
@section('title', 'Map')
@section('headname','Map')
@section('content')
<style type="text/css">
	.sign__area {
    padding: 12.5rem 10.625rem;
    background: #fff;
    width: 100%;
	}
	.multipleChosen, .multipleSelect2{
  width: 300px;
}
</style>
<!-- add-listing
			================================================== -->
		<section class="sign">
			<div class="sign__area">
				<nav>
					<div class="nav nav-tabs" id="nav-tab" role="tablist">
						<a class="nav-item nav-link active" id="nav-sign-tab" data-toggle="tab" href="#nav-sign" role="tab" aria-controls="nav-sign" aria-selected="true">Company Information</a>
						<a class="nav-item nav-link" id="nav-register-tab" data-toggle="tab" href="#nav-register" role="tab" aria-controls="nav-register" aria-selected="false">School Information</a>
					</div>
				</nav>
				<div class="tab-content" id="nav-tabContent">
					<div class="tab-pane fade show active" id="nav-sign" role="tabpanel" aria-labelledby="nav-sign-tab">
						<!-- user scroll menu box -->
						<div class="user-detail__scroll-menu-box">
							<div class="container">
								<ul class="user-detail__scroll-menu navigate-section">
									<li>
										<a class="active" href="#general-info">General Information</a>
									</li>
									<li>
										<a href="#location-box">Location</a>
									</li>
									<li>
										<a href="#opening-box">Opening Hours</a>
									</li>
									<li>
										<a href="#gallery-box">Gallery</a>
									</li>
									<li>
										<a href="#social-box">Social Networks</a>
									</li>
								</ul>
							</div>
						</div>

						<!-- form listing -->
						<form class="add-listing__form" action="{{route('list-process')}}" method="post">

							<div class="container">
								
								<!-- form box -->
								<div class="add-listing__form-box" id="general-info">

									<h2 class="add-listing__form-title">
										General Information:
									</h2>
							
									<div class="add-listing__form-content">
										<div class="row">
											<div class="col-md-6">
												<label class="add-listing__label" for="list-title">
													Company Name:
												</label>
												<input class="add-listing__input" type="text" name="title" id="list-title" placeholder="Company Name" />
											</div>
											<div class="col-md-6">
												<label class="add-listing__label" for="list-title">
													Owner Name:
												</label>
												<input class="add-listing__input" type="text" name="title" id="list-title" placeholder="Owner Name" />
												<!-- <label class="add-listing__label" for="category">
													Category:
												</label>
												<select class="add-listing__input js-example-basic-multiple" name="category" id="category">
													<option>Categories: </option>
													<option>Art's</option>
													<option>Health</option>
													<option>Hotels</option>
													<option>Real Estate</option>
													<option>Rentals</option>
													<option>Restaurant</option>
													<option>Shopping</option>
													<option>Travel</option>
													<option>Vacation</option>
												</select> -->
											</div>
										</div>
										<div class="row">
											<div class="col-md-4">
												<label class="add-listing__label" for="website">
													Website:
												</label>
												<input class="add-listing__input" type="text" name="website" id="website" placeholder="Enter website address" />
											</div>
											<div class="col-md-4">
												<label class="add-listing__label" for="phone">
													Phone:
												</label>
												<input class="add-listing__input" type="text" name="phone" id="phone" placeholder="Enter phone number" />
											</div>
											<div class="col-md-4">
												<label class="add-listing__label" for="email">
													Email:
												</label>
												<input class="add-listing__input" type="text" name="email" id="email" placeholder="Enter email address" />
											</div>
										</div>
									</div>

								</div>
								
								<!-- form box -->
								<div class="add-listing__form-box" id="location-box">

									<h2 class="add-listing__form-title">
										Location:
									</h2>

									<div class="add-listing__form-content">
										<div class="row">
											<div class="col-md-4">
												<label class="add-listing__label" for="country">
													Country:
												</label>
												<input class="add-listing__input" type="text" name="country" id="country" placeholder="Enter your country" />
											</div>
											<div class="col-md-4">
												<label class="add-listing__label" for="city">
													City:
												</label>
												<select class="add-listing__input js-example-basic-multiple" name="city" id="city">
													<option>Select City: </option>
													<option>London</option>
													<option>Liverpool</option>
													<option>Amsterdal</option>
													<option>Berlin</option>
													<option>Hamburg</option>
													<option>Viena</option>
													<option>Istanbul</option>
													<option>New Yourk</option>
													<option>Madrid</option>
												</select>
											</div>
											<div class="col-md-4">
												<label class="add-listing__label" for="address">
													Address:
												</label>
												<input class="add-listing__input" type="text" name="address" id="address" placeholder="Enter address" />
											</div>
										</div>
									</div>

								</div>
								
								<!-- form box -->
								<div class="add-listing__form-box" id="opening-box">

									<h2 class="add-listing__form-title">
										Opening Hours:
									</h2>

									<div class="add-listing__form-content">
										<div class="row">
											<div class="col-lg-1 col-md-2">
												<label class="add-listing__label with-padding-top" for="weekdays">
													Weekdays:
												</label>
											</div>
											<div class="col-lg-11 col-md-10">
												<div class="row">
													<div class="col-md-6">
														<select class="add-listing__input js-example-basic-multiple" name="weekdays" id="weekdays">
															<option>Opening time </option>
															<option>7:00 A.M</option>
															<option>8:00 A.M</option>
															<option>9:00 A.M</option>
															<option>10:00 A.M</option>
															<option>11:00 A.M</option>
															<option>12:00 A.M</option>
															<option>01:00 P.M</option>
															<option>02:00 P.M</option>
															<option>03:00 P.M</option>
															<option>04:00 P.M</option>
															<option>05:00 P.M</option>
															<option>06:00 P.M</option>
															<option>07:00 P.M</option>
															<option>08:00 P.M</option>
															<option>09:00 P.M</option>
															<option>10:00 P.M</option>
															<option>11:00 P.M</option>
															<option>00:00 A.M</option>
														</select>
													</div>
													<div class="col-md-6">
														<select class="add-listing__input js-example-basic-multiple">
															<option>Closing time </option>
															<option>7:00 A.M</option>
															<option>8:00 A.M</option>
															<option>9:00 A.M</option>
															<option>10:00 A.M</option>
															<option>11:00 A.M</option>
															<option>12:00 A.M</option>
															<option>01:00 P.M</option>
															<option>02:00 P.M</option>
															<option>03:00 P.M</option>
															<option>04:00 P.M</option>
															<option>05:00 P.M</option>
															<option>06:00 P.M</option>
															<option>07:00 P.M</option>
															<option>08:00 P.M</option>
															<option>09:00 P.M</option>
															<option>10:00 P.M</option>
															<option>11:00 P.M</option>
															<option>00:00 A.M</option>
														</select>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-1 col-md-2">
												<label class="add-listing__label with-padding-top" for="weekends">
													Weekends:
												</label>
											</div>
											<div class="col-lg-11 col-md-10">
												<div class="row">
													<div class="col-md-6">
														<select class="add-listing__input js-example-basic-multiple" name="weekends" id="weekends">
															<option>Opening time </option>
															<option>7:00 A.M</option>
															<option>8:00 A.M</option>
															<option>9:00 A.M</option>
															<option>10:00 A.M</option>
															<option>11:00 A.M</option>
															<option>12:00 A.M</option>
															<option>01:00 P.M</option>
															<option>02:00 P.M</option>
															<option>03:00 P.M</option>
															<option>04:00 P.M</option>
															<option>05:00 P.M</option>
															<option>06:00 P.M</option>
															<option>07:00 P.M</option>
															<option>08:00 P.M</option>
															<option>09:00 P.M</option>
															<option>10:00 P.M</option>
															<option>11:00 P.M</option>
															<option>00:00 A.M</option>
														</select>
													</div>
													<div class="col-md-6">
														<select class="add-listing__input js-example-basic-multiple">
															<option>Closing time </option>
															<option>7:00 A.M</option>
															<option>8:00 A.M</option>
															<option>9:00 A.M</option>
															<option>10:00 A.M</option>
															<option>11:00 A.M</option>
															<option>12:00 A.M</option>
															<option>01:00 P.M</option>
															<option>02:00 P.M</option>
															<option>03:00 P.M</option>
															<option>04:00 P.M</option>
															<option>05:00 P.M</option>
															<option>06:00 P.M</option>
															<option>07:00 P.M</option>
															<option>08:00 P.M</option>
															<option>09:00 P.M</option>
															<option>10:00 P.M</option>
															<option>11:00 P.M</option>
															<option>00:00 A.M</option>
														</select>
													</div>
												</div>
											</div>
										</div>
									</div>

								</div>
								
								<!-- form box -->
								<div class="add-listing__form-box" id="gallery-box">

									<h2 class="add-listing__form-title">
										Gallery:
									</h2>

									<div class="add-listing__form-content">
										<div class="add-listing__input-file-box">
											<input class="add-listing__input-file" type="file" name="file" id="file"/>
											<div class="add-listing__input-file-wrap">
												<i class="la la-cloud-upload"></i>
												<p>Click here to upload your images</p>
											</div>
										</div>							
									</div>

								</div>
								
								<!-- form box -->
								<div class="add-listing__form-box" id="social-box">

									<h2 class="add-listing__form-title">
										Social Networks:
									</h2>

									<div class="add-listing__form-content">
										<div class="row">
											<div class="col-md-3 col-sm-6">
												<label class="add-listing__label" for="facebook">
													Facebook <span>(optional)</span>:
												</label>
												<input class="add-listing__input" type="text" name="facebook" id="facebook" placeholder="Facebook URL" />
											</div>
											<div class="col-md-3 col-sm-6">
												<label class="add-listing__label" for="twitter">
													Twitter <span>(optional)</span>:
												</label>
												<input class="add-listing__input" type="text" name="twitter" id="twitter" placeholder="Twitter URL" />
											</div>
											<div class="col-md-3 col-sm-6">
												<label class="add-listing__label" for="youtube">
													YouTube <span>(optional)</span>:
												</label>
												<input class="add-listing__input" type="text" name="youtube" id="youtube" placeholder="YouTube URL" />
											</div>
											<div class="col-md-3 col-sm-6">
												<label class="add-listing__label" for="pinterest">
													Pinterest <span>(optional)</span>:
												</label>
												<input class="add-listing__input" type="text" name="pinterest" id="pinterest" placeholder="Pinterest URL" />
											</div>
											<div class="col-md-3 col-sm-6">
												<label class="add-listing__label" for="pinterest">
													Whatsapp <span>(optional)</span>:
												</label>
												<input class="add-listing__input" type="text" name="pinterest" id="whatsapp" placeholder="Whatsapp" />
											</div>
											<div class="col-md-3 col-sm-6">
												<label class="add-listing__label" for="pinterest">
													Skype <span>(optional)</span>:
												</label>
												<input class="add-listing__input" type="text" name="pinterest" id="Skype" placeholder="Skype" />
											</div>
										</div>
									</div>

								</div>

								<div class="center-button">
									<button class="add-listing__submit" type="submit">
										<i class="fa fa-paper-plane" aria-hidden="true"></i>
										Preview and Submit Listing
									</button>
								</div>

							</div>

						</form>
					</div>
					<div class="tab-pane fade" id="nav-register" role="tabpanel" aria-labelledby="nav-register-tab">
						<div class="user-detail__scroll-menu-box">
				<div class="container">
					<ul class="user-detail__scroll-menu navigate-section">
						<li>
							<a class="active" href="#general-info">General Information</a>
						</li>
						<li>
							<a href="#location-box">Location</a>
						</li>
						<li>
							<a href="#opening-box">Opening Hours</a>
						</li>
						<li>
							<a href="#gallery-box">Gallery</a>
						</li>
						<li> 
							<a href="#social-box">Social Networks</a>
						</li>
					</ul>
				</div>
			</div>

			<!-- form listing -->
			<form class="add-listing__form" action="{{route('list-process')}}" method="post">

				<div class="container">
					
					<!-- form box -->
					<div class="add-listing__form-box" id="general-info">

						<h2 class="add-listing__form-title">
							General Information:
						</h2>
				
						<div class="add-listing__form-content">
							<div class="row">
								<div class="col-md-6">
									<label class="add-listing__label" for="list-title">
										School Name:
									</label>
									<input class="add-listing__input" type="text" name="title" id="list-title" placeholder="Company Name" />
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<label class="add-listing__label" for="website">
										Website:
									</label>
									<input class="add-listing__input" type="text" name="website" id="website" placeholder="Enter website address" />
								</div>
								<div class="col-md-4">
									<label class="add-listing__label" for="phone">
										Phone:
									</label>
									<input class="add-listing__input" type="text" name="phone" id="phone" placeholder="Enter phone number" />
								</div>
								<div class="col-md-4">
									<label class="add-listing__label" for="email">
										Email:
									</label>
									<input class="add-listing__input" type="text" name="email" id="email" placeholder="Enter email address" />
								</div>
							</div>
						</div>

					</div>
					
					<!-- form box -->
					<div class="add-listing__form-box" id="location-box">

						<h2 class="add-listing__form-title">
							Location:
						</h2>

						<div class="add-listing__form-content">
							<div class="row">
								<div class="col-md-4">
									<label class="add-listing__label" for="country">
										Country:
									</label>
									<input class="add-listing__input" type="text" name="country" id="country" placeholder="Enter your country" />
								</div>
								<div class="col-md-4">
									<label class="add-listing__label" for="city">
										City:
									</label>
									<select class="add-listing__input js-example-basic-multiple" name="city" id="city">
										<option>Select City: </option>
										<option>London</option>
										<option>Liverpool</option>
										<option>Amsterdal</option>
										<option>Berlin</option>
										<option>Hamburg</option>
										<option>Viena</option>
										<option>Istanbul</option>
										<option>New Yourk</option>
										<option>Madrid</option>
									</select>
								</div>
								<div class="col-md-4">
									<label class="add-listing__label" for="address">
										Address:
									</label>
									<input class="add-listing__input" type="text" name="address" id="address" placeholder="Enter address" />
								</div>
								<div class="col-md-4">
									<label class="add-listing__label" for="address">
										Longitute:
									</label>
									<input class="add-listing__input" type="text" name="address" id="address" placeholder="Enter Longitute" />
								</div>
								<div class="col-md-4">
									<label class="add-listing__label" for="address">
										Lattitude:
									</label>
									<input class="add-listing__input" type="text" name="address" id="address" placeholder="Enter Lattitude" />
								</div>
							</div>
						</div>

					</div>
					
					<!-- form box -->
					<div class="add-listing__form-box" id="opening-box">

						<h2 class="add-listing__form-title">
							Description:
						</h2>

						<div class="add-listing__form-content pb-2">
							<div class="row">
								<div class="col-md-12">
									<textarea class="form-control">
										
									</textarea>
								</div>
							</div>
						</div>

					</div>
					
					<!-- form box -->
					<div class="add-listing__form-box" id="gallery-box">

						<h2 class="add-listing__form-title">
							Gallery:
						</h2>

						<div class="add-listing__form-content">
							<div class="add-listing__input-file-box">
								<input class="add-listing__input-file" type="file" name="file" id="file"/>
								<div class="add-listing__input-file-wrap">
									<i class="la la-cloud-upload"></i>
									<p>Click here to upload your images</p>
								</div>
							</div>							
						</div>

					</div>
					
					<!-- form box -->
					<div class="add-listing__form-box" id="social-box">

						<h2 class="add-listing__form-title">
							Social Networks:
						</h2>

						<div class="add-listing__form-content">
							<div class="row">
								<div class="col-md-3 col-sm-6">
									<label class="add-listing__label" for="facebook">
										Facebook <span>(optional)</span>:
									</label>
									<input class="add-listing__input" type="text" name="facebook" id="facebook" placeholder="Facebook URL" />
								</div>
								<div class="col-md-3 col-sm-6">
									<label class="add-listing__label" for="twitter">
										Twitter <span>(optional)</span>:
									</label>
									<input class="add-listing__input" type="text" name="twitter" id="twitter" placeholder="Twitter URL" />
								</div>
								<div class="col-md-3 col-sm-6">
									<label class="add-listing__label" for="youtube">
										YouTube <span>(optional)</span>:
									</label>
									<input class="add-listing__input" type="text" name="youtube" id="youtube" placeholder="YouTube URL" />
								</div>
								<div class="col-md-3 col-sm-6">
									<label class="add-listing__label" for="pinterest">
										Pinterest <span>(optional)</span>:
									</label>
									<input class="add-listing__input" type="text" name="pinterest" id="pinterest" placeholder="Pinterest URL" />
								</div>
								<div class="col-md-3 col-sm-6">
									<label class="add-listing__label" for="pinterest">
										Whatsapp <span>(optional)</span>:
									</label>
									<input class="add-listing__input" type="text" name="pinterest" id="whatsapp" placeholder="Whatsapp" />
								</div>
								<div class="col-md-3 col-sm-6">
									<label class="add-listing__label" for="pinterest">
										Skype <span>(optional)</span>:
									</label>
									<input class="add-listing__input" type="text" name="pinterest" id="Skype" placeholder="Skype" />
								</div>
							</div>
						</div>

					</div>
					<div class="add-listing__form-content">
							<div class="row">
								<div class="col-md-3 col-sm-6">
									<label class="add-listing__label" for="facebook">
										Sports Facility <span>(optional)</span>:
									</label>
									<select name="sports[]" id="" class="form-control multipleChosen" multiple="true" >
									@if($filters->count()>0)
                                   @foreach($filters as $filter)
									<option value="{{$filter->id}}">{{$filter->name}}</option>
									@endforeach
									@endif
									</select>
								</div>
								
								
							
							</div>
						</div>

					</div>

					<div class="center-button">
						<button class="add-listing__submit" type="submit">
							<i class="fa fa-paper-plane" aria-hidden="true"></i>
							Preview and Submit Listing
						</button>
					</div>

				</div>

			</form>
					</div>
				</div>
			</div>
			<div class="sign__background"></div>
		</section>
		<!-- <section class="add-listing">
			<div class="add-listing__title-box">
				<div class="container">
					<h1 class="add-listing__title">
						Add Your School Listing
					</h1>
				</div>
			</div>

			
		</section> -->
		<!-- End add-listing -->


@endsection
@section('scripts')
        <script>
            $(document).ready(function(){
                let searchParams = new URLSearchParams(window.location.search)
                let token= searchParams.get("token");
                
                $("#token").val(token);
            })
			$(document).ready(function(){
  //Chosen
  $(".multipleChosen").chosen({
      placeholder_text_multiple: "What's your rating" //placeholder
	});
        </script>
        @endsection