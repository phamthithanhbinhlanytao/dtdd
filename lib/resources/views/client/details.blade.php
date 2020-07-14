@extends('client.main')

@section('titleclient','Chi tiết sản phẩm')

@section('mainclient')
<link rel="stylesheet" href="css/details.css">


<div id="wrap-inner">
	<div id="product-info">
		<div class="clearfix"></div>
		<h3>{{$chitiet->prod_name}}</h3>
		<div class="row">
			<div id="product-img" class="col-xs-12 col-sm-12 col-md-3 text-center">
				<img src="{{asset('lib/storage/app/avatar/'.$chitiet->prod_img)}}" height="300px" width="250px">
			</div>
			<div id="product-details" class="col-xs-12 col-sm-12 col-md-9">
				<p>Giá: <span class="price">{{number_format($chitiet->prod_price,0,',','.')}}</span></p>
				<p>Bảo hành: {{$chitiet->prod_warranty}}</p> 
				<p>Phụ kiện: {{$chitiet->prod_accessories}}</p>
				<p>Tình trạng: {{$chitiet->prod_condition}}</p>
				<p>Khuyến mại: {{$chitiet->prod_promotion}}</p>
				<p>Còn hàng: @if($chitiet->prod_status==1)Còn hàng @else hết hàng @endif</p>
				<p class="add-cart text-center"><a href="{{asset('cart/add/'.$chitiet->prod_id)}}">Đặt hàng online</a></p>
			</div>
		</div>							
	</div>
	<div id="product-detail">
		<h3>Chi tiết sản phẩm</h3>
		<p class="text-justify">{!!$chitiet->prod_description!!}</p>
	</div>
	<div id="comment">
		<h3>Bình luận</h3>
		<div class="col-md-9 comment">
			<form method="post">
				<div class="form-group">
					<label for="email">Email:</label>
					<input required type="email" class="form-control" id="email" name="email">
				</div>
				<div class="form-group">
					<label for="name">Tên:</label>
					<input required type="text" class="form-control" id="name" name="name">
				</div>
				<div class="form-group">
					<label for="cm">Bình luận:</label>
					<textarea required rows="10" id="cm" class="form-control" name="content"></textarea>
				</div>
				<div class="form-group text-right">
					<button type="submit" class="btn btn-default">Gửi</button>
				</div>
				{{csrf_field()}}
			</form>
		</div>
	</div>
	<div id="comment-list">
		<ul>
			@foreach($comment as $cmt)
			<li class="com-title">
				{{$cmt->com_name}}
				<br>
				<span>{{$cmt->updated_at}}</span>	
			</li>
			<li class="com-details">
				{{$cmt->com_content}}
				<p align="right"><input class="btn btn-success" type=button value="Trả lời" onClick="alert( 'Bạn muốn trả lời?') "></p>
			
			</li>
@endforeach
		</ul>
		
	</div>
</div>					
	@stop				<!-- end main -->
				