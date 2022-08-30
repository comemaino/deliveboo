<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Laravel') }}</title>

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
</head>

<body>
	<nav class="navbar navbar-expand-md navbar-dark bg-dark flex-md-nowrap justify-content-between p-0">
		<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Boolpress</a>
		<ul class="navbar-nav px-3 ml-auto">
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
			<nav class="col-md-2 d-none d-md-block bg-light sidebar py-4">
				<div class="sidebar-sticky">
					<ul class="nav flex-column">
						<li class="nav-item">
							<a class="nav-link active" href="{{ route('admin.home') }}">
								<i class="fas fa-home"></i>
								Home Page
							</a>
						</li>
						<li class="nav-item">
							{{-- <a class="nav-link" href="{{ route('admin.products', ['id' => $user->id]) }}">
                                <i class="fas fa-border-all"></i>
                                Tutti i Prodotti
                            </a> --}}
							<a class="nav-link" href="{{ route('admin.products') }}">
								<i class="fas fa-border-all"></i>
								Tutti i Prodotti
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('admin.products.create') }}">
								<i class="fas fa-plus-square"></i>
								Aggiungi un nuovo prodotto
							</a>
						</li>
						{{-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.categories.index') }}">
                                <i class="fas fa-list-ul"></i>
                              Categories
                            </a>
                        </li> --}}
						{{-- <li class="nav-item">
                            <a class="nav-link" href="#">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7" y2="7"></line></svg>
                              Tags
                            </a>
                        </li> --}}
					</ul>

				</div>
			</nav>

			<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 py-4">
				@yield('content')
			</main>
		</div>
	</div>
</body>

</html>
