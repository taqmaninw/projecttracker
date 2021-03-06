@extends('app')

@section('content')
<div class="container-fluid">
	
       
			<div class="panel panel-default">
				<div class="panel-heading">Login</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
                                        
					<form class="form-horizontal" role="form" method="POST" action="{{ route('postlogin') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">อีเมล์</label>
							<div class="col-md-6">
								<input type="email" class="form-control validate[required,custom[email]]" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">รหัสผ่าน</label>
							<div class="col-md-6">
								<input type="password" class="form-control validate[required]" name="password">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"> จดจำการเข้าสู่ระบบ
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">เข้าสู่ระบบ</button>

								<!--<a class="btn btn-link" href="{{ url('/password/email') }}">ลืมรหัสผ่?</a>-->
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
