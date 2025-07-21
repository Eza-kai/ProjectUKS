<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Portal - Bootstrap 5 Admin Dashboard Template For Developers</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="favicon.ico"> 
    
    <!-- FontAwesome JS-->
    <script defer src="{{asset('assets/backend/plugins/fontawesome/js/all.min.js')}}"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="{{asset('assets/backend/css/portal.css')}}">

</head> 
@php   
    $jumlahRekam = \App\Models\RekamMedis::count();
    $jumlahKunjungan = \App\Models\RiwayatKunjungan::count();
    $jumlahJadwal = \App\Models\JadwalPemeriksaan::count();
    $jumlahLaporan = $jumlahRekam + $jumlahKunjungan; // contoh asumsi jumlah laporan
@endphp
<body class="app">   	
	<!-- Navbar -->
	@include('layouts.component-backend.navbar')
	<!--  -->
	<!-- Sidebar -->
	@include('layouts.component-backend.sidebar')
	<!--  -->    
    <div class="app-wrapper">		
		<div class="app-content pt-3 p-md-3 p-lg-4">
			<div class="container-xl">				
				<h1 class="app-page-title">Overview</h1>			    
			    <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
					<div class="inner">
						<div class="app-card-body p-3 p-lg-4">
							<h3 class="mb-3">Welcome, {{ Auth::user()->name }}!</h3>
						    <div class="row gx-5 gy-3">
						        <div class="col-12 col-lg-9">
									<div>UKS (Usaha Kesehatan Sekolah) SMK Assalaam adalah unit pembinaan kesehatan yang hadir sebagai wujud nyata kepedulian sekolah terhadap kesehatan jasmani dan rohani seluruh warga sekolah, khususnya peserta didik. Dengan mengusung nilai-nilai Islami, Disiplin, dan Cinta Lingkungan, UKS SMK Assalaam menjadi garda terdepan dalam menciptakan budaya sekolah yang bersih, sehat, dan berakhlakul karimah.</div>
							    </div><!--//col-->							    
						    </div><!--//row-->
						    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div><!--//app-card-body-->
							
				    </div><!--//inner-->
			    </div><!--//app-card-->
				
			    <div class="row g-4 mb-4">
					<div class="col-6 col-lg-3">
						<div class="app-card app-card-stat shadow-sm h-100">
							<div class="app-card-body p-3 p-lg-4">
								<h4 class="stats-type mb-1">Data Rekam Medis</h4>
							    <div class="stats-figure">{{ $jumlahRekam }}</div>
							    <div class="stats-meta text-success">
									<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/>
									</svg> 20%</div>
								</div><!--//app-card-body-->
								<a class="app-card-link-mask" href="#"></a>
							</div><!--//app-card-->
						</div><!--//col-->
						
						<div class="col-6 col-lg-3">
							<div class="app-card app-card-stat shadow-sm h-100">
								<div class="app-card-body p-3 p-lg-4">
							    <h4 class="stats-type mb-1">JadwalPemeriksaan</h4>
							    <div class="stats-figure">{{ $jumlahJadwal }}</div>
							    <div class="stats-meta text-success">
									<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"/>
									</svg> 5% </div>
								</div><!--//app-card-body-->
								<a class="app-card-link-mask" href="#"></a>
							</div><!--//app-card-->
						</div><!--//col-->
						<div class="col-6 col-lg-3">
							<div class="app-card app-card-stat shadow-sm h-100">
								<div class="app-card-body p-3 p-lg-4">
									<h4 class="stats-type mb-1">Riwayat Kunjungan</h4>
									<div class="stats-figure">{{ $jumlahKunjungan }}</div>
									<div class="stats-meta">
										Open</div>
									</div><!--//app-card-body-->
									<a class="app-card-link-mask" href="#"></a>
								</div><!--//app-card-->
							</div><!--//col-->
							<div class="col-6 col-lg-3">
								<div class="app-card app-card-stat shadow-sm h-100">
									<div class="app-card-body p-3 p-lg-4">
										<h4 class="stats-type mb-1">Laporan</h4>
										<div class="stats-figure">{{ $jumlahLaporan }}</div>
										<div class="stats-meta">New</div>
									</div><!--//app-card-body-->
									<a class="app-card-link-mask" href="#"></a>
								</div><!--//app-card-->
							</div><!--//col-->
						</div><!--//row-->			    	    
						<footer class="app-footer">
							<div class="container text-center py-3">
								<!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
								<small class="copyright">Designed with <span class="sr-only">love</span><i class="fas fa-heart" style="color: #fb866a;"></i> by <a class="app-link" href="http://themes.3rdwavemedia.com" target="_blank">Naufal Eza</a> for developers</small>
								
							</div>
						</footer><!--//app-footer-->
						
					</div><!--//app-wrapper-->    					
					
					
					<!-- Javascript -->          
					<script src="{{asset('assets/backend/plugins/popper.min.js')}}"></script>
					<script src="{{asset('assets/backend/plugins/bootstrap/js/bootstrap.min.js')}}"></script>  
					
					<!-- Charts JS -->
					<script src="{{asset('assets/backend/plugins/chart.js/chart.min.js')}}"></script> 
					<script src="{{asset('assets/backend/js/index-charts.js')}}"></script> 
					
					<!-- Page Specific JS -->
					<script src="{{asset('assets/backend/js/app.js')}}"></script> 
					
				</body>
				</html>