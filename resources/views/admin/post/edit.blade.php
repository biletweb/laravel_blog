@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 align-items-center">
                    <div class="col-sm-6">
                        <h1 class="m-0">Посты</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.post.index') }}">Посты</a></li>
                            <li class="breadcrumb-item active">Редактирование поста</li>
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
                            <form class="form-horizontal" action="{{ route('admin.post.update', $post->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="title" class="col-sm-2 col-form-label">Название:</label>
                                        <div class="col-sm-5">
                                            <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}" placeholder="Введите название" autofocus>
                                            @error('title')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="summernote" class="col-sm-2 col-form-label">Контент:</label>
                                        <div class="col-sm-10">
                                            <textarea id="summernote" name="content">{{ $post->content }}</textarea>
                                            @error('content')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Превью:</label>
                                        <div class="col-sm-3">
                                            <img src="{{ asset('storage/' . $post->preview_image) }}" class="w-75">
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="inputFile1" name="preview_image">
                                                    <label class="custom-file-label" for="inputFile1">Выберите изображение</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Загрузка</span>
                                                </div>
                                            </div>
                                            @error('preview_image')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Главное:</label>
                                        <div class="col-sm-3">
                                            <img src="{{ asset('storage/' . $post->main_image) }}" class="w-75">
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="inputFile2" name="main_image">
                                                    <label class="custom-file-label" for="inputFile2">Выберите изображение</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Загрузка</span>
                                                </div>
                                            </div>
                                            @error('main_image')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="category" class="col-sm-2 col-form-label">Категория:</label>
                                        <div class="col-sm-5">
                                            <select class="custom-select" id="category" name="category_id">
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? 'selected' : '' }}>{{ $category->title }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tag" class="col-sm-2 col-form-label">Теги:</label>
                                        <div class="col-sm-5">
                                            <select name="tag_id[]" class="select2" id="tag" multiple="multiple" data-placeholder="Выберите теги" style="width: 100%;">
                                                @foreach($tags as $tag)
                                                    <option value="{{ $tag->id }}"
                                                    @foreach($post->tags as $postTags)
                                                        {{ $tag->id == $postTags->id ? 'selected' : '' }}
                                                    @endforeach
                                                    >{{ $tag->title }}</option>
                                                @endforeach
                                            </select>
                                            @error('tag_id')
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
