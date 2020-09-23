<div class="row">
	<div class="col-12">
	  <div class="card card-primary">
		<div class="card-header">
		  <h3 class="card-title">Section Banner</h3>
		  <div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
			  <i class="fas fa-minus"></i></button>
		  </div>
		</div>
		<!-- /.card-header -->
		<div class="card-body">

		  <div class="form-group block-search-appliesto">
			<label for="seo_title">Chọn Banner <span class="color-red">( Chỉ chọn tối đa 4 banner )</span></label><br/>
			<button class="btn btn-info banner_search" type="button" data-toggle="modal" data-target="#modal-lg-banner" search="inbanner" is-append="0"><i class="fas fa-search"></i> Tìm kiếm</button>
		  </div>
		  <div class="form-group">
			<ul class="todo-list appliesto-value block-banner-list" data-widget="todo-list">

			  @if( !empty( $related_banners ) && count( $related_banners ) > 0 )
				@foreach( $related_banners as $banner )
				  @php
					$images = $banner->images ?? asset('assets/admin/dist/img/no_image.png');
				  @endphp
				  <li class="ul-item {{ $banner->id }}">
					  <input type="hidden" name="related_banner[]" value="{{ $banner->id }}">
					  <!-- drag handle -->
					  <span class="handle">
						<i class="fas fa-ellipsis-v"></i>
						<i class="fas fa-ellipsis-v"></i>
					  </span>
					  <img width="40px" height="40px" src="{{ $images }}">
					  <span class="text">
						  <a href="">{{ $banner->name }}</a>
					  </span>
					  <div class="tools">
						  <div class="remove-item__action" itemID="{{ $banner->id }}"><i class="fas fa-trash"></i></div>
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
