<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-header">МЕНЮ</li>
                <li class="nav-item"><a href="{{ route('admin.main.index') }}" class="nav-link"><i class="nav-icon fas fa-home"></i><p>Главная</p></a></li>
                <li class="nav-item"><a href="{{ route('admin.post.index') }}" class="nav-link"><i class="nav-icon fas fa-paste"></i><p>Посты</p></a></li>
                <li class="nav-item"><a href="{{ route('admin.category.index') }}" class="nav-link"><i class="nav-icon fas fa-list"></i><p>Категории</p></a></li>
                <li class="nav-item"><a href="{{ route('admin.tag.index') }}" class="nav-link"><i class="nav-icon fas fa-tags"></i><p>Теги</p></a></li>
                <li class="nav-item"><a href="{{ route('admin.user.index') }}" class="nav-link"><i class="nav-icon fas fa-users"></i><p>Пользователи</p></a></li>
            </ul>
        </nav>
    </div>
</aside>
