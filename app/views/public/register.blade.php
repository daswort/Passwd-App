@extends('layouts.master-public')


@section('content')
	<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
		<div class="well no-padding">
			{{ Form::open(array('method'=>'POST','url'=>'user/register','id'=>'smart-form-register','class'=>'smart-form client-form','novalidate'=>'novalidate')) }}
				<header>Registration is FREE*</header>
				<fieldset>
					<section>
						<label class="input"> 
							<i class="icon-append fa fa-user"></i>
							{{ Form::text('username', '', array('placeholder'=>'')) }}
							<b class="tooltip tooltip-bottom-right">Needed to enter the website</b> 
						</label>
					</section>
					<section>
						<label class="input"> 
							<i class="icon-append fa fa-envelope"></i>
							{{ Form::email('email', '', array('placeholder'=>'')) }}
							<b class="tooltip tooltip-bottom-right">Needed to verify your account</b> 
						</label>
					</section>
					<section>
						<label class="input"> 
							<i class="icon-append fa fa-lock"></i>
							{{ Form::password('password', '', array('id'=>'password','placeholder'=>'')) }}
							<b class="tooltip tooltip-bottom-right">Don't forget your password</b> 
						</label>
					</section>
					<section>
						<label class="input"> 
							<i class="icon-append fa fa-lock"></i>
							{{ Form::password('passwordConfirm', '', array('placeholder'=>'')) }}
							<b class="tooltip tooltip-bottom-right">Don't forget your password</b> 
						</label>
					</section>
				</fieldset>
				<fieldset>
					<div class="row">
						<section class="col col-6">
							<label class="input">
								{{ Form::text('firstname', '', array('placeholder'=>'')) }}
							</label>
						</section>
						<section class="col col-6">
							<label class="input">
								{{ Form::text('lastname', '', array('placeholder'=>'')) }}
							</label>
						</section>
					</div>
					<section>
						<label class="checkbox">
							{{ Form::checkbox('terms', '', array('id'=>'terms')) }}
							<i></i>I agree with the <a href="#" data-toggle="modal" data-target="#myModal"> Terms and Conditions </a>
						</label>
					</section>
				</fieldset>
				<footer>
					<button type="submit" class="btn btn-primary">Register</button>
				</footer>
				<div class="message">
					<i class="fa fa-check"></i>
					<p>Thank you for your registration!</p>
				</div>
			{{ Form::close() }}
		</div>
		<p class="note text-center">*FREE Registration ends on October 2015.</p>
		<h5 class="text-center">- Or sign in using -</h5>
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