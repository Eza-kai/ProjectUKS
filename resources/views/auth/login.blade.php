<!DOCTYPE html>
<html lang="en">
<head>
    <title>Portal - Login</title>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Login Page">
    <meta name="author" content="Your Name">
    <link rel="shortcut icon" href="{{ asset('assets/favicon.ico') }}"> 

    <!-- FontAwesome JS -->
    <script defer src="{{ asset('assets/backend/plugins/fontawesome/js/all.min.js') }}"></script>

    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="{{ asset('assets/backend/css/portal.css') }}">
</head>

<body class="app app-login p-0">    	
    <div class="row g-0 app-auth-wrapper">
	    <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
		    <div class="d-flex flex-column align-content-end">
			    <div class="app-auth-body mx-auto">	
				    <div class="app-auth-branding mb-4">
                        <a class="app-logo" href="#">
                            <img class="logo-icon me-2" src="{{ asset('assets/backend/images/app-logo.svg') }}" alt="logo">
                        </a>
                    </div>
					<h2 class="auth-heading text-center mb-5">Login to UKS</h2>
			        
                    <!-- ALERTS -->
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

			        <div class="auth-form-container text-start">
						<form class="auth-form login-form" method="POST" action="{{ route('login') }}">
							@csrf

							<div class="email mb-3">
								<label for="email">Email</label>
								<input id="email" name="email" type="email" class="form-control" placeholder="Email address" required autofocus>
							</div>

							<div class="password mb-3">
								<label for="password">Password</label>
								<input id="password" name="password" type="password" class="form-control" placeholder="Password" required>

								<div class="extra mt-3 row justify-content-between">
									<div class="col-6">
										<div class="form-check">
											<input class="form-check-input" type="checkbox" name="remember" id="remember">
											<label class="form-check-label" for="remember">
											Remember me
											</label>
										</div>
									</div>
									<div class="col-6 text-end">
										<a href="{{ route('password.request') }}">Forgot password?</a>
									</div>
								</div>
							</div>

							<div class="text-center">
								<button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Log In</button>
							</div>
						</form>
					</div>
			    </div>

			    <footer class="app-auth-footer">
				    <div class="container text-center py-3">
			            <small class="copyright">
                            Designed by <a href="https://themes.3rdwavemedia.com/" target="_blank">Xiaoying Riley</a>
                        </small>
				    </div>
			    </footer>
		    </div>
	    </div>

	    <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
		    <div class="auth-background-holder"></div>
		    <div class="auth-background-mask"></div>
		    <div class="auth-background-overlay p-3 p-lg-5">
			    <div class="d-flex flex-column align-content-end h-100">
				    <div class="h-100"></div>
				    <div class="overlay-content p-3 p-lg-4 rounded">
					    <h5 class="mb-3 overlay-title">Explore Portal Admin Template</h5>
					    <div>
                            Portal is a free Bootstrap 5 admin dashboard template.
                            License <a href="https://themes.3rdwavemedia.com/" target="_blank">here</a>.
                        </div>
				    </div>
			    </div>
		    </div>
	    </div>
    </div>
</body>
</html>
