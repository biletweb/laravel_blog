@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 align-items-center">
                    <div class="col-sm-6"><h1 class="m-0">Посты</h1></div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                            <li class="breadcrumb-item active">Посты</li>
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
                        <a href="{{ route('admin.post.create') }}" class="btn btn-primary">Добавить</a>
                        @if($posts->count() > 0)
                        <div class="card mt-3">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th style="width:75px" class="text-left">ID</th>
                                        <th style="width:100%">Название</th>
                                        <th colspan="3" class="text-center">Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($posts as $post)
                                        <tr>
                                            <td>{{ $post->id }}</td>
                                            <td><a class="text-dark" href="{{ route('main.post', $post->id) }}">{{ $post->title }}</a></td>
                                            <td style="width:50px" class="text-center"><a href="{{ route('admin.post.show', $post->id) }}" class="text-primary" title="Просмотр"><i class="fas fa-eye"></i></a></td>
                                            <td style="width:50px" class="text-center"><a href="{{ route('admin.post.edit', $post->id) }}" class="text-success" title="Редактировать"><i class="fas fa-pen"></i></a></td>
                                            <td style="width:50px" class="text-center">
                                                <form action="{{ route('admin.post.destroy', $post->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="bg-transparent border-0"><a class="text-danger" title="Удалить"><i class="fas fa-trash"></i></a></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="pagination justify-content-center">{{ $posts->links() }}</div>
                        @else
                            <div class="alert alert-info text-center mt-5" role="alert">
                                Uuups, здесь ничего нет!
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
