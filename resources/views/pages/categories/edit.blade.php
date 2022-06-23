@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Categories - Edit</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a class="btn btn-dark btn-sm float-right" href="{{ route('categories.index') }}"><i
                                    class="fa fa-arrow-left"></i> Back</a>
                        </div>

                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('categories.update', $category->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <strong>Name:</strong>
                                            <input type="text" name="name" value="{{ $category->name }}"
                                                class="form-control" placeholder="">
                                        </div>
                                    </div>

                                    <div class="col-sm-12 text-left">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
