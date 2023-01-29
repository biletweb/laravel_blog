@extends('personal.layouts.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 align-items-center">
                    <div class="col-sm-6"><h1 class="m-0">Комментарии</h1></div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('personal.main.index') }}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('personal.comment.index') }}">Комментарии</a></li>
                            <li class="breadcrumb-item active">Редактирование комментария</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-info">
                            <form class="form-horizontal" action="{{ route('personal.comment.update', $comment->id) }}" method="post">
                                @csrf
                                @method('patch')
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="comment" class="col-sm-2 col-form-label">Комментарий:</label>
                                        <div class="col-sm-10">
                                            <textarea name="comment" id="comment" class="form-control" cols="30" rows="10" placeholder="Введите комментарий">{{ $comment->comment }}</textarea>
                                            @error('comment')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary float-right">Обновить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
