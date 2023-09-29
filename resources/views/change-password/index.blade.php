@extends('layout')
@section('content')
@include('section.header')
<body class="hold-transition skin-blue fixed sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">
		@include('section.navbar')
		@include('section.menubar')
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Main content -->
			<section class="content">
				<!-- Default box -->
				<div class="box" style="display:none;">
					<div class="box-header with-border">
						<h4><b>RESET PASSWORD</b></h4>
						
					</div>
					<div class="box-body">
						<div >
                            {{-- {{}} --}}
							<form method="POST" action="{{route('update-password-yow',auth()->user()->id)}}">
                                @csrf
        
                                <!-- Current Password -->
                                <div class="form-group">
                                    <label for="current_password">{{ __('Current Password') }}</label>
                                    <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required>
                                    @error('current_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
        
                                <!-- New Password -->
                                <div class="form-group">
                                    <label for="password">{{ __('New Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" required>
                                </div>
                                
                                <!-- Confirm New Password -->
                                <div class="form-group">
                                    <label for="password_confirmation">{{ __('Confirm New Password') }}</label>
                                    <input id="password_confirmation" type="password" class="form-control" @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required>
                                    @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
        
                                <div class="form-group mb-0">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Change Password') }}
                                    </button>
                                </div>
                            </form>
						</div>
						
					</div>
					<!-- /.box-body -->
				</div>
                <div id="divLoading" class="container"><img id="loading" height="150" src="{{ asset('public/images/loading_vessel.gif')}}"></div>
				<!-- /.box -->
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->
		 @include('section.footer')
		 {{-- include '../../modal/admin/modal.php'; --}}
         
		<div class="control-sidebar-bg"></div>
	</div>
	<!-- ./wrapper -->
     @include('script')
</body>
@if (session()->has('flash_message'))
<script>
    // Display a Toastr notification
    toastr.danger("{{ session('flash_message') }}");
</script>
@endif

<script>
	$(document).ready(function() {
	fetchtblUser();
});








</script>


@endsection