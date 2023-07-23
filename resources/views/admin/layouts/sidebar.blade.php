<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div class="user-profile text-center mt-3">
            <div>
                <img src="{{ asset('admin_assets/images/users/avatar-1.jpg')}}" alt="" class="avatar-md rounded-circle">
            </div>
            <div class="mt-3">
                <h4 class="font-size-16 mb-1">{{ Auth::user()->name }}</h4>
                <span class="text-muted"><i class="ri-record-circle-line align-middle font-size-14 text-success"></i> Online</span>
            </div>
        </div>
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>
                <li>
                    <a href="index.html" class="waves-effect">
                        <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end">3</span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow">Category</a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href={{ route('category.create')}}>Add Category</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
