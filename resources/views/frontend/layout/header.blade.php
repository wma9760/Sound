<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from dmitryvolkov.me/demo/volna/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 14 May 2022 19:34:29 GMT -->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- CSS -->
	<link rel="stylesheet"  href="{{ url('new/css/bootstrap-reboot.min.css')}}">
	<link rel="stylesheet"  href="{{ url('new/css/bootstrap-grid.min.css')}}">
	<link rel="stylesheet"  href="{{ url('new/css/owl.carousel.min.css')}}">
	<link rel="stylesheet"  href="{{ url('new/css/magnific-popup.css')}}">
	<link rel="stylesheet"  href="{{ url('new/css/select2.min.css')}}">
	<link rel="stylesheet"  href="{{ url('new/css/paymentfont.min.css')}}">
	<link rel="stylesheet"  href="{{ url('new/css/slider-radio.css')}}">
	<link rel="stylesheet"  href="{{ url('new/css/plyr.css')}}">
	<link rel="stylesheet"  href="{{ url('new/css/main.css')}}">

	<!-- Favicons -->
	<link rel="icon" type="image/png"  href="{{ url('new/icon/favicon-32x32.png')}}" sizes="32x32">
	<link rel="apple-touch-icon" href="icon/favicon-32x32.png">

	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Dmitry Volkov">
	<title>Volna – Record label & Music streaming HTML Template</title>

</head>
<body>
	<!-- header -->
	<header class="header">
		<div class="header__content">
			<div class="header__logo">
				<a href="index.html">
					<img src="img/logo.svg" alt="">
				</a>
			</div>

			<nav class="header__nav">
				<a href="profile.html">Profile</a>
				<a href="about.html">About</a>
				<a href="contacts.html">Contacts</a>
			</nav>

			<form action="#" class="header__search">
				<input type="text" placeholder="Artist, track or podcast">
				<button type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.71,20.29,18,16.61A9,9,0,1,0,16.61,18l3.68,3.68a1,1,0,0,0,1.42,0A1,1,0,0,0,21.71,20.29ZM11,18a7,7,0,1,1,7-7A7,7,0,0,1,11,18Z"/></svg></button>
				<button type="button" class="close"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M13.41,12l6.3-6.29a1,1,0,1,0-1.42-1.42L12,10.59,5.71,4.29A1,1,0,0,0,4.29,5.71L10.59,12l-6.3,6.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L12,13.41l6.29,6.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42Z"/></svg></button>
			</form>

			<div class="header__actions">
				<div class="header__action header__action--search">
					<button class="header__action-btn" type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.71,20.29,18,16.61A9,9,0,1,0,16.61,18l3.68,3.68a1,1,0,0,0,1.42,0A1,1,0,0,0,21.71,20.29ZM11,18a7,7,0,1,1,7-7A7,7,0,0,1,11,18Z"/></svg></button>
				</div>

				<div class="header__action header__action--note">
					<span>17</span>
					<a href="#" class="header__action-btn"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19.05566,2h-14a3.00328,3.00328,0,0,0-3,3V19a3.00328,3.00328,0,0,0,3,3h14a3.00328,3.00328,0,0,0,3-3V5A3.00328,3.00328,0,0,0,19.05566,2Zm-14,2h14a1.001,1.001,0,0,1,1,1v8H17.59082a1.99687,1.99687,0,0,0-1.66406.89062L14.52051,16H9.59082L8.18457,13.89062A1.99687,1.99687,0,0,0,6.52051,13H4.05566V5A1.001,1.001,0,0,1,5.05566,4Zm14,16h-14a1.001,1.001,0,0,1-1-1V15H6.52051l1.40625,2.10938A1.99687,1.99687,0,0,0,9.59082,18h4.92969a1.99687,1.99687,0,0,0,1.66406-.89062L17.59082,15h2.46484v4A1.001,1.001,0,0,1,19.05566,20Z"/></svg></a>

					<div class="header__drop">
						<a href="#" class="header__all">View all</a>
						<div class="header__note header__note--succ">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M14.72,8.79l-4.29,4.3L8.78,11.44a1,1,0,1,0-1.41,1.41l2.35,2.36a1,1,0,0,0,.71.29,1,1,0,0,0,.7-.29l5-5a1,1,0,0,0,0-1.42A1,1,0,0,0,14.72,8.79ZM12,2A10,10,0,1,0,22,12,10,10,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8,8,0,0,1,12,20Z"/></svg>
							<p><a href="#modal-info2" class="open-modal">Payment #51</a> was successful!</p>
							<span>1 hour ago</span>
						</div>
						<div class="header__note header__note--fail">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M15.71,8.29a1,1,0,0,0-1.42,0L12,10.59,9.71,8.29A1,1,0,0,0,8.29,9.71L10.59,12l-2.3,2.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L12,13.41l2.29,2.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42L13.41,12l2.3-2.29A1,1,0,0,0,15.71,8.29Zm3.36-3.36A10,10,0,1,0,4.93,19.07,10,10,0,1,0,19.07,4.93ZM17.66,17.66A8,8,0,1,1,20,12,7.95,7.95,0,0,1,17.66,17.66Z"/></svg>
							<p><a href="#modal-info3" class="open-modal">Payment #50</a> failed!</p>
							<span>2 hours ago</span>
						</div>
						<div class="header__note header__note--info">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12,2A10,10,0,1,0,22,12,10.01114,10.01114,0,0,0,12,2Zm0,18a8,8,0,1,1,8-8A8.00917,8.00917,0,0,1,12,20Zm0-8.5a1,1,0,0,0-1,1v3a1,1,0,0,0,2,0v-3A1,1,0,0,0,12,11.5Zm0-4a1.25,1.25,0,1,0,1.25,1.25A1.25,1.25,0,0,0,12,7.5Z"/></svg>
							<p><a href="#modal-info4" class="open-modal">Example</a> of notification.</p>
							<span>2 hours ago</span>
						</div>
						<div class="header__note header__note--gift">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M18,7h-.35A3.45,3.45,0,0,0,18,5.5a3.49,3.49,0,0,0-6-2.44A3.49,3.49,0,0,0,6,5.5,3.45,3.45,0,0,0,6.35,7H6a3,3,0,0,0-3,3v2a1,1,0,0,0,1,1H5v6a3,3,0,0,0,3,3h8a3,3,0,0,0,3-3V13h1a1,1,0,0,0,1-1V10A3,3,0,0,0,18,7ZM11,20H8a1,1,0,0,1-1-1V13h4Zm0-9H5V10A1,1,0,0,1,6,9h5Zm0-4H9.5A1.5,1.5,0,1,1,11,5.5Zm2-1.5A1.5,1.5,0,1,1,14.5,7H13ZM17,19a1,1,0,0,1-1,1H13V13h4Zm2-8H13V9h5a1,1,0,0,1,1,1Z"/></svg>
							<p><a href="#modal-info5" class="open-modal">You have received a gift!</a></p>
							<span>4 hours ago</span>
						</div>
					</div>
				</div>

				<div class="header__action header__action--cart">
					<span>3</span>
					<a class="header__action-btn" href="cart.html"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M8.5,19A1.5,1.5,0,1,0,10,20.5,1.5,1.5,0,0,0,8.5,19ZM19,16H7a1,1,0,0,1,0-2h8.49121A3.0132,3.0132,0,0,0,18.376,11.82422L19.96143,6.2749A1.00009,1.00009,0,0,0,19,5H6.73907A3.00666,3.00666,0,0,0,3.92139,3H3A1,1,0,0,0,3,5h.92139a1.00459,1.00459,0,0,1,.96142.7251l.15552.54474.00024.00506L6.6792,12.01709A3.00006,3.00006,0,0,0,7,18H19a1,1,0,0,0,0-2ZM17.67432,7l-1.2212,4.27441A1.00458,1.00458,0,0,1,15.49121,12H8.75439l-.25494-.89221L7.32642,7ZM16.5,19A1.5,1.5,0,1,0,18,20.5,1.5,1.5,0,0,0,16.5,19Z"/></svg></a>

					<div class="header__drop">
						<a href="cart.html" class="header__all">Go to cart</a>
						<div class="header__product">
							<img src="img/store/item4.jpg" alt="">
							<p><a href="product.html">Headphones ZR-991</a></p>
							<span>$199</span>
							<button type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M13.41,12l6.3-6.29a1,1,0,1,0-1.42-1.42L12,10.59,5.71,4.29A1,1,0,0,0,4.29,5.71L10.59,12l-6.3,6.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L12,13.41l6.29,6.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42Z"/></svg></button>
						</div>
						<div class="header__product">
							<img src="img/store/item3.jpg" alt="">
							<p><a href="product.html">Music Blank</a></p>
							<span>$3.99</span>
							<button type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M13.41,12l6.3-6.29a1,1,0,1,0-1.42-1.42L12,10.59,5.71,4.29A1,1,0,0,0,4.29,5.71L10.59,12l-6.3,6.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L12,13.41l6.29,6.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42Z"/></svg></button>
						</div>
						<div class="header__product">
							<img src="img/store/item2.jpg" alt="">
							<p><a href="product.html">Microphone R4</a></p>
							<span>$799</span>
							<button type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M13.41,12l6.3-6.29a1,1,0,1,0-1.42-1.42L12,10.59,5.71,4.29A1,1,0,0,0,4.29,5.71L10.59,12l-6.3,6.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0L12,13.41l6.29,6.3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42Z"/></svg></button>
						</div>
					</div>
				</div>

				<div class="header__action header__action--signin">
					<a class="header__action-btn" href="signin.html">
						<span>Sign in</span>
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20,12a1,1,0,0,0-1-1H11.41l2.3-2.29a1,1,0,1,0-1.42-1.42l-4,4a1,1,0,0,0-.21.33,1,1,0,0,0,0,.76,1,1,0,0,0,.21.33l4,4a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42L11.41,13H19A1,1,0,0,0,20,12ZM17,2H7A3,3,0,0,0,4,5V19a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V16a1,1,0,0,0-2,0v3a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V5A1,1,0,0,1,7,4H17a1,1,0,0,1,1,1V8a1,1,0,0,0,2,0V5A3,3,0,0,0,17,2Z"/></svg>
					</a>
				</div>
			</div>

			<button class="header__btn" type="button">
				<span></span>
				<span></span>
				<span></span>
			</button>
		</div>
	</header>
	<!-- end header -->
    
	<!-- sidebar -->
	<div class="sidebar">
		<!-- sidebar logo -->
		<div class="sidebar__logo">
			<img src="img/logo.svg" alt="">
		</div>
		<!-- end sidebar logo -->

		<!-- sidebar nav -->
		<ul class="sidebar__nav">
			<li class="sidebar__nav-item">
				<a href="index.html" class="sidebar__nav-link sidebar__nav-link--active"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20,8h0L14,2.74a3,3,0,0,0-4,0L4,8a3,3,0,0,0-1,2.26V19a3,3,0,0,0,3,3H18a3,3,0,0,0,3-3V10.25A3,3,0,0,0,20,8ZM14,20H10V15a1,1,0,0,1,1-1h2a1,1,0,0,1,1,1Zm5-1a1,1,0,0,1-1,1H16V15a3,3,0,0,0-3-3H11a3,3,0,0,0-3,3v5H6a1,1,0,0,1-1-1V10.25a1,1,0,0,1,.34-.75l6-5.25a1,1,0,0,1,1.32,0l6,5.25a1,1,0,0,1,.34.75Z"></path></svg> <span>Home</span></a>
			</li>

			<li class="sidebar__nav-item">
				<a href="artists.html" class="sidebar__nav-link"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12.3,12.22A4.92,4.92,0,0,0,14,8.5a5,5,0,0,0-10,0,4.92,4.92,0,0,0,1.7,3.72A8,8,0,0,0,1,19.5a1,1,0,0,0,2,0,6,6,0,0,1,12,0,1,1,0,0,0,2,0A8,8,0,0,0,12.3,12.22ZM9,11.5a3,3,0,1,1,3-3A3,3,0,0,1,9,11.5Zm9.74.32A5,5,0,0,0,15,3.5a1,1,0,0,0,0,2,3,3,0,0,1,3,3,3,3,0,0,1-1.5,2.59,1,1,0,0,0-.5.84,1,1,0,0,0,.45.86l.39.26.13.07a7,7,0,0,1,4,6.38,1,1,0,0,0,2,0A9,9,0,0,0,18.74,11.82Z"/></svg> <span>Artists</span></a>
			</li>

			<li class="sidebar__nav-item">
				<a href="releases.html" class="sidebar__nav-link"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.65,2.24a1,1,0,0,0-.8-.23l-13,2A1,1,0,0,0,7,5V15.35A3.45,3.45,0,0,0,5.5,15,3.5,3.5,0,1,0,9,18.5V10.86L20,9.17v4.18A3.45,3.45,0,0,0,18.5,13,3.5,3.5,0,1,0,22,16.5V3A1,1,0,0,0,21.65,2.24ZM5.5,20A1.5,1.5,0,1,1,7,18.5,1.5,1.5,0,0,1,5.5,20Zm13-2A1.5,1.5,0,1,1,20,16.5,1.5,1.5,0,0,1,18.5,18ZM20,7.14,9,8.83v-3L20,4.17Z"/></svg> <span>Releases</span></a>
			</li>

			<li class="sidebar__nav-item">
				<a href="events.html" class="sidebar__nav-link"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12,19a1,1,0,1,0-1-1A1,1,0,0,0,12,19Zm5,0a1,1,0,1,0-1-1A1,1,0,0,0,17,19Zm0-4a1,1,0,1,0-1-1A1,1,0,0,0,17,15Zm-5,0a1,1,0,1,0-1-1A1,1,0,0,0,12,15ZM19,3H18V2a1,1,0,0,0-2,0V3H8V2A1,1,0,0,0,6,2V3H5A3,3,0,0,0,2,6V20a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V6A3,3,0,0,0,19,3Zm1,17a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V11H20ZM20,9H4V6A1,1,0,0,1,5,5H6V6A1,1,0,0,0,8,6V5h8V6a1,1,0,0,0,2,0V5h1a1,1,0,0,1,1,1ZM7,15a1,1,0,1,0-1-1A1,1,0,0,0,7,15Zm0,4a1,1,0,1,0-1-1A1,1,0,0,0,7,19Z"/></svg> <span>Events</span></a>
			</li>

			<li class="sidebar__nav-item">
				<a href="podcasts.html" class="sidebar__nav-link"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12,15a4,4,0,0,0,4-4V5A4,4,0,0,0,8,5v6A4,4,0,0,0,12,15ZM10,5a2,2,0,0,1,4,0v6a2,2,0,0,1-4,0Zm10,6a1,1,0,0,0-2,0A6,6,0,0,1,6,11a1,1,0,0,0-2,0,8,8,0,0,0,7,7.93V21H9a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2H13V18.93A8,8,0,0,0,20,11Z"/></svg> <span>Podcasts</span></a>
			</li>

			<!-- collapse -->
			<li class="sidebar__nav-item">
				<a class="sidebar__nav-link" data-toggle="collapse" href="#collapseMenu1" role="button" aria-expanded="false" aria-controls="collapseMenu1"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M19,5.5H12.72l-.32-1a3,3,0,0,0-2.84-2H5a3,3,0,0,0-3,3v13a3,3,0,0,0,3,3H19a3,3,0,0,0,3-3V8.5A3,3,0,0,0,19,5.5Zm1,13a1,1,0,0,1-1,1H5a1,1,0,0,1-1-1V5.5a1,1,0,0,1,1-1H9.56a1,1,0,0,1,.95.68l.54,1.64A1,1,0,0,0,12,7.5h7a1,1,0,0,1,1,1Z"/></svg> <span>Pages</span> <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M17,9.17a1,1,0,0,0-1.41,0L12,12.71,8.46,9.17a1,1,0,0,0-1.41,0,1,1,0,0,0,0,1.42l4.24,4.24a1,1,0,0,0,1.42,0L17,10.59A1,1,0,0,0,17,9.17Z"/></svg></a>

				<div class="collapse" id="collapseMenu1">
					<ul class="sidebar__menu sidebar__menu--scroll">
						<li><a href="artist.html">Artist</a></li>
						<li><a href="event.html">Event</a></li>
						<li><a href="release.html">Release</a></li>
						<li><a href="product.html">Product</a></li>
						<li><a href="article.html">Article</a></li>
						<li><a href="cart.html">Cart</a></li>
						<li><a href="profile.html">Profile</a></li>
						<li><a href="about.html">About</a></li>
						<li><a href="contacts.html">Contacts</a></li>
						<li><a href="pricing.html">Pricing plans</a></li>
						<li><a href="privacy.html">Privacy policy</a></li>
						<li><a href="signin.html">Sign in</a></li>
						<li><a href="signup.html">Sign up</a></li>
						<li><a href="forgot.html">Forgot password</a></li>
						<li><a href="404.html">404 Page</a></li>
					</ul>
				</div>
			</li>
			<!-- end collapse -->

			<li class="sidebar__nav-item">
				<a href="store.html" class="sidebar__nav-link"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M8.5,19A1.5,1.5,0,1,0,10,20.5,1.5,1.5,0,0,0,8.5,19ZM19,16H7a1,1,0,0,1,0-2h8.49121A3.0132,3.0132,0,0,0,18.376,11.82422L19.96143,6.2749A1.00009,1.00009,0,0,0,19,5H6.73907A3.00666,3.00666,0,0,0,3.92139,3H3A1,1,0,0,0,3,5h.92139a1.00459,1.00459,0,0,1,.96142.7251l.15552.54474.00024.00506L6.6792,12.01709A3.00006,3.00006,0,0,0,7,18H19a1,1,0,0,0,0-2ZM17.67432,7l-1.2212,4.27441A1.00458,1.00458,0,0,1,15.49121,12H8.75439l-.25494-.89221L7.32642,7ZM16.5,19A1.5,1.5,0,1,0,18,20.5,1.5,1.5,0,0,0,16.5,19Z"/></svg> <span>Store</span></a>
			</li>

			<li class="sidebar__nav-item">
				<a href="news.html" class="sidebar__nav-link"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M16,14H8a1,1,0,0,0,0,2h8a1,1,0,0,0,0-2Zm0-4H10a1,1,0,0,0,0,2h6a1,1,0,0,0,0-2Zm4-6H17V3a1,1,0,0,0-2,0V4H13V3a1,1,0,0,0-2,0V4H9V3A1,1,0,0,0,7,3V4H4A1,1,0,0,0,3,5V19a3,3,0,0,0,3,3H18a3,3,0,0,0,3-3V5A1,1,0,0,0,20,4ZM19,19a1,1,0,0,1-1,1H6a1,1,0,0,1-1-1V6H7V7A1,1,0,0,0,9,7V6h2V7a1,1,0,0,0,2,0V6h2V7a1,1,0,0,0,2,0V6h2Z"/></svg> <span>News</span></a>
			</li>
		</ul>
		<!-- end sidebar nav -->
	</div>
	<!-- end sidebar -->

	<!-- player -->
	<div class="player">
		<div class="player__cover">
			<img src="img/covers/cover.svg" alt="">
		</div>

		<div class="player__content">
			<span class="player__track"><b class="player__title">Epic Cinematic</b> – <span class="player__artist">AudioPizza</span></span>
			<audio src="https://dmitryvolkov.me/demo/blast2.0/audio/12071151_epic-cinematic-trailer_by_audiopizza_preview.mp3" id="audio" controls></audio>
		</div>
	</div>

	<button class="player__btn" type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M21.65,2.24a1,1,0,0,0-.8-.23l-13,2A1,1,0,0,0,7,5V15.35A3.45,3.45,0,0,0,5.5,15,3.5,3.5,0,1,0,9,18.5V10.86L20,9.17v4.18A3.45,3.45,0,0,0,18.5,13,3.5,3.5,0,1,0,22,16.5V3A1,1,0,0,0,21.65,2.24ZM5.5,20A1.5,1.5,0,1,1,7,18.5,1.5,1.5,0,0,1,5.5,20Zm13-2A1.5,1.5,0,1,1,20,16.5,1.5,1.5,0,0,1,18.5,18ZM20,7.14,9,8.83v-3L20,4.17Z"/></svg> Player</button>
	<!-- end player -->


<!-- <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Tempor consequat Re">
    <meta name="keywords" content="Aspernatur quae et s">
    <meta name="author" content="Acton Kline">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="csrf-token" content="pSWr3YbCpDKzktwrgePB6tICuqiclWoKiNiblDSU">
    <title> Home | Miraculous-Tempor consequat Re </title>
    <link rel="shortcut icon" href="{{ url('frontend/images/sites/favicon.png') }}">
    {{-- <link href="{{ url('frontend/assets/css/star-rating.css') }}" rel="stylesheet" type="text/css"> --}}
    {{-- <link href="{{ url('frontend/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"> --}}
    <link href="{{ url('frontend/assets/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('frontend/assets/css/flag-icon.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('frontend/assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('frontend/assets/css/fonts.css') }}" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ url('frontend/assets/plugins/nice_select/nice-select.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ url('frontend/assets/plugins/scroll/jquery.mCustomScrollbar.css') }}">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
    <link href="{{ url('frontend/assets/css/front/custom-style.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

    <script src="{{ asset('js/app.js') }}" defer></script>

    <style>
      #search-btn  input[type="submit"]{
    border:none;
    background: #20a7c4;
    color: #fff;
    font-size: 15px;
    padding: 0px 30px;
    width: auto;
    cursor: pointer;
    height: 44px;
    line-height: 38px;
    border-radius: 20px;
}

    </style>

</head>

<body id="mainBodyContent" class="loaded" style="">

    <div class="ms_loader">
        <div class="wrap">
            <img src="/frontend/images/sites/loader.gif" alt="">
        </div>
    </div>
    <div class="ms_ajax_loader">
        <div class="wrap">
            <img src="/frontend/images/sites/loader.gif" alt="">
        </div>
    </div>

    <div class="ms_main_wrapper">

        <div class="ms_sidemenu_wrapper">
            <div class="ms_nav_close">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
            </div>
            <div class="ms_sidemenu_inner">
                <div class="ms_logo_inner">
                    <div class="ms_logo">
                        <a href="{{ url('/') }}"><img src="/frontend/images/sites/logo.png" alt=""
                                class="img-fluid"></a>
                    </div>
                </div>

                <div class="ms_nav_wrapper mCustomScrollbar _mCS_1 mCS-autoHide" style="overflow: visible;">
                    <div id="mCSB_1" class="mCustomScrollBox mCS-minimal mCSB_vertical mCSB_outside"
                        style="max-height: none;" tabindex="0">
                        <div id="mCSB_1_container" class="mCSB_container" style="position:relative; top:0; left:0;"
                            dir="ltr">
                            <ul>
                                <li class="current_page_item">
                                    <a href="{{ url('/') }}" title="Home">
                                        <span class="nav_icon">
                                            <span class="icon icon_discover"></span>
                                        </span>
                                        <span class="nav_text">
                                            Home
                                        </span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="{{ url('/home/album') }}" title="Album">
                                        <span class="nav_icon">
                                            <span class="icon icon_albums"></span>
                                        </span>
                                        <span class="nav_text">
                                            Album
                                        </span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="{{ url('/home/artist') }}" title="Artist">
                                        <span class="nav_icon">
                                            <span class="icon icon_artists"></span>
                                        </span>
                                        <span class="nav_text">
                                            Artist
                                        </span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="{{ url('/home/gnere') }}" title="Genre">
                                        <span class="nav_icon">
                                            <span class="icon icon_genres"></span>
                                        </span>
                                        <span class="nav_text">
                                            Genre
                                        </span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="{{ url('/home/track') }}" title="Top Tracks">
                                        <span class="nav_icon">
                                            <span class="icon icon_tracks"></span>
                                        </span>
                                        <span class="nav_text">
                                            Track
                                        </span>
                                    </a>
                                </li>

                            </ul>
                            <ul class="nav_downloads">

                                {{-- <li class="">
                        <a href="{{url('/favrouit')}}" title="Favourites">
                            <span class="nav_icon">
                                <span class="icon icon_favourite"></span>
                            </span>
                            <span class="nav_text">
                                Favourites
                            </span>
                        </a>
                    </li> --}}

                            </ul>
                            {{-- <ul class="nav_playlist">
                    <li class="">
                        <a title="Playlist" href="{{url('/playlist')}}">
                            <span class="nav_icon">
                                <span class="icon icon_fe_playlist"></span>
                            </span>
                            <span class="nav_text">
                                Playlist
                            </span>
                        </a>
                    </li>
                </ul> --}}
                        </div>
                    </div>
                    <div id="mCSB_1_scrollbar_vertical"
                        class="mCSB_scrollTools mCSB_1_scrollbar mCS-minimal mCSB_scrollTools_vertical"
                        style="display: block;">
                        <div class="mCSB_draggerContainer">
                            <div id="mCSB_1_dragger_vertical" class="mCSB_dragger"
                                style="position: absolute; min-height: 50px; height: 107px; top: 0px; display: block; max-height: 251px;">
                                <div class="mCSB_dragger_bar" style="line-height: 50px;"></div>
                            </div>
                            <div class="mCSB_draggerRail"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="ms_content_wrapper padder_top80 padder_bottom70">



            <div class="ms_header">
                <div class="ms_top_left">
                    <div class="ms_top_search">
                      <form action="{{route("search")}}" method="Get">
                        <input type="text" class="form-control" id="search_value"
                        placeholder="Search Music Here.." name="search"
                        value="">
                        <span class="search_icon ">
                         <input type="submit" class=" btn btn-info" id="search-btn" value="Search">
                        </span>
                      </form>
                    </div>
                    {{-- <div class="ms_top_trend">
                    <span><a href="#" class="ms_color">Trending Songs :  </a></span> <span class="top_marquee"><a href="#">Dream your moments, Until I Met You, Gimme Some Courage, Dark Alley</a></span>
                </div> --}}
                </div>
                <div class="ms_top_right">

                    @auth
                        @if (auth()->user()->type == 'user')
                            <div class="dropdown mx-3 mt-3">
                                <button class="btn btn-small btn-info dropdown-toggle text-light" type="button"
                                    id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    Add Track
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="{{ route('home.addAudio') }}">Audio</a></li>
                                    <li><a class="dropdown-item" href="{{ route('home.addVedio') }}">Vedio</a></li>
                                </ul>
                            </div>
                        @endif
                    @endauth


                    <div class="ms_top_btn">
                        <ul class="navbar-nav ms-auto">

                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else


                                    <li class=" nav-item dropdown position">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            <img src="/frontend/images/users/{{Auth::user()->userimage}}" width="40" height="40" class="rounded-circle">

                                            {{ Auth::user()->name }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" data-toggle="modal"
                                                data-target="#lang_modal">Languages</a>
                                            @auth
                                                @if (auth()->user()->type == 'admin')
                                                    <a class="dropdown-item" href="{{ route('admin') }}">
                                                        Dashboard
                                                    </a>
                                                @endif
                                            @endauth
                                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                        </li>

                                    @endguest
                        </ul>
                     </div>

                </div>
            </div> -->
