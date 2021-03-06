@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row" style="margin-top:60px;">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading" style="text-align: center;"><b>Iniciar Sesión</b></div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Verifica tus datos!</strong> Encontramos problemas en la verificación.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Correo</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Contraseña</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						{{--<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"> Recordarme
									</label>
								</div>
							</div>
						</div>--}}

						<div class="form-group">
							<div class="col-md-6 col-md-offset-6">
								<button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> Entrar</button>

								{{--<a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Your Password?</a>--}}
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
