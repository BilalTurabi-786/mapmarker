<!-- Header
		    ================================================== -->
		<header class="clearfix white-header-style fullwidth-with-search">

			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="container-fluid">

					<a class="navbar-brand" href="{{url('/')}}">
						Logo Here
						<!-- <img src="images/logo-black.png" alt=""> -->
					</a>
					<button onclick="var el = document.getElementById('element'); el.webkitRequestFullscreen();"><i class="fa fa-expand"></i></button>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">
							@if(Auth::guard('contact')->check())
							<li>
								<a href="{{route('logout')}}">Logout</a>
							</li>
							<!-- <li>
								<a href="{{route('profile')}}">Profile</a>
							</li> -->
							@endif
							@if(!Auth::guard('contact')->check())
							<li><a href="{{route('login')}}">Login</a></li>
							@endif
							<!-- <li><a href="portfolio.html">Pages <i class="fa fa-caret-down" aria-hidden="true"></i></a>
								<div class="megadropdown">
									<div class="dropdown-box">
										<span>Explore pages</span>
										<ul class="dropdown-list">
											<li><a href="explore-sidebar-map.html">Explore map sidebar</a></li>
											<li><a href="explore-fullwidth-map.html">Explore fullwidth map</a></li>
											<li><a href="explore-category.html">Explore by Category</a></li>
											<li><a href="explore-fullwidth-map-list.html">Explore list</a></li>
										</ul>
									</div>
									<div class="dropdown-box">
										<span>Listing detail pages</span>
										<ul class="dropdown-list">
											<li><a href="listing-detail-large.html">Listing detail large image</a></li>
											<li><a href="listing-detail-sidebar.html">Listing detail with sidebar</a></li>
											<li><a href="listing-detail-fullwidth.html">Listing detail fullwidth</a></li>
										</ul>
									</div>
									<div class="dropdown-box">
										<span>Simple pages</span>
										<ul class="dropdown-list">
											<li><a href="about.html">About Us</a></li>
											<li><a href="blog.html">Blog</a></li>
											<li><a href="single-post.html">Blog Single Post</a></li>
											<li><a href="error-404.html">404 Error Page</a></li>
										</ul>
									</div>
									<div class="dropdown-box">
										<span>Account pages</span>
										<ul class="dropdown-list">
											<li><a href="add-listing.html">Add listing</a></li>
											<li><a href="sign-page.html">Login &amp; Registration</a></li>
											<li><a href="user-page.html">User page</a></li>
										</ul>
									</div>
								</div>
							</li>
							<li><a href="contact.html">Contact</a></li> -->
						</ul>
						<!-- <form class="search-form">
							<div class="search-form__input-holders">
								<input class="search-form__input" type="text" name="search-event" placeholder="What are you looking for?" />
								<select class="search-form__input search-form__input-location js-example-basic-multiple">
									<option>Location? </option>
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
							</div>
								
							<button class="search-form__submit" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
						</form> -->
						<!-- <ul class="navbar-nav ml-auto right-list">
							<li>
							
								<a href="index.html">Home <i class="fa fa-caret-down" aria-hidden="true"></i></a>
								<ul class="dropdown">
									<li><span>Demo Pages</span></li>
									<li><a href="index.html">Homepage 1</a></li>
									<li><a href="home2.html">Homepage 2</a></li>
									<li><a href="home3.html">Homepage 3</a></li>
									<li><a href="home4.html">Homepage 4</a></li>
								</ul>
							
							</li>
							<li><a href=""><i class="fa fa-user-o" aria-hidden="true"></i> </a></li>
						</ul> -->
						
						<a class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Language
						</a>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						    <a class="dropdown-item" href="#">English</a>
						    <a class="dropdown-item" href="#">French</a>
						    <a class="dropdown-item" href="#">German</a>
						</div>
						<!-- @if (Route::currentRouteName() == "/")
						<div>
							<a class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Add Multi Person Searching
							</a>
							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
								<a class="dropdown-item" href="#"><i class="fa fa-user" aria-hidden="true"></i> Person 1 </a>
								<a class="dropdown-item" href="#"><i class="fa fa-plus" aria-hidden="true"></i> Add Person </a>
							</div>
						</div>
						@endif -->
						@if (Route::currentRouteName()!="contact")
							<a href="{{url('/contact')}}" class="add-list-btn btn-default ml-auto"><i class="fa fa-plus" aria-hidden="true"></i> Add School Listing</a>
						@endif
					</div>

				</div>
			</nav>
		</header>
		<!-- End Header -->