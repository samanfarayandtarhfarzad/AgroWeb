<div class="page-sidebar page-sidebar-fixed scroll">
    <!-- START X-NAVIGATION -->
    <ul class="x-navigation">
        <li class="xn-logo">
            <a href="{{ route('admin.dashboard') }}">Control Panel</a>
            <a href="#" class="x-navigation-control"></a>
        </li>
        <li class="xn-profile">
            <a href="#" class="profile-mini">
                <div class="" style="text-align:center;">
                    <img src="{{ URL::to('AgroPersianLogo.ico') }}" alt="AgroPersian" style="width:50%;
                    height:auto;
                    text-align:center;
                    margin-top: 10px;
                    margin-bottom: 10px;">
                </div>
            </a>
            <div class="profile">
                <div class="" style="text-align:center;">
                    <img src="{{ URL::to('AgroPersianLogo.ico') }}" alt="AgroPersian" style="width:50%;
                    height:auto;
                    text-align:center;
                    margin-top: 10px;
                    margin-bottom: 10px;">
                </div>
                <div class="profile-data">
                    <div class="profile-data-name" style="font-size:20px;">{{ Auth::user()->username }}</div>
                    <div class="profile-data-title">{{ Auth::user()->email }}</div>
                </div>
                {{-- <div class="profile-controls">
                    <a href="pages-profile.html" class="profile-control-left"><span class="fa fa-info"></span></a>
                    <a href="pages-messages.html" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                </div> --}}
            </div>
        </li>
        <li class="{{ (Request::route()->getName() == 'admin.dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>
        </li>
        <li class="xn-openable {{ (Request::route()->getName() == 'auth.user-register') ? 'active' : '' }} {{ (Request::route()->getName() == 'admin.user') ? 'active' : '' }}">
            <a href="#"><span class="fa fa-user"></span> <span class="xn-text">User</span></a>
            <ul>
                <li class="{{ (Request::route()->getName() == 'auth.user-register') ? 'active' : '' }}"><a href="{{ route('auth.user-register') }}"><span class="fa fa-plus-square"></span> Add New User</a></li>
                <li class="{{ (Request::route()->getName() == 'admin.user') ? 'active' : '' }}"><a href="{{ route('admin.user') }}"><span class="fa fa-users"></span> Users</a></li>
            </ul>
        </li>
        <li class="{{ (Request::route()->getName() == 'categories') ? 'active' : '' }}">
            <a href="{{ route('categories') }}"><span class="fa fa-list-ul"></span> <span class="xn-text">Category</span></a>
        </li>
        <li class="{{ (Request::route()->getName() == 'subcategories') ? 'active' : '' }}">
            <a href="{{ route('subcategories') }}"><span class="fa fa-list"></span> <span class="xn-text">Sub Category</span></a>
        </li>
        <li class="xn-openable {{ (Request::route()->getName() == 'viewfile') ? 'active' : '' }}">
            <a href="#"><span class="fa fa-folder"></span> <span class="xn-text">Media</span></a>
            <ul>
                <li class="{{ (Request::route()->getName() == 'viewfile') ? 'active' : '' }}"><a href="{{ route('viewfile') }}"><span class="fa fa-film"></span> Media Files</a></li>
            </ul>
        </li>
        <li class="xn-openable">
            <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Pages</span></a>
            <ul>
                <li><a href="pages-gallery.html"><span class="fa fa-image"></span> Gallery</a></li>
                <li><a href="pages-profile.html"><span class="fa fa-user"></span> Profile</a></li>
                <li><a href="pages-address-book.html"><span class="fa fa-users"></span> Address Book</a></li>
                <li class="xn-openable">
                    <a href="#"><span class="fa fa-clock-o"></span> Timeline</a>
                    <ul>
                        <li><a href="pages-timeline.html"><span class="fa fa-align-center"></span> Default</a></li>
                        <li><a href="pages-timeline-simple.html"><span class="fa fa-align-justify"></span> Full
                                Width</a></li>
                    </ul>
                </li>
                <li class="xn-openable">
                    <a href="#"><span class="fa fa-envelope"></span> Mailbox</a>
                    <ul>
                        <li><a href="pages-mailbox-inbox.html"><span class="fa fa-inbox"></span> Inbox</a></li>
                        <li><a href="pages-mailbox-message.html"><span class="fa fa-file-text"></span> Message</a></li>
                        <li><a href="pages-mailbox-compose.html"><span class="fa fa-pencil"></span> Compose</a></li>
                    </ul>
                </li>
                <li><a href="pages-messages.html"><span class="fa fa-comments"></span> Messages</a></li>
                <li><a href="pages-calendar.html"><span class="fa fa-calendar"></span> Calendar</a></li>
                <li><a href="pages-tasks.html"><span class="fa fa-edit"></span> Tasks</a></li>
                <li><a href="pages-content-table.html"><span class="fa fa-columns"></span> Content Table</a></li>
                <li><a href="pages-faq.html"><span class="fa fa-question-circle"></span> FAQ</a></li>
                <li><a href="pages-search.html"><span class="fa fa-search"></span> Search</a></li>
                <li class="xn-openable">
                    <a href="#"><span class="fa fa-file"></span> Blog</a>

                    <ul>
                        <li><a href="pages-blog-list.html"><span class="fa fa-copy"></span> List of Posts</a></li>
                        <li><a href="pages-blog-post.html"><span class="fa fa-file-o"></span>Single Post</a></li>
                    </ul>
                </li>
                <li class="xn-openable">
                    <a href="#"><span class="fa fa-sign-in"></span> Login</a>
                    <ul>
                        <li><a href="pages-login.html">App Login</a></li>
                        <li><a href="pages-login-website.html">Website Login</a></li>
                        <li><a href="pages-login-website-light.html"> Website Login Light</a></li>
                    </ul>
                </li>
                <li class="xn-openable">
                    <a href="#"><span class="fa fa-warning"></span> Error Pages</a>
                    <ul>
                        <li><a href="pages-error-404.html">Error 404 Sample 1</a></li>
                        <li><a href="pages-error-404-2.html">Error 404 Sample 2</a></li>
                        <li><a href="pages-error-500.html"> Error 500</a></li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
    <!-- END X-NAVIGATION -->
</div>
