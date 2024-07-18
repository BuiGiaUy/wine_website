<nav class="side-nav" id="side-menu">
    <a href="" class="intro-x flex items-center pl-5 pt-4 mt-3">
        <img alt="Midone - HTML Admin Template" class="w-6" src="{{asset('backend/dist/images/logo.svg')}}">
        <span class="hidden xl:block text-white text-lg ml-3"> Wine-website </span>
    </a>
    <div class="side-nav__devider my-6"></div>
    <ul>
        <li>
            <a href="/admin/home" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                <div class="side-menu__title"> Dashboard </div>
            </a>
        </li>
        <li>
            <a href="javascript:;" id="category-menu" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="database"></i> </div>
                <div class="side-menu__title">
                    Category
                    <div class="side-menu__sub-icon transform rotate-180"> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="">
                <li>
                    <a href="/admin/category/post" class="side-menu ">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Categories Post </div>
                    </a>
                </li>
                <li>
                    <a href="/admin/category/product" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Categories Product </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="/admin/post" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="file-text"></i> </div>
                <div class="side-menu__title"> Post </div>
            </a>
        </li>
        <li>
            <a href="/admin/product" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="calendar"></i> </div>
                <div class="side-menu__title"> Product </div>
            </a>
        </li>
        <li class="side-nav__devider my-6"></li>
        <li>
            <a href="/admin/users" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="users"></i> </div>
                <div class="side-menu__title"> Users </div>
            </a>
        </li>
        <li>
            <a href="/admin/brand" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="layout"></i> </div>
                <div class="side-menu__title"> Brand </div>
            </a>
        </li>
        <li>
            <a href="/admin/order" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="layout"></i> </div>
                <div class="side-menu__title"> Order </div>
            </a>
        </li>
        <li class="side-nav__devider my-6"></li>
    </ul>
</nav>
