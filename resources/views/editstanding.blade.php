@extends('layout.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Klasemen</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Klasemen</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Form Edit Klasemen</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        
                        <form action="{{ route('admin.standing.update', ['tournament' => $standing->tournament_id, 'standing' => $standing->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="team_name">Nama Tim:</label>
                                    <input type="text" name="team_name" id="team_name" class="form-control" value="{{ $standing->team->name }}" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="win">Menang:</label>
                                    <input type="number" name="win" id="win" class="form-control" value="{{ $standing->win }}">
                                </div>

                                <div class="form-group">
                                    <label for="lose">Kalah:</label>
                                    <input type="number" name="lose" id="lose" class="form-control" value="{{ $standing->lose }}">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
