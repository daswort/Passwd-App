@extends('layouts.master-public')

@section('content')

<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
	<div class="well no-padding">
		{{ Form::open(array('method'=>'POST', 'url'=>'user/login', 'role'=>'form', 'id'=>'login-form', 'class'=>'smart-form client-form')) }}
			<header>{{ Lang::get('misc.sign_in') }}</header>
			<fieldset>
				<section>
					<label class="label">{{ Lang::get('misc.email') }}</label>
					<label class="input @if($errors->has('email')) {{ 'state-error' }} @endif"> 
						<i class="icon-append fa fa-user"></i>
						{{ Form::text('email', '', array('class'=>'invalid')) }}
						<b class="tooltip tooltip-top-right">
							<i class="fa fa-user txt-color-teal"></i> 
							{{ Lang::get('misc.email_plhldr') }}
						</b>
					</label>
					@if($errors->has('email')) 
						<em for="fname" class="invalid">{{ $errors->first('email') }}</em>
					@endif
				</section>
				<section>
					<label class="label">{{ Lang::get('misc.password') }}</label>
					<label class="input @if($errors->has('password')) {{ 'state-error' }} @endif"> 
						<i class="icon-append fa fa-lock"></i>
						{{ Form::password('password', '', array()) }}
						<b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> {{ Lang::get('misc.password_plhldr') }}</b>
					</label>
					@if($errors->has('password')) 
						<em for="fname" class="invalid">{{ $errors->first('password') }}</em>
					@endif
					<div class="note">
						<a href="/user/recover">{{ Lang::get('misc.forgot') }}</a>
					</div>
				</section>
				<section>
					<label class="checkbox">
						<input type="checkbox" name="remember" checked="">
						<i></i>{{ Lang::get('misc.keep_session') }}
					</label>
				</section>
			</fieldset>
			<footer>
				<button type="submit" class="btn btn-primary">
					{{ Lang::get('misc.sign_in_button') }}
				</button>
			</footer>
		{{ Form::close() }}
	</div>
	<h5 class="text-center"> - {{ Lang::get('misc.alt_login') }} -</h5>								
	<ul class="list-inline text-center">
		<li>
			<a href="javascript:void(0);" class="btn btn-primary btn-circle"><i class="fa fa-facebook"></i></a>
		</li>
		<li>
			<a href="javascript:void(0);" class="btn btn-info btn-circle"><i class="fa fa-twitter"></i></a>
		</li>
		<li>
			<a href="javascript:void(0);" class="btn btn-warning btn-circle"><i class="fa fa-linkedin"></i></a>
		</li>
	</ul>
</div>

@stop