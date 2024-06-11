
@extends('layout.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Berita</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tambah Berita</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <div class="col-12">
            <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <!-- left column -->
                  <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title">Form Tambah Berita</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      <form>
                        <div class="card-body">
                          <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Photo Berita</label>
                                <input type="file" class="form-control" id="exampleInputEmail1" name="photoberita" style="height: 40px">
                                @error('photo')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Nama Berita</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="judul" placeholder="Enter berita">
                            @error('judul')
                                <small>{{ $message }}</small>
                            @enderror
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">Isi Berita</label>
                              <textarea id="summernote" name="isiberita"></textarea>
                              @error('isiberita')
                                    <small>{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </form>
                    </div>
                    <!-- /.card -->
                  </div>
                  <!--/.col (left) -->
                </div>
            </form>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>

  </div>
  <script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
  </script>
@endsection
