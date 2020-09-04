<div class="row">
	<div class="col-12">
	  <div class="card card-primary">
		<div class="card-header">
		  <h3 class="card-title">Section Gallery</h3>
		  <div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
			  <i class="fas fa-minus"></i></button>
		  </div>
		</div>
		<!-- /.card-header -->
		<div class="card-body">

		  <div class="form-group">
			<label for="title_gallery">Tiêu Đề</label>
			<div class="input-group">
			  <div class="input-group-prepend">
				<span class="input-group-text">@</span>
			  </div>
			  <input type="text" id="title_gallery" name="title_gallery" value="{{ old('title_gallery') }}" class="form-control" placeholder="Tiêu Đề">
			</div>
		  </div>

		  <div class="form-group block-search-appliesto">
			<label for="seo_title">Chọn Gallery <span class="color-red">( Chọn 1 danh sách Gallery sẽ hiển thị ra carousel các hình ảnh trong gallery đó. Chọn nhiều Gallery sẽ hiển thị carouse các Gallery )</span></label><br/>
			<button class="btn btn-info gallery_search" type="button" data-toggle="modal" data-target="#modal-lg-gallery" search="inGallery" is-append="0"><i class="fas fa-search"></i> Tìm kiếm</button>
		  </div>
		  <div class="form-group">
			<ul class="todo-list appliesto-value block-gallery-list" data-widget="todo-list">

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