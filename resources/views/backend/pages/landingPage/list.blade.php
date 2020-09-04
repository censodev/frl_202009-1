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
              <li class="breadcrumb-item"><a href="/admin">Trang Quản Trị</a></li>
              <li class="breadcrumb-item active">{{ $data->title }}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    @php
      $landingPages = $data['landingPages'];
    @endphp

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">{{ $data->title }}</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
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
                        Tên LandingPage
                      </th>
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>

                  @foreach($landingPages as $key => $landingPage)
                    <tr>
                      <td> {{ ($key + 1) }} </td>
                      <td>
                        <a href="{{ route('landingPage.edit',$landingPage->id) }}"> {{ $landingPage->title }} </a>
                      </td>
                      <td class="project-actions text-right">
                        <a class="btn btn-primary btn-sm hide" href="{{ route('landingPage.show',$landingPage->id) }}">
                          <i class="fas fa-folder"></i> Xem
                        </a>
                        <a class="btn btn-info btn-sm" href="{{ route('landingPage.edit',$landingPage->id) }}">
                          <i class="fas fa-pencil-alt"></i> Sửa
                        </a>
                        <button type="button" class="btn btn-danger btn-sm deleteItemModal" data-toggle="modal" data-target="#modal-danger-delete" data-id="{{ $landingPage->id }}" data-url="admin/landingPage/{{ $landingPage->id }}">
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
              {{ $landingPages->links() }}
            </ul>
          </nav>
        </div>
        <!-- /.card-footer -->

      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
