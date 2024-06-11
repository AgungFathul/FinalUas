@extends('layout.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Klasemen Turnamen: {{ $tournament->nama }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Klasemen Turnamen</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @endif

                <div class="col-12">
                    <div class="mb-3">
                        <a href="{{ route('admin.tour.edit', ['id' => $tournament->id]) }}" class="btn btn-primary"><< Back</a>
                    </div>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Klasemen Turnamen</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Rank</th>
                                        <th>Team</th>
                                        <th>Win</th>
                                        <th>Lose</th>
                                        <th>WR</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($standings as $standing)
                                        <tr>
                                            <td>{{ $standing->ranking }}</td>
                                            <td>{{ $standing->team_name }}</td>
                                            <td>{{ $standing->win }}</td>
                                            <td>{{ $standing->lose }}</td>
                                            <td>{{ $standing->wr }}%</td>
                                            <td>
                                                <a href="{{ route('admin.standing.edit', ['tournament' => $tournament->id, 'standing' => $standing->id]) }}" class="btn btn-primary">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
