@extends('master')

@section('title', '403 Page')

@section('body')
	<div class="container notify-error">
        <div class="col-md-8 col-md-offset-2 text-center">
            <div class="logo">
                <h1>403</h1>
            </div>
            <p class="lead text-muted">You do not have permission to perform this operation</p>
            <div class="clearfix"></div>
            <div class="col-md-6 col-md-offset-3">
                <form action="index.html">
                    <div class="input-group">
                        <input type="text" placeholder="search ..." class="form-control">
                        <span class="input-group-btn">
			              <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
			            </span>
                    </div>
                </form>
            </div>
            <div class="clearfix"></div>
            <div class="sr-only">
                &nbsp;
            </div>
            <br>
            <div class="col-md-6 col-md-offset-3">
                <div class="btn-group btn-group-justified">
                    <a href="{{ url()->previous() }}" class="btn btn-warning btn-form-user">Return previous page</a>
                    <a href="{{ url('/') }}" class="btn btn-info btn-form-user">Return Home page</a>
                </div>
            </div>
        </div>
        <!-- /.col-md-8 col-offset-2 -->
    </div>
@endsection