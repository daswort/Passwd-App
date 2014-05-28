@extends('layouts.master-public')

@section('content')

<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
	<div class="well no-padding">
		{{ Form::open(array('method'=>'POST', 'route'=>array('password.update', $token), 'role'=>'form', 'id'=>'password-update-form', 'class'=>'smart-form client-form')) }}
			<header>{{ Lang::get('misc.reminder_title') }}</header>
			<fieldset>
				<section>
					<label class="label">{{ Lang::get('misc.reminder_password_lbl') }}</label>
					<label class="input @if($errors->has('password')) {{ 'state-error' }} @endif"> 
						<i class="icon-append fa fa-lock"></i>
						{{ Form::password('password', '', array()) }}
						<b class="tooltip tooltip-top-right">
							<i class="fa fa-envelope txt-color-teal"></i> 
							{{ Lang::get('misc.reminder_password_plhldr') }}
						</b>
					</label>
					@if($errors->has('password')) 
						<em for="fname" class="invalid">{{ $errors->first('password') }}</em>
					@endif
				</section>
				<section>
					<label class="label">{{ Lang::get('misc.reminder_repassword_lbl') }}</label>
					<label class="input @if($errors->has('repassword')) {{ 'state-error' }} @endif"> 
						<i class="icon-append fa fa-retweet"></i>
						{{ Form::password('repassword', '', array()) }}
						<b class="tooltip tooltip-top-right">
							<i class="fa fa-user txt-color-teal"></i> 
							{{ Lang::get('misc.reminder_repassword_plhldr') }}
						</b> 
					</label>
					@if($errors->has('repassword')) 
						<em for="fname" class="invalid">{{ $errors->first('repassword') }}</em>
					@endif
					<div class="note">
						<a href="/user/login">{{ Lang::get('misc.recover_back_to_login') }}</a>
					</div>
				</section>
			</fieldset>
			<footer>
				<button type="submit" class="btn btn-primary">
					<i class="fa fa-refresh"></i> {{ Lang::get('misc.reminder_btn') }}
				</button>
			</footer>
		{{ Form::close() }}
	</div>
</div>

@stop