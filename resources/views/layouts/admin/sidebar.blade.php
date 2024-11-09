<div class="sidebar sidebar-main">
    <div class="sidebar-content">

        <!-- User menu -->

        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">

                    <!-- Main -->
                    <li class="navigation-header"><span>Əsas</span> <i class="icon-menu" title="Main pages"></i></li>
                    <li class="{{Request::segment(2)==='dashboard' ? 'active' : ''}}"><a href="{{route('admin.dashboard')}}"><i class="icon-home4"></i>
                            <span>Əsas Səhifə</span></a></li>
                    <li class="{{Request::segment(2)==='lang' ? 'active' : ''}}"><a href="{{route('admin.lang.index')}}"><i class="fa fa-sign-language"></i>
                            <span>Dillər</span></a></li>
                    <li class="{{Request::segment(2)==='translate' ? 'active' : ''}}"><a
                            href="{{route('admin.translate.index')}}"><i class="fa fa-language"></i>
                            <span>Tərcümə</span></a></li>
                    <li class="{{Request::segment(2)==='chefs' ? 'active' : ''}}"><a
                            href="{{route('admin.chefs.index')}}"><i class="fa fa-language"></i>
                            <span>Chefs</span></a></li>
                    <li class="{{Request::segment(2)==='services' ? 'active' : ''}}"><a
                            href="{{route('admin.services.index')}}"><i class="icon-wrench3"></i>
                            <span>Xidmətlər</span></a></li>
                    <li class="{{Request::segment(2)==='about' ? 'active' : ''}}"><a
                            href="{{route('admin.about.index')}}"><i class="fa fa-info"></i>
                            <span>Haqqımızda</span></a></li>
                    <!-- /main -->

                    <!-- Forms -->
                    <!-- /forms -->

                    <!-- Appearance -->

                    <!-- /appearance -->

                    <!-- Layout -->

                    <!-- /layout -->

                    <!-- Data visualization -->

                    <!-- /data visualization -->

                    <!-- Extensions -->

                    <!-- /extensions -->

                    <!-- Tables -->
                    <!-- /tables -->

                    <!-- Page kits -->
                    <!-- /page kits -->

                </ul>
            </div>
        </div>
        <!-- /main navigation -->

    </div>
</div>