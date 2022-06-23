@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Values - Edit</h1>
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
                            <a class="btn btn-dark btn-sm float-right" href="{{ route('values.index') }}"><i
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
                            <form action="{{ route('values.update', $value->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <strong>Name:</strong>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ $value->name }}" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <strong>Category:</strong>
                                            <select class="form-control" name="category_id">
                                                <option>Select Item</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ $category->id == $value->category_id ? 'selected' : '' }}>
                                                        {{ $category->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 text-left">
                                    <button type="submit" class="btn btn-success btn-sm">Submit</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
