@extends($data->layout)

@section('title')
    {{ $data->title }}
@endsection

@section($data->content)
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{ $data->title }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Trang Quản Trị</a></li>
                        <li class="breadcrumb-item active">{{ $data->title }}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    @php
    $seeding = $data['seeding'];
    @endphp

    <!-- Main content -->
    <section class="content">

        @include('backend.includes.search-form')

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Trạng thái seeding</h3>
            </div>
            <div class="card-body">
                <input class="switch_element_ajax" type="checkbox" name="is_product_sale" @if ($data['status'] == 1) checked @endif data-bootstrap-switch
                data-on-text="Bật" data-off-text="Tắt" data-off-color="danger" data-on-color="success" data-url="{{ route('seeding_fb_comments_change_status') }}">
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ $data->title }}</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 1%">
                                STT
                            </th>
                            <th>
                                Hình Đại Diện
                            </th>
                            <th>
                                Tên Seeding
                            </th>
                            <th style="width: 20%">
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($seeding as $key => $item)
                            @php
                            $image = $item->image ?? asset('assets/admin/dist/img/no_image.png');
                            @endphp
                            <tr>
                                <td> {{ $key + 1 }} </td>
                                <td> <img style="width:85px; margin: 0 auto" src="{{ $image }}"> </td>
                                <td>
                                    <a href="{{ route('seeding-fb-comments.edit', $item->id) }}"> {{ $item->name }} </a>
                                </td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-primary btn-sm hide"
                                        href="{{ route('seeding-fb-comments.show', $item->id) }}">
                                        <i class="fas fa-folder"></i> Xem
                                    </a>
                                    <a class="btn btn-info btn-sm"
                                        href="{{ route('seeding-fb-comments.edit', $item->id) }}">
                                        <i class="fas fa-pencil-alt"></i> Sửa
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm deleteItemModal" data-toggle="modal"
                                        data-target="#modal-danger-delete" data-id="{{ $item->id }}"
                                        data-url="admin/seeding-fb-comments/{{ $item->id }}">
                                        <i class="fas fa-trash"></i> Xóa
                                    </button>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <nav aria-label="Contacts Page Navigation">
                    <ul class="pagination justify-content-center m-0">
                        {{ $seeding->appends(request()->query())->links() }}
                    </ul>
                </nav>
            </div>
            <!-- /.card-footer -->

        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
