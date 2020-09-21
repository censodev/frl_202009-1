<div class="area-clone-product-cli hide">
    <div class="col-12 col-sm-12 col-md-12 align-items-stretch clone-product-cli">
        <div class="card bg-light">
            <div class="card-header text-muted border-bottom-0">
                Sản Phẩm
            </div>
            <div class="card-body pt-0">
                <div class="row">
                    <input type="hidden" value="" name="item_id[]">
                    <div class="form-group col-md-3">
                        <label for="">Ảnh Minh Họa</label>
                        <div class="input-group">
                            <span class="input-group-btn">
                              <a data-input="thumbnail-color-number" data-preview="holder-color-number" class="lfm-mul btn btn-primary">
                                <i class="fa fa-picture-o"></i> Chọn Ảnh
                              </a>
                            </span>
                            <input id="thumbnail-color-number" class="form-control" type="text" name="color_image[]" value="" required oninvalid="this.setCustomValidity('Vui lòng chọn hình ảnh.')" oninput="setCustomValidity('')">
                        </div>
                        <div id="holder-color-number" class="thumbnail holder-thumbnail text-center">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label>Màu</label>
                        <select class="form-control" name="color[]">
                            <option value="0">Chọn Màu</option>
                            @foreach($data['colors'] as $key => $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Giá bán</label>
                            <input type="text" name="price_buy[]" placeholder="Nhập giá" class="form-control" value="" required oninvalid="this.setCustomValidity('Vui lòng nhập giá.')" oninput="setCustomValidity('')">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Giá khuyến mãi</label>
                            <input type="text" name="price_promotion[]" placeholder="Nhập giá khuyến mãi" class="form-control" value="" required oninvalid="this.setCustomValidity('Vui lòng nhập giá khuyến mãi.')" oninput="setCustomValidity('')">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="text-right">
                    <button class="btn btn-sm btn-danger btn-remove-product" type="button">
                        <i class="fas fa-trash"></i> Xóa
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
