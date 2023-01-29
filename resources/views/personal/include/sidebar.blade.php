<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-header">МЕНЮ</li>
                <li class="nav-item"><a href="{{ route('personal.main.index') }}" class="nav-link"><i class="nav-icon fas fa-home"></i><p>Главная</p></a></li>
                <li class="nav-item"><a href="{{ route('personal.like.index') }}" class="nav-link"><i class="nav-icon fas fa-thumbs-up"></i><p>Понравившиеся</p></a></li>
                <li class="nav-item"><a href="{{ route('personal.comment.index') }}" class="nav-link"><i class="nav-icon fas fa-comment"></i><p>Комментарии</p></a></li>
            </ul>
        </nav>
    </div>
</aside>
