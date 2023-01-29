@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 align-items-center">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h1 class="m-0">{{ $category->title }}</h1>
                        <a href="{{ route('admin.category.edit', $category->id) }}" class="text-success ml-2" title="Редактировать"><i class="fas fa-pen"></i></a>
                        <form action="{{ route('admin.category.destroy', $category->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="bg-transparent border-0"><a class="text-danger" title="Удалить"><i class="fas fa-trash"></i></a></button>
                        </form>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Категории</a></li>
                            <li class="breadcrumb-item active">Просмотр категории</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @include('admin.include.result_messages')
                        <div class="card">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <tbody>
                                    <tr>
                                        <td style="width:250px"><b>ID:</b></td>
                                        <td>{{ $category->id }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Название:</b></td>
                                        <td>{{ $category->title }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Дата добавления:</b></td>
                                        <td>{{ $category->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Дата изменения:</b></td>
                                        <td>{{ $category->updated_at }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
