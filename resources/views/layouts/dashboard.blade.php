<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>Deliveboo</title>

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
		integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />
	{{-- CDN ChartJs --}}
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"
		integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA=="
		crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
	<nav class="navbar  flex-nowrap justify-content-between px-3 px-lg-4 py-1 py-lg-3">

		<a class="navbar-brand p-0" href="#">Deliveboo</a>

		<ul class="navbar-nav px-2">
			{{-- <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">
                    Visita il sito
                </a>
            </li> --}}
			<li class="nav-item">
				<a class="nav-link" href="{{ route('logout') }}"
					onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
					Logout
				</a>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					@csrf
				</form>
			</li>
		</ul>
	</nav>
	<div class="container-fluid">
		<div class="row">
			<nav class=" col-12 col-md-3 col-lg-2  d-block bg-light sidebar py-md-4 py-1 px-1">
				<div class="sidebar-sticky">
					<ul class="nav flex-md-column flex-row row-cols-5 row-cols-md-1 justify-content-between">
						<li class="nav-item text-center text-md-start">
							<a class="nav-link active" href="{{ route('admin.home') }}">
								<i class="fas fa-home"></i>
								<span class="d-none d-md-inline-block ">Home Page</span>
							</a>
						</li>
						<li class="nav-item text-center text-md-start">
							<a class="nav-link" href="{{ route('admin.products') }}">
								<i class="fas fa-border-all"></i>
								<span class="d-none d-md-inline-block">I tuoi prodotti</span>
							</a>
						</li>
						<li class="nav-item text-center text-md-start">
							<a class="nav-link" href="{{ route('admin.products.create') }}">
								<i class="fas fa-plus-square"></i>
								<span class="d-none d-md-inline-block">Nuovo prodotto</span>
							</a>
						</li>
						<li class="nav-item text-center text-md-start">
							<a class="nav-link" href="{{ route('admin.orders.index') }}">
								<i class="fas fa-list-ul"></i>
								<span class="d-none d-md-inline-block">Ordini ricevuti</span>
							</a>
						</li>
						<li class="nav-item text-center text-md-start">
							<a class="nav-link" href="{{ route('admin.orders.chart') }}">
								<i class="far fa-chart-bar"></i>
								<span class="d-none d-md-inline-block">Statistiche</span>
							</a>
						</li>
						{{-- <li class="nav-item">
                            <a class="nav-link" href="#">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7" y2="7"></line></svg>
                              Tags
                            </a>
                        </li> --}}
					</ul>

				</div>
			</nav>

			<main role="main" class="col-12  col-md-9 col-lg-10 p-0">
				@yield('content')
			</main>
		</div>
	</div>
</body>

</html>
