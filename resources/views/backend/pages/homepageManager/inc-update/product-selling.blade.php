<div class="row">
	<div class="col-12">
	  <div class="card card-primary">
		<div class="card-header">
		  <h3 class="card-title">Sản Phẩm Bán Chạy</h3>
		  <div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
			  <i class="fas fa-minus"></i></button>
		  </div>
		</div>
		<!-- /.card-header -->
		<div class="card-body">

		  <div class="form-group">
			<label for="title_product_selling">Tiêu Đề</label>
			<div class="input-group">
			  <div class="input-group-prepend">
				<span class="input-group-text">@</span>
			  </div>
			  <input type="text" id="title_product_selling" name="title_product_selling" value="{{ $homepageManager->title_product_selling ?? old('title_product_selling') }}" class="form-control" placeholder="Tiêu Đề">
			</div>
		  </div>

		  <div id="holder-product-selling" class="thumbnail holder-thumbnail text-center">
			@if( !empty( $homepageManager->images_product_selling ) )
			  <img src="{{ $homepageManager->images_product_selling }}" style="height: 5rem;">
			@endif
		  </div>
		  <div class="input-group">
			<span class="input-group-btn">
			  <a data-input="thumbnail-product-selling" data-preview="holder-product-selling" class="lfm-mul btn btn-primary">
				<i class="fa fa-picture-o"></i> Ảnh Nền
			  </a>
			</span>
			<input id="thumbnail-product-selling" class="form-control" type="text" name="images_product_selling" value="{{ $homepageManager->images_product_selling }}">
		  </div>

		  <div class="form-group mt-3">
			<label for="content_product_selling">Nội Dung</label>
			<textarea id="content_product_selling" name="content_product_selling" class="form-control ckeditor-lfm" rows="4">{!! $homepageManager->content_product_selling ?? old('content_product_selling') !!}</textarea>
		  </div>
		  
			<div class="form-group block-search-appliesto">
			  <label for="seo_title">Chọn Sản Phẩm ( Những Sản Bán Chạy )</label><br/>
			  <button class="btn btn-info product_search_selling" type="button" data-toggle="modal" data-target="#modal-lg-product-selling" search="inProductSelling" is-append="0"><i class="fas fa-search"></i> Tìm kiếm</button>
			</div>
			<div class="form-group">
			  <ul class="todo-list appliesto-value block-product-selling-list" data-widget="todo-list">

				@if( !empty( $related_products_selling ) && count( $related_products_selling ) > 0 )
				  @foreach( $related_products_selling as $product )
					@php
					  $images = $product->images ?? asset('assets/admin/dist/img/no_image.png');
					@endphp
					<li class="ul-item-product-selling {{ $product->id }}">
						<input type="hidden" name="related_product_selling[]" value="{{ $product->id }}">
						<!-- drag handle -->
						<span class="handle">
						  <i class="fas fa-ellipsis-v"></i>
						  <i class="fas fa-ellipsis-v"></i>
						</span>
						<img width="40px" height="40px" src="{{ $images }}">
						<span class="text">
							<a href="">{{ $product->title }}</a>
						</span>
						<div class="tools">
							<div class="remove-item__action" itemID="{{ $product->id }}"><i class="fas fa-trash"></i></div>
						</div>
					</li>
				  @endforeach
				@endif

			  </ul>
			</div>

		</div>
		<!-- /.card-body -->
	  </div>
	  <!-- /.card -->
	</div>
	<!-- /.col -->
</div>
<!-- /.row -->