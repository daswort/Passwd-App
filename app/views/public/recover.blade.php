@extends('layouts.master-public')

@section('content')

<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
	<div class="well no-padding">
		{{ Form::open(array('method'=>'POST', 'url'=>'user/recover', 'role'=>'form', 'id'=>'recover-form', 'class'=>'smart-form client-form')) }}
			<header>{{ Lang::get('misc.recover_title') }}</header>
			<fieldset>
				<section>
					<label class="label">{{ Lang::get('misc.recover_email_lbl') }}</label>
					<label class="input @if($errors->has('email')) {{ 'state-error' }} @endif"> 
						<i class="icon-append fa fa-envelope"></i>
						{{ Form::text('email', '', array()) }}
						<b class="tooltip tooltip-top-right">
							<i class="fa fa-envelope txt-color-teal"></i> 
							{{ Lang::get('misc.recover_email_plhldr') }}
						</b>
					</label>
					@if($errors->has('email')) 
						<em for="fname" class="invalid">{{ $errors->first('email') }}</em>
					@endif
				</section>
				<section>
					<span class="timeline-seperator text-center text-primary"> 
						<span class="font-sm">{{ Lang::get('misc.recover_or') }}</span> 
					</span>
				</section>
				<section>
					<label class="label">{{ Lang::get('misc.recover_username_lbl') }}</label>
					<label class="input @if($errors->has('username')) {{ 'state-error' }} @endif"> 
						<i class="icon-append fa fa-user"></i>
						{{ Form::text('username', '', array()) }}
						<b class="tooltip tooltip-top-right">
							<i class="fa fa-user txt-color-teal"></i> 
							{{ Lang::get('misc.recover_username_plhldr') }}
						</b> 
					</label>
					@if($errors->has('username')) 
						<em for="fname" class="invalid">{{ $errors->first('username') }}</em>
					@endif
					<div class="note">
						<a href="/user/login">{{ Lang::get('misc.recover_back_to_login') }}</a>
					</div>
				</section>
			</fieldset>
			<footer>
				<button type="submit" class="btn btn-primary">
					<i class="fa fa-refresh"></i> {{ Lang::get('misc.recover_reset_btn') }}
				</button>
			</footer>
		{{ Form::close() }}
	</div>
</div>

@stop