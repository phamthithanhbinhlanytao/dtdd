@extends('client.main')

@section('titleclient','Đặt hàng')

@section('mainclient')	
<link rel="stylesheet" href="css/email.css">


<div id="wrap-inner">
	<div id="khach-hang">
		<h3>Thông tin khách hàng</h3>
		<p>
			<span class="info">Email : </span>
			{{$in4['email']}}
		</p>
		<p>
			<span class="info">Khách hàng : </span>
			{{$in4['name']}}
		</p>
		<p>
			<span class="info">Điện thoại: </span>
			{{$in4['phone']}}
		</p>
		<p>
			<span class="info">Địa chỉ: </span>
			{{$in4['add']}}
		</p>
	</div>						
	<div id="hoa-don">
		<h3>Hóa đơn mua hàng</h3>							
		<table class="table-bordered table-responsive">
			<tr class="bold">
				<td width="30%">Tên sản phẩm</td>
				<td width="25%">Giá</td>
				<td width="20%">Số lượng</td>
				<td width="15%">Thành tiền</td>
			</tr>
			@foreach($cart as $c)
			<tr>
				<td>{{$c->name}}</td>
				<td class="price">{{number_format($c->price,0,',','.')}}</td>
				<td>{{$c->qty}}</td>
				<td class="price">{{number_format($c->price*$c->qty,0,',','.')}}</td>
			</tr>
			@endforeach
		
			<tr>
				<td colspan="3">Tổng tiền:</td>
				<td class="total-price">{{$total}}</td>
			</tr>
		</table>
	</div>
	
</div>					
@stop