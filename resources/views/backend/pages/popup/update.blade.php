@extends($data->layout)

@section('title')
  {{ $data->title }}
@endsection

@section('content')
	<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ $data->title }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Trang Quản Trị</a></li>
              <li class="breadcrumb-item active">{{ $data->title }}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    @php
      $popup = $data['popup'];
    @endphp

    <!-- Main content -->
    <section class="content">
      <form role="form" action="{{ route('popup.update',$popup->id) }}" method="POST" enctype="multipart/form-data" accept-charset="utf-8">
        @csrf
        @method('PUT')
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Trường Chính</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                </div>
              </div>
              <div class="card-body">
                <div class="row mt-1rem">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="link">Đường Dẫn</label>
                      <input type="text" id="link" name="link" placeholder="Nhập đường dẫn" class="form-control" value="{{ $popup->link ?? old('link') }}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="link_title">Tiều Đề Đường Dẫn</label>
                      <input type="text" id="link_title" name="link_title" placeholder="Nhập title đường dẫn" class="form-control" value="{{ $popup->link_title ?? old('link_title') }}">
                    </div>
                  </div>
                </div>

                <div id="holder" class="thumbnail text-center">
                  @if( !empty( $popup->images ) )
                    <img src="{{ $popup->images }}" style="height: 5rem;">
                  @endif
                </div>
                <div class="input-group">
                  <span class="input-group-btn">
                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                      <i class="fa fa-picture-o"></i> Chọn Logo Đại Diện
                    </a>
                  </span>
                  <input id="thumbnail" class="form-control" type="text" name="images" value="{{ $popup->images }}" required oninvalid="this.setCustomValidity('Vui lòng chọn logo đại diện.')" oninput="setCustomValidity('')">
                </div>

                <div class="row mt-1rem">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="title_image">Tiêu Đề Hình Ảnh</label>
                      <input type="text" id="title_image" name="title_image" placeholder="Nhập tiêu đề hình ảnh" class="form-control" value="{{ $popup->title_image ?? old('title_image') }}" required oninvalid="this.setCustomValidity('Vui lòng nhập tiêu đề hình ảnh.')" oninput="setCustomValidity('')">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="alt_image">Mô Tả Hình Ảnh</label>
                      <input type="text" id="alt_image" name="alt_image" placeholder="Nhập mô tả hình ảnh" class="form-control" value="{{ $popup->alt_image ?? old('alt_image') }}" required oninvalid="this.setCustomValidity('Vui lòng nhập mô tả hình ảnh.')" oninput="setCustomValidity('')">
                    </div>
                  </div>
                </div>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

        </div>
        <div class="row">
          <div class="card-body text-center">
            <button type="submit" name="save_and_exits" value="1" class="btn btn-success" role="button">
              Lưu Và Thoát
            </button>
            <button type="submit" name="save_and_exits" value="2" class="btn btn-success" role="button">
              Lưu
            </button>
            <a href="{{ route('popup.index') }}" class="btn btn-secondary">Thoát</a>
          </div>
        </div>
      </form>
      <!-- /.form -->
    </section>
    <!-- /.content -->
@endsection
