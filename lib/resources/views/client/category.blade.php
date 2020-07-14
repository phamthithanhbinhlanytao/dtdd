@extends('client.main')

@section('titleclient','Loại sản phẩm')

@section('mainclient')	
	<link rel="stylesheet" href="css/category.css">
	

					<div id="wrap-inner">
						<div class="products">
							<h3>{{$cateName->cate_name}}</h3>
							<div class="product-list row">
								@foreach($item as $fea)
								<div class="product-item col-md-3 col-sm-6 col-xs-12">
									<a href="#"><img src="{{asset('lib/storage/app/avatar/'.$fea->prod_img)}}" class="img-thumbnail" height="300px"></a>
									<p><a href="#">{{$fea->prod_name}}</a></p>
									<p class="price">{{number_format($fea->prod_price,0,',','.')}}</p>	  
									<div class="marsk">
										<a href="{{asset('detail/'.$fea->prod_id.'/'.$fea->prod_slug.'.html')}}">Xem chi tiết</a>
									</div>                                    
								</div>
								@endforeach
								
							</div>                	                	
						</div>
<p align="center">-----------------------------------------------------------</p>
						<div id="row text-center">
							<div class="col-md-12">
							
							{{$item->links()}}
						</div>
					</div>
				</div>
@stop