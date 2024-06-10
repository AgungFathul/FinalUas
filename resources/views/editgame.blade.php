@extends('layout.main')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Game</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Game</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid">
                <div class="col-12">
                <form action="{{ route('admin.game.update', ['id' => $data->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Form Tambah Game</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form>
                                    <div class="card-body">
                                        @if ($data->photo)
                                            <img src="{{ asset('storage/photo-game/' . $data->photo) }}" width="100"
                                                height="100px" alt="">
                                        @endif
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Photo Game</label>
                                            <input type="file" class="form-control" id="exampleInputEmail1" name="photogame">
                                            <small>Upload foto jika ingin menggantinya</small>
                                            @error('photogame')
                                                <br>
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Game</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" value="{{ $data->judul }}" name="judul" placeholder="Enter berita">
                                            @error('judul')
                                                <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">platform</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" value="{{ $data->platform }}" name="platform" placeholder="Enter berita">
                                            @error('platform')
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
