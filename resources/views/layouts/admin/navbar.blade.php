<div class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{route('admin.dashboard')}}">Admin Panel</a>
        <ul class="nav navbar-nav visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
    </div>
    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav">
            <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-globe"></i>
                </a>
            </li>
            <li class="dropdown dropdown-user">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <img src="" alt="">
                    <span>{{ Auth::user()->name}}</span>
                    <i class="caret"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="{{route('admin.setting.index')}}"><i class="icon-cog5"></i> Tənzimləmələr</a></li>
                    <li><a href="{{route('admin.role.index')}}"><i class="fa fa-key"></i> İmtiyazlar</a></li>
                    <li><a href="#"><span class="badge bg-teal-400 pull-right">58</span> <i
                                class="icon-comment-discussion"></i> Messages</a></li>
                    <li class="divider"></li>
                    <li><a href="{{route('admin.user.index')}}"><i class="icon-user-plus"></i> İstifadəçi
                            ayarları</a></li>
                    <li><a href="{{route('logout')}}"><i class="icon-switch2"></i> Çıxış</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>