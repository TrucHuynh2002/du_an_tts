<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>@yield('title')</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
 
	<link rel="stylesheet" href="{{asset('css/atlantis.min.css')}}">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="{{asset('css/demo.css')}}">
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">				
				<a href="/" class="logo">
					<img style="width: 100%; height:80px; margin-top: 5px;" src="/img/logo-admin.PNG" alt="logo" class="logo">
				</a>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav  class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">				
				<div  class="container-fluid" style="display:flex;justify-content:end">
					{{-- <div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3">
							<div class="input-group">
								<div style="margin-top: 10px;" class="input-group-prepend">
									<button  type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Tìm kiếm" class="form-control">
							</div>
							
						</form>

					</div> --}}
					<a href="{{route('logout')}}" style="color: white;text-decoration: none; ">Đăng xuất</a>
					

				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		
		<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<a href="{{route('get_profile',['id' => Auth::user()->id_sv])}}">
							<div class="avatar-sm float-left mr-2">
								<img src="{{asset('upload/'.Auth::user()->img)}}" alt="{{Auth::user()->hoten_sv}}" class="avatar-img rounded-circle">
							</div>
							<div class="info">
									<span>
										{{Auth::user()->hoten_sv}}
										{{-- <span class="user-level">{{$get_profile->ten_chucvu}}</span> --}}
									</span>
							</div>
						</a>
					</div>
					<ul class="nav nav-primary">
						@can('get-quantrivien')
							<li class="nav-item active">
								<a data-toggle="collapse" href="#dashboard5" class="collapsed" aria-expanded="false">
									<i class="fas fa-home"></i>
									<p><i class='bx bx-building-house'></i>Công ty</p>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="dashboard5">
									<ul class="nav nav-collapse">
										<li>
											<a href="{{route('qtv.congty.index')}}">
												<span class="sub-item">Danh sách công ty</span>
											</a>
										</li>
										<li>
											<a href="{{route('qtv.congty.create')}}"> 
												<span class="sub-item">Thêm công ty</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
							<li class="nav-item">
								<a data-toggle="collapse" href="#dashboard4" class="collapsed" aria-expanded="false">
									<i class="fas fa-home"></i>
									<p><i class='bx bx-male-female'></i>Chức vụ</p>
									<span class="caret"></span>
								</a>
								<div class="collapse" id="dashboard4">
									<ul class="nav nav-collapse">
										<li>
											<a href="{{route('qtv.chucvu.index')}}">
												<span class="sub-item">Danh sách chức vụ</span>
											</a>
										</li>
										<li>
											<a href="{{route('qtv.chucvu.create')}}">
												<span class="sub-item">Thêm chức vụ</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
						@endcan
						
						@can('get-quantrivien')
						<li class="nav-item">
							<a data-toggle="collapse" href="#dashboard1" class="collapsed" aria-expanded="false">
								<i class="fas fa-home"></i>
								<p><i class='bx bx-bar-chart-alt-2'></i>Đợt</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="dashboard1">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{route('qtv.dotthuctap.index')}}">
											<span class="sub-item">Danh sách đợt</span>
										</a>
									</li>
									{{-- @can('get-quantrivien') --}}
									<li>
										<a href="{{route('qtv.dotthuctap.create')}}">
											<span class="sub-item">Thêm đợt thực tập</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						@endcan
						
						<li class="nav-item">
							<a data-toggle="collapse" href="#dashboard2" class="collapsed" aria-expanded="false">
								<i class="fas fa-home"></i>
								<p><i class='bx bxs-group'></i>Nhóm</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="dashboard2">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{route('nhom.index')}}">
											<span class="sub-item">Danh sách nhóm</span>
										</a>
									</li>
									@can('get-quanli')
									<li>
										<a href="{{route('nhom.create')}}">
											<span class="sub-item">Thêm nhóm</span>
										</a>
									</li>
									@endcan
								</ul>
							</div>
						</li>
						{{-- @endcan --}}
				
						<li class="nav-item">
							<a data-toggle="collapse" href="#dashboard6" class="collapsed" aria-expanded="false">
								<i class="fas fa-home"></i>
								<p><i class='bx bx-user-circle'></i>Thực tập sinh</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="dashboard6">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{route('thuctapsinh.index')}}">
											<span class="sub-item">Danh sách thực tập sinh</span>
										</a>
									</li>
									@can('get-quantrivien')
									<li>
										<a href="{{route('thuctapsinh.create')}}">
											<span class="sub-item">Thêm thực tập sinh</span>
										</a>
									</li>
									@endcan
								</ul>
							</div>
						</li>
				
						@can('get-thuctapsinh')
						<li class="nav-item">
							<a data-toggle="collapse" href="#dashboard3" class="collapsed" aria-expanded="false">
								<i class="fas fa-home"></i>
								<p><i class='bx bx-spreadsheet'></i>Công việc</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="dashboard3">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{route('congviec.index')}}">
											<span class="sub-item">Danh sách công việc</span>
										</a>
									</li>
									@can('get-nhomtruong')
									<li>
										<a href="{{route('congviec.create')}}">
											<span class="sub-item">Thêm công việc</span>
										</a>
									</li>
									<li>						
										<a href="{{route('file.index')}}">
											<span class="sub-item">Nộp bài</span>
										</a>
									</li>
									@endcan
									<li>
										<a href="{{route('detailJob',['id' => Auth::user()->id_sv])}}">
											<span class="sub-item">Công việc của bạn</span>
										</a>
									</li>
									
								</ul>
							</div>
						</li>
						@endcan
						@can('get-quanli')
						<li class="nav-item" style="margin-left: 40px">
							<a href="{{route('qlfile.index')}}">
								<i class='bx bx-notepad'></i> Quản lý file
							</a>
						</li>
						@endcan
						
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->	

		{{-- Start Nội dung --}}
		<!-- <div class="container mt-3">
  
</div> -->
		<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">{{$title}}</h2>
							</div>
							
						</div>
					</div>
				</div>
					@yield('main')
					                                          
 
			</div>
		</div>		
		
		{{-- End nội dung --}}
	</div>

	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
   
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
	<!-- Atlantis JS -->
	<script src="{{asset('js/atlantis.min.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<script>
		$(".select-multiple").select2({
		//   maximumSelectionLength: 2
		});
	</script>
	@stack('scripts')
</body>
</html>