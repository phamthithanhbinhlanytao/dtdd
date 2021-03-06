@extends('client.main')

@section('titleclient','Giỏ hàng')

@section('mainclient')
	<link rel="stylesheet" href="css/cart.css">
	<script type="text/javascript">
		function updateCart(qty,rowId){
		$.get(
			'{{asset('cart/update')}}',
			{qty:qty,rowId:rowId},
			function(){
				location.reload();
			}
			);
	}			
	</script>

					<div id="wrap-inner">
						@if(Cart::count()>=1)
						<div id="list-cart">
							<h3>Giỏ hàng</h3>
							
							<form>
								<table class="table table-bordered .table-responsive text-center">
									<tr class="active">
										<td width="11.111%">Ảnh mô tả</td>
										<td width="22.222%">Tên sản phẩm</td>
										<td width="22.222%">Số lượng</td>
										<td width="16.6665%">Đơn giá</td>
										<td width="16.6665%">Thành tiền</td>
										<td width="11.112%">Xóa</td>
									</tr>
									@foreach($cart as $c)
									<tr>
										<td><img src="{{asset('lib/storage/app/avatar/'.$c->options->img)}}"  id="avatar" class="img-responsive" width="200px" alt="ảnh không khả dụng"></td>
										<td>{{$c->name}}</td>
										<td>
											<div class="form-group">
												<input class="form-control" type="number" value="{{$c->qty}}" onchange="updateCart(this.value, '{{$c->rowId}}')" min="1" max="10" >
											</div>
										</td>
										<td><span class="price">{{number_format($c->price,0,',','.')}} đ</span></td>
										<td><span class="price">{{number_format($c->weight*$c->qty,0,',','.')}} đ</span></td>
										<td><a href="{{asset('cart/xoa/'.$c->rowId)}}">Xóa</a></td>
									</tr>
									@endforeach
																</table>
								<div class="row" id="total-price">
									<div class="col-md-6 col-sm-12 col-xs-12">										
											Tổng thanh toán: <span class="total-price">{{$total}} đ</span>
																													
									</div>
									<div class="col-md-6 col-sm-12 col-xs-12">
										<a href="{{asset('/')}}" class="my-btn btn">Mua tiếp</a>
										
										<a href="{{asset('cart/xoa/all')}}" class="my-btn btn">Xóa giỏ hàng</a>
									</div>
								</div>
							</form> 
							         	                	
						</div>

						<div id="xac-nhan">
							<h3>Xác nhận mua hàng</h3>
							<!-- <form action="{{asset('complete')}}"> -->
								<div class="form-group">
									<label for="email">Email address:</label>
									<input required type="email" class="form-control" id="email" name="email">
								</div>
								<div class="form-group">
									<label for="name">Họ và tên:</label>
									<input required type="text" class="form-control" id="name" name="name">
								</div>
								<div class="form-group">
									<label for="phone">Số điện thoại:</label>
									<input required type="number" class="form-control" id="phone" name="phone" size="10" placeholder="0986766275">
								</div>
								<div class="form-group">
									<label for="add">Địa chỉ:</label>
									<input required type="text" class="form-control" id="add" name="add">
								</div>
								<div class="form-group text-right">
									<button type="submit" class="btn btn-default"> <a href="{{asset('complete')}}">Xác nhận đặt hàng</a> </button>
								</div>
								<!-- {{csrf_field()}} -->
							</form>
						</div>
						@else 
							<h2 style="color: red;margin-top:50px; " align="center">Giỏ hàng Trống nhé !</h2>
							@endif   
					</div>

					@stop
	