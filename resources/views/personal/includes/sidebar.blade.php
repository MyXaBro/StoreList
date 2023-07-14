
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <div class="sidebar">
        <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widjet="treeview" role="menu"
            data-accordion="false">
            <li class="nav-item">
                <a href="{{ route('index') }}" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p class="ml-1">
                        Главная
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('list.index') }}" class="nav-link">
                    <i class="nav-icon fa-solid fa-clipboard"></i>
                    <p class="ml-1">
                        Списки
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('tag.index') }}" class="nav-link">
                    <i class="nav-icon fa-solid fa-tags"></i>
                    <p class="ml-1">
                        Теги
                    </p>
                </a>
            </li>
        </ul>
    </div>
</aside>
