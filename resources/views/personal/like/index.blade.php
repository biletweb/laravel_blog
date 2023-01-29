@extends('personal.layouts.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 align-items-center">
                    <div class="col-sm-6"><h1 class="m-0">Понравившиеся</h1></div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('personal.main.index') }}">Главная</a></li>
                            <li class="breadcrumb-item active">Понравившиеся</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @include('personal.include.result_messages')
                        @if($posts->count() > 0)
                            <div class="card">
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                        <tr>
                                            <th style="width:100%">Пост</th>
                                            <th colspan="2" class="text-center">Действия</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($posts as $post)
                                            <tr>
                                                <td>{{ $post->title }}</td>
                                                <td style="width:50px" class="text-center"><a href="{{ route('main.post', $post->id) }}" class="text-primary" title="Просмотр"><i class="fas fa-eye"></i></a></td>
                                                <td style="width:50px" class="text-center">
                                                    <form action="{{ route('personal.like.destroy', $post->id) }}" method="post">
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
