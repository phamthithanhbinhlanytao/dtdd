@extends('client.main')

@section('titleclient','Đặt hàng')

@section('mainclient')
<div id="wrap-inner">
<div id="xac-nhan">
							<h3>Xác nhận mua hàng</h3>
							@if($message = Session::get('success'))
							<div class="alert alert-success alert-block">
								<strong>{{$message}}</strong>
							</div>
							@endif
							<form method="post" action="{{asset('sendemail/send')}}">
								<div class="form-group">
									<label for="email">Email address:</label>
									<input  type="email" class="form-control" id="email" name="email">
								</div>
								<div class="form-group">
									<label for="name">Họ và tên:</label>
									<input  type="text" class="form-control" id="name" name="name">
								</div>
								<div class="form-group">
									<label for="phone">Số điện thoại:</label>
									<input  type="number" class="form-control" id="phone" name="phone" size="10" placeholder="0986766275">
								</div>
								<div class="form-group">
									<label for="add">Địa chỉ:</label>
									<input  type="text" class="form-control" id="add" name="add">
								</div>
								<div class="form-group text-right">
									<input type="submit" name="send" value="Accept" class="btn btn-info">
								</div>
								{{csrf_field()}}
							</form>
						</div>
					</div>
					@stop