@extends('master')
@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Tin tức</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="./">Home</a> / <span>Tin tức</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content">
			<h2 class="text-center wow fadeInDownwow fadeInDown"></h2>
			<div class="space20">&nbsp;</div>
			<h5 class="text-center other-title wow fadeInLeft"></h5>
			<p class="text-center wow fadeInRight"></p>
			<div class="space20">&nbsp;</div>
			<div class="row">
				@foreach($tintuc as $tt)
				<div class="col-sm-6 wow fadeInRight">
					<div class="beta-person media ">
					
						<img width="100%" height="200px" class="pull-left" src="upload/tintuc/{{$tt->image}}" alt="">
					
						<div class="media-body beta-person-body">
							<h5>Mike Greenwood</h5>
							<p class="font-large">{!!$tt->title!!}</p>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection