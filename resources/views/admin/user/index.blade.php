@extends('admin.layouts.main')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 align-items-center">
                    <div class="col-sm-6"><h1 class="m-0">Пользователи</h1></div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                            <li class="breadcrumb-item active">Пользователи</li>
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
                        <a href="{{ route('admin.user.create') }}" class="btn btn-primary">Добавить</a>
                        @if($users->count() > 0)
                        <div class="card mt-3">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th style="width:75px" class="text-left">ID</th>
                                        <th style="width:100%">Имя</th>
                                        <th>Email</th>
                                        <th>Роль</th>
                                        <th colspan="3" class="text-center">Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->role->title }}</td>
                                            <td style="width:50px" class="text-center"><a href="{{ route('admin.user.show', $user->id) }}" class="text-primary" title="Просмотр"><i class="fas fa-eye"></i></a></td>
                                            <td style="width:50px" class="text-center"><a href="{{ route('admin.user.edit', $user->id) }}" class="text-success" title="Редактировать"><i class="fas fa-pen"></i></a></td>
                                            <td style="width:50px" class="text-center">
                                                <form action="{{ route('admin.user.destroy', $user->id) }}" method="post">
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
                        <div class="pagination justify-content-center">{{ $users->links() }}</div>
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
