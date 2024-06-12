@extends('layout.main')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create FaQ</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Create FaQ</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Create FaQ</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin.faq.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="question">Question:</label>
                                        <input type="text" name="question" id="question" class="form-control" value="{{$faq->question}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="answer">Answer:</label>
                                        <textarea name="answer" id="answer" class="form-control" rows="5" required>{{$faq->answer}}</textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection