@extends('client.main')

@section('titleclient','Tìm kiếm nè')

@section('mainclient')	
	<link rel="stylesheet" href="css/search.css">
					<div id="wrap-inner">
						<div class="products">
							
							
							<h3>Tìm kiếm với từ khóa: <span>{{$tukhoa}}</span></h3>

							<div class="product-list row">
								@foreach($items as $fea)
								<div class="product-item col-md-3 col-sm-6 col-xs-12">
									<a href="#"><img src="{{asset('lib/storage/app/avatar/'.$fea->prod_img)}}" class="img-thumbnail"></a>
									<p><a href="#">{{$fea->prod_name}}</a></p>
									<p class="price">{{number_format($fea->prod_price,0,',','.')}}</p>	  
									<div class="marsk">
										<a href="{{asset('detail/'.$fea->prod_id.'/'.$fea->prod_slug.'.html')}}">Xem chi tiết</a>
									</div>                                    
								</div>
								@endforeach
							</div> 
							
						

					</div>
				</div>

		@stop			