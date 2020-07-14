@extends('client.main')

@section('titleclient','Trang chủ')

@section('mainclient')	
	<div id="wrap-inner">
						<div class="products">
							<h3>sản phẩm nổi bật</h3>
							<div class="product-list row">
								@foreach($feature as $fea)
								<div class="product-item col-md-3 col-sm-6 col-xs-12">
									<a href="#"><img src="{{asset('lib/storage/app/avatar/'.$fea->prod_img)}}" class="img-thumbnail" height="100px"></a>
									<p><a href="#">{{$fea->prod_name}}</a></p>
									<p class="price">{{number_format($fea->prod_price,0,',','.')}}</p>	  
									<div class="marsk">
										<a href="{{asset('detail/'.$fea->prod_id.'/'.$fea->prod_slug.'.html')}}">Xem chi tiết</a>
									</div>                                    
								</div>
								@endforeach
							</div>                	                	
						</div>

						<div class="products">
							<h3>sản phẩm mới</h3>
							<div class="product-list row">
								@foreach($new as $sp)
								<div class="product-item col-md-3 col-sm-6 col-xs-12">
									<a href="#"><img src="{{asset('lib/storage/app/avatar/'.$sp->prod_img)}}" class="img-thumbnail"></a>
									<p><a href="#">{{$sp->prod_name}}</a></p>
									<p class="price">{{number_format($sp->prod_price,0,',','.')}}</p>	  
									<div class="marsk">
										<a href="{{asset('detail/'.$fea->prod_id.'/'.$fea->prod_slug.'.html')}}">Xem chi tiết</a>
									</div>                      	                        
								</div>
								@endforeach
							</div>    
						</div>
					</div>
					@stop