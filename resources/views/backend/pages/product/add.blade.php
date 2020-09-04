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

    <?php
        $material           = $data['materials'];
        $color              = $data['colors'];
    ?>

    <section class="content">
        <form role="form" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" accept-charset="utf-8">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Trường SEO</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label for="seo_title">SEO Tiêu Đề <span id="seotitleerror" class="error alert-danger"><span class="change-text">Chuẩn SEO</span> <span id="validatetitleseo"> </span>/60 kí tự</span></label>
                                <input type="text" id="seo_title" name="seo_title" placeholder="Nhập Seo tiêu đề" class="form-control" value="{{ old('seo_title') }}">
                            </div>

                            <div class="form-group">
                                <label for="seo_keyword">SEO Từ Khóa</label>
                                <input type="text" id="seo_keyword" name="seo_keyword" placeholder="Nhập Seo từ khóa" class="form-control" value="{{ old('seo_keyword') }}">
                            </div>

                            <div class="form-group">
                                <label for="seo_desciption">SEO Mô Tả <span id="seodeserror" class="error alert-danger" ><span class="change-text">Chuẩn SEO</span> <span id="validateseomota"></span>/160 kí tự</span></label>
                                <input type="text" id="seo_desciption" name="seo_desciption" placeholder="Nhập Seo mô tả" class="form-control" value="{{ old('seo_desciption') }}">
                            </div>

                            <div class="form-group">
                                <label for="seo_google">Thẻ Tiếp Thị Remarketing</label>
                                <input type="text" id="seo_google" name="seo_google" placeholder="Nhập tiếp thị Google" class="form-control" value="{{ old('seo_google') }}">
                            </div>

                            <div class="form-group">
                                <label for="seo_facebook">Thẻ Pixel Facebook</label>
                                <input type="text" id="seo_facebook" name="seo_facebook" placeholder="Nhập Pixel Facebook" class="form-control" value="{{ old('seo_facebook') }}">
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

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
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="title">Tên Sản Phẩm</label>
                                        <input type="text" id="title" name="title" value="{{ old('title') }}" class="form-control" required placeholder="Nhập tên sản phẩm" oninvalid="this.setCustomValidity('Vui lòng nhập tên bài viết.')" oninput="setCustomValidity('')">
                                        @if( $errors->has('title') )
                                            <div class="alert alert-danger">{{ $errors->first('title') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="alias">Đường Dẫn Thân Thiện</label>
                                        <input type="text" id="alias" name="alias" value="{{ old('alias') }}" class="form-control" required placeholder="Nhập đường dẫn thân thiện" oninvalid="this.setCustomValidity('Vui lòng nhập đường dẫn thân thiện.')" oninput="setCustomValidity('')">
                                        @if( $errors->has('alias') )
                                            <div class="alert alert-danger">{{ $errors->first('alias') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="view">Lượt Xem</label>
                                        <input type="number" id="view" name="view" placeholder="Nhập lượt xem" class="form-control" value="{{ old('view') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="rating">Số Sao Đánh Giá ( Từ 1 -> 5 )</label>
                                        <input type="number" id="rating" name="rating" placeholder="Nhập số sao đánh giá" class="form-control" max="5" value="{{ old('rating') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="bought">Số Người Đã Mua</label>
                                        <input type="text" id="bought" name="bought" placeholder="Nhập số người đã mua" value="{{ old('bought') }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mã Sản Phẩm</label>
                                        <input type="text" id="code" name="code" placeholder="Nhập mã code" value="{{ old('code') }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="category_id">Chọn Danh Mục ( Sản Phẩm )</label>
                                        <select class="form-control custom-select" multiple="multiple" name="category_id[]" oninvalid="this.setCustomValidity('Vui lòng chọn danh mục cha.')" oninput="setCustomValidity('')">
                                            <option disabled>--- Chọn Danh Mục ---</option>
                                            @php
                                                $level = 0;
                                                $category_level = $data['category_level']->toArray();
                                                showListCategory($category_level,$level, []);
                                            @endphp
                                        </select>
                                        @if( $errors->has('category_id') )
                                            <div class="alert alert-danger">{{ $errors->first('category_id') }}</div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="card card-solid">
                                <div class="card-header">
                                    <h3 class="card-title">Hình Ảnh</h3>
                                </div>
                                <div class="card-body pb-0">
                                    <div class="row d-flex align-items-stretch increment-thumbnail">
                                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                                            <div class="card bg-light">
                                                <div class="card-header text-muted border-bottom-0">
                                                    Hình Ảnh
                                                </div>
                                                <div class="card-body pt-0">
                                                    <div class="form-group">
                                                        <div id="holder" class="thumbnail text-center"></div>
                                                        <div class="input-group">
                                                        <span class="input-group-btn">
                                                          <a data-input="thumbnail" data-preview="holder" class="lfm-mul btn btn-primary">
                                                            <i class="fa fa-picture-o"></i> Chọn Ảnh
                                                          </a>
                                                        </span>
                                                            <input id="thumbnail" class="form-control" type="text" name="images[]" required oninvalid="this.setCustomValidity('Vui lòng chọn hình ảnh.')" oninput="setCustomValidity('')">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="title_image">Tiêu Đề Hình Ảnh</label>
                                                        <input type="text" id="title_image" name="title_image[]" placeholder="Nhập tiêu đề hình ảnh" class="form-control" value="" required oninvalid="this.setCustomValidity('Vui lòng nhập tiêu đề.')" oninput="setCustomValidity('')">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="alt_image">Mô Tả Hình Ảnh</label>
                                                        <input type="text" id="alt_image" name="alt_image[]" placeholder="Nhập mô tả hình ảnh" class="form-control" value="" required oninvalid="this.setCustomValidity('Vui lòng nhập mô tả.')" oninput="setCustomValidity('')">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group text-right">
                                        <button class="btn-clone-thumbnail btn btn-info" type="button"><i class="fas fa-plus"></i> Thêm Ảnh</button>
                                    </div>

                                </div>
                            </div>

                            <div class="card card-solid">
                                <div class="card-header">
                                    <h3 class="card-title">Sản Phẩm</h3>
                                </div>
                                <div class="card-body pb-0">
                                    <div class="row d-flex align-items-stretch increment-product">
                                        <div class="col-12 col-sm-12 col-md-12 align-items-stretch">
                                            <div class="card bg-light">
                                                <div class="card-header text-muted border-bottom-0">
                                                    Sản Phẩm
                                                </div>
                                                <div class="card-body pt-0">
                                                    <div class="row">
                                                        <input type="hidden" value="" name="item_id[]">
                                                        <div class="col-md-4">
                                                            <label>Chất liệu</label>
                                                            <select class="form-control" name="material[]">
                                                                <option value="">Chọn vật liệu</option>
                                                                @foreach($material as $key => $item)
                                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Giá bán</label>
                                                                <input type="text" name="price_buy[]" placeholder="Nhập giá" class="form-control" value="" required oninvalid="this.setCustomValidity('Vui lòng nhập giá.')" oninput="setCustomValidity('')">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label>Giá khuyến mãi</label>
                                                                <input type="text" name="price_promotion[]" placeholder="Nhập giá khuyến mãi" class="form-control" value="" required oninvalid="this.setCustomValidity('Vui lòng nhập giá khuyến mãi.')" oninput="setCustomValidity('')">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group text-right">
                                        <button class="btn-clone-product btn btn-info" type="button"><i class="fas fa-plus"></i> Thêm Sản Phẩm</button>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="short_description">Mô Tả Ngắn</label>
                                        <textarea id="short_description" name="short_description" class="form-control ckeditor-lfm" rows="4"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="sapo">Sapo</label>
                                        <textarea id="sapo" name="sapo" class="form-control" rows="4"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Chi Tiết</label>
                                        <textarea id="description" name="description" class="form-control" rows="4"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>

            <div class="col-md-12">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Trường Liên Quan</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group block-search-appliesto">
                                    <label for="seo_title">Sản Phẩm</label><br/>
                                    <button class="btn btn-info product_search" type="button" data-toggle="modal" data-target="#modal-lg-product" search="inProduct" is-append="0"><i class="fas fa-search"></i> Tìm kiếm</button>
                                </div>
                                <div class="form-group">
                                    <ul class="todo-list appliesto-value block-product-list" data-widget="todo-list">

                                    </ul>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group block-search-appliesto">
                                    <label for="seo_title">Bài Viết</label><br/>
                                    <button class="btn btn-info article_search" type="button" data-toggle="modal" data-target="#modal-lg-article" search="inArticle" is-append="0"><i class="fas fa-search"></i> Tìm kiếm</button>
                                </div>
                                <div class="form-group">
                                    <ul class="todo-list appliesto-value block-article-list" data-widget="todo-list">

                                    </ul>
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
                    <a href="{{ route('product.index') }}" class="btn btn-secondary">Thoát</a>
                </div>
            </div>
        </form>
    </section>
    @include('backend.includes.clone-product-item')
    @include('backend.includes.clone-image')

@endsection
