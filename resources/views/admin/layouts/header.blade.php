<!-- header start -->
<!-- ** header top postion fixed z-index 1000 ** -->
<header class="header-main" id="header">
    <!-- header sidbar right area -->
    <!-- ** dashboard menu for transfer to admin pages ** -->
    <section class="sidbar-header bg-gray" id="header-sidbar">
        <section class="d-flex justify-content-between flex-md-row-reverse px-2">
            <span id="sidbar-toggle-show" class="d-inline d-md-none pointer"><i class="fas fa-toggle-off"></i></span>
            <span id="sidbar-toggle-hide" class="d-none d-md-inline pointer"><i class="fas fa-toggle-on"></i></span>
            <span><img class="logo" src="{{ hasFileUpload('admin-assets/images/logo.png') }}" alt=""></span>
            <span id="menu-toggle" class="d-md-none"><i class="fas fa-ellipsis-h"></i></span>
        </section>
    </section>
    <!-- header sidbar right area -->

    <!-- header body area -->
    <!-- ** top menu for notifications and comments, search box, screen mode, dropdown admin profile options. ** -->
    <!-- *** header body have a box shadow *** -->
    <section class="body-header" id="header-body">
        <section class="d-flex justify-content-between">
            <!-- haeder body left side -->
            <sectopn>
                <!-- search header area -->
                <span class="me-5">
                    <span id="search-area" class="search-area d-none">
                        <i id="search-area-hide" class="fa fa-times pointer"></i>
                        <input id="search-input" type="text" class="search-input">
                        <i class="fas fa-search pointer"></i>
                    </span>
                    <i id="search-toggle" class="fas fa-search p-1 d-none d-md-inline pointer"></i>
                </span>
                <!-- search header area -->

                <!-- screen mode area -->
                <span id="full-screen" class="pointer p-1 d-none d-md-inline me-5">
                    <i id="screen-compress" class="fas fa-compress d-none"></i>
                    <i id="screen-expand" class="fas fa-expand"></i>
                </span>
                <!-- screen mode area -->
            </sectopn>
            <!-- haeder body left side -->

            <!-- haeder body right side -->
            <!-- profile options and notifications area -->
            <sectopn class="d-flex">
                <!-- notification area -->
                <section id="header-notifications">
                    <span id="header-notification-toggle" data-token="{{ csrf_token() }}" class="ms-2 ms-md-4 position-relative">
                        <span class="pointer">
                            <i class="far fa-bell"></i>
                            @if($notifications->count() !== 0)
                            <sup id="notif-count" class="badge bg-danger">{{$notifications->count()}}</sup>
                            @endif
                        </span>
                        <section id="header-notification" class="heaeder-notification rounded">
                            <section class="d-flex justify-content-between">
                                <span class="px-2">
                                    نوتیفیکیشن ها
                                </span>
                                <span class="px-2">
                                    <span class="badge bg-danger">جدید</span>
                                </span>
                            </section>
                            <ul class="list-group px-0 rounded">
                                @forelse($notifications as $notification)
                                <li class="list-group-item list-group-item-action">
                                    <section class="media">
                                        <section class="media-body">
                                            <p class="notification-text mt-3 text-center">{{$notification['data']['message']}}</p>
                                        </section>
                                    </section>
                                </li>
                                @empty
                                <li class="list-group-item list-group-item-action">
                                    <section class="media">
                                        <section class="media-body">
                                            <small><strong class="d-block text-center">نوتیفیکیشن جدیدی موجود نیست</strong></small>
                                        </section>
                                    </section>
                                </li>
                                @endforelse
                            </ul>
                        </section>
                    </span>
                </section>
                <!-- notification area -->

                <!-- comments area -->
                <section id="header-comments">
                    <span id="header-comment-toggle" class="ms-2 ms-md-4 position-relative">
                        <span class="pointer">
                            <i class="far fa-comment-alt"></i>
                            @if($unseenComments->count() !== 0)
                            <sup class="badge bg-danger">{{$unseenComments->count()}}</sup>
                            @endif
                        </span>
                        <section id="header-comment" class="heaeder-comments rounded">
                            <section class="d-flex justify-content-between">
                                <span class="px-2">
                                    کامنت ها
                                </span>
                                <span class="px-2 d-flex flex-column justify-content-center">
                                    <span class="badge bg-danger">جدید</span>
                                </span>
                            </section>
                            <section class="border-bottom px-3">
                                <input type="text" class="form-control form-control-sm mb-4" placeholder="جستجو...">
                            </section>
                            <section class="header-comment-wrapper">
                                <ul class="list-group px-0 rounded">
                                    @forelse($unseenComments as $unseenComment)
                                    @if($unseenComment->commentable_type == "App\Models\Market\Product")
                                    <a class="text-decoration-none" href="{{ route('admin.market.comment.show', $unseenComment->id) }}">
                                        @else
                                        <a class="text-decoration-none" href="{{ route('admin.content.comment.show', $unseenComment->id) }}">
                                            @endif
                                            <li class="list-group-item list-group-item-action border-0 border-bottom">
                                                <section class="media d-flex">
                                                    <section class="media-left flex-shrink-0" style="display: inline-grid;">
                                                        <img class="align-self-center notification-img" src="{{ hasFileUpload($unseenComment->author->profile_photo_path) }}" alt="{{$unseenComment->author->full_name}}">
                                                    </section>
                                                    <section class="media-body flex-grow-1 pe-1" style="display: inline-grid;">
                                                        <section class="d-flex justify-content-between" style="display: inline-grid;">
                                                            <section style="display: inline-grid;">
                                                                <h5 class="comment-user">{{$unseenComment->author->full_name}}</h5>
                                                                @if($unseenComment->commentable_type == "App\Models\Market\Product")
                                                                <span class="text-truncate d-inline-block mt-n3" style="max-width: 160px;margin-top:-20px">{{$unseenComment->commentable->name}}</span>
                                                                @else
                                                                <span class="text-truncate d-inline-block mt-n3" style="max-width: 160px;margin-top:-20px">{{$unseenComment->commentable->title}}</span>
                                                                @endif
                                                            </section>
                                                            <span class="mt-2"><i class="fas fa-circle text-success comment-user-status"></i></span>
                                                        </section>
                                                    </section>
                                                </section>
                                            </li>
                                        </a>
                                        @empty
                                        @endforelse
                            </section>
                        </section>
                    </span>
                </section>
                <!-- comments area -->

                <!-- user profile area -->
                <section id="profile-header">
                    <span id="header-profile-toggle" class="ms-3 ms-md-5 posiion-relative pointer">
                        <span>
                            <img class="header-avatar" src="{{ hasFileUpload(auth()->user()->profile_photo_path , 'avatar') }}" alt="profile">
                            <span class="header-username position-relative" style="top: -7px">
                                {{ auth()->user()->full_name ?? (auth()->user()->mobile ?? auth()->user()->email)}}

                                @php $userRole = auth()->user()->roles ? auth()->user()->roles()->first() : null; @endphp
                                <p class="position-absolute text-center" style="font-size: 0.57rem;right: -1rem;width: 150%;top: 3px;">
                                    @if($userRole && ($userRole->name == 'super-admin' || $userRole->name == 'admin'))
                                    <i class="fa fa-star text-warning"></i>
                                    @endif
                                    <strong class="text-warning">{{ $userRole->title ?? 'نا مشخص' }}</strong>
                                    @if($userRole && ($userRole->name == 'super-admin' || $userRole->name == 'admin'))
                                    <i class="fa fa-star  text-warning"></i>
                                    @endif
                                </p>
                            </span>
                            <i class="fas fa-angle-down"></i>
                        </span>
                    </span>
                    <section id="header-profile" class="header-profile rounded">
                        <section class="list-group rounded">
                            <a href="{{ route('admin.profile.index', ['user' => auth()->user()]) }}" class="list-group-item list-group-item-action header-profile-link">
                                <i class="fas fa-user"></i>پروفایل
                            </a>
                            <!-- <a href="#" class="list-group-item list-group-item-action header-profile-link">
                                <i class="fas fa-user"></i>کاربر
                            </a> -->
                            <!-- <a href="#" class="list-group-item list-group-item-action header-profile-link">
                                <i class="fas fa-envelope"></i>پیام ها
                            </a> -->
                            <!-- <a href="#" class="list-group-item list-group-item-action header-profile-link">
                                <i class="fas fa-lock"></i>قفل صفحه
                            </a> -->
                            <a href="#" class="list-group-item list-group-item-action header-profile-link">
                                <i class="fas fa-sign-out-alt"></i>خروج
                            </a>
                        </section>
                    </section>
                </section>
                <!-- user profile area -->
            </sectopn>
            <!-- haeder body right side -->

        </section>
    </section>
    <!-- header body area -->
</header>
<!-- header end -->