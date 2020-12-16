@extends('clientside.layout.master')
@section('title', 'Map')
@section('headname','Map')
@section('content')
<!-- map block
			================================================== -->
		<div class="map-wrapper">
			<div id="map" data-map-zoom="9"></div>
		</div>
		<!-- End map block -->

		<!-- explore-module
			================================================== -->
		<section class="explore">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="explore__filter">
							<form class="explore__form">
								<h2 class="explore__form-title">
									Filter Listings
								</h2>
							<div class="row">
								<!-- <input class="explore__form-input col-md-3 mr-2" type="text" name="search-ar" id="search-ar" placeholder="Looking for?" /> -->
								<select class="col-md-5 explore__form-input js-example-basic-multiple">
									<option>Duration </option>
									<option>New York</option>
									<option>California</option>
									<option>Washington</option>
									<option>New Jersey</option>
									<option>Miami</option>
									<option>San Francisco</option>
									<option>Boston</option>
									<option>Pensilvania</option>
									<option>Other</option>
								</select>
								<select class="col-md-5 explore__form-input js-example-basic-multiple">
									<option>Course : </option>
									<option>Art's</option>
									<option>Health</option>
									<option>Hotels</option>
									<option>Real Estate</option>
									<option>Rentals</option>
									<option>Restaurant</option>
									<option>Shopping</option>
									<option>Travel</option>
									<option>Vacation</option>
								</select>
							</div>
							<div class="row">
								<input class="explore__form-input col-md-5 mr-2" type="text" name="search-ar" id="search-ar" placeholder="Price" />
								<input class="explore__form-input col-md-5 mr-2" type="text" name="search-ar" id="search-ar" placeholder="Price / Hour" />
								
							</div>
								<h2 class="explore__form-desc">
									Advanced Search
									<a href="#" class="advanced-toggle">
										more 
										<i class="fa fa-angle-down" aria-hidden="true"></i>
									</a>
								</h2>
								<div class="explore__form-advanced">
									<span class="text-dark">Sports:</span>
									<ul class="explore__form-price-list">
										<li><a href="#">Football</a></li>
										<li><a href="#">Cricket</a></li>
										<li><a href="#" class="active">Hockey</a></li>
										<li><a href="#">Baseball</a></li>
										<li><a href="#">Snooker</a></li>
									</ul>
									<ul class="explore__form-checkbox-list">
										<li>
											<input class="explore__input-checkbox" type="checkbox" name="open-check" id="open-check"/>
											<span class="explore__checkbox-style"></span>
											<span class="explore__checkbox-text">Open now</span>
										</li>
										<li>
											<input class="explore__input-checkbox" type="checkbox" name="child-check" id="child-check"/>
											<span class="explore__checkbox-style"></span>
											<span class="explore__checkbox-text">Child friendly</span>
										</li>
										<li>
											<input class="explore__input-checkbox" type="checkbox" name="near-me-check" id="near-me-check"/>
											<span class="explore__checkbox-style"></span>
											<span class="explore__checkbox-text">Near me</span>
										</li>
										<li>
											<input class="explore__input-checkbox" type="checkbox" name="24-check" id="24-check"/>
											<span class="explore__checkbox-style"></span>
											<span class="explore__checkbox-text">24hours</span>
										</li>
										<li>
											<input class="explore__input-checkbox" type="checkbox" name="free-parking-check" id="free-parking-check"/>
											<span class="explore__checkbox-style"></span>
											<span class="explore__checkbox-text">Free Parking</span>
										</li>
										<li>
											<input class="explore__input-checkbox" type="checkbox" name="pet-check" id="pet-check"/>
											<span class="explore__checkbox-style"></span>
											<span class="explore__checkbox-text">Pet Friendly</span>
										</li>
										<li>
											<input class="explore__input-checkbox" type="checkbox" name="smooking-check" id="smooking-check"/>
											<span class="explore__checkbox-style"></span>
											<span class="explore__checkbox-text">Smoking allowed</span>
										</li>
										<li>
											<input class="explore__input-checkbox" type="checkbox" name="wifi-check" id="wifi-check"/>
											<span class="explore__checkbox-style"></span>
											<span class="explore__checkbox-text">Wifi</span>
										</li>
										<li>
											<input class="explore__input-checkbox" type="checkbox" name="credit-card-check" id="credit-card-check"/>
											<span class="explore__checkbox-style"></span>
											<span class="explore__checkbox-text">Accepts credit card</span>
										</li>
									</ul>
								</div>
								<div class="explore__advertise">
									<span class="explore__advertise-title">
										advertising box
									</span>
									<img src="upload/add2.jpg" alt="">
								</div>
								<div class="explore__advertise">
									<span class="explore__advertise-title">
										advertising box
									</span>
									<img src="upload/add.jpg" alt="">
								</div>
							</form>
						</div>
					</div>

				</div>
			</div>
		</section>
		<!-- End explore-module -->


@endsection