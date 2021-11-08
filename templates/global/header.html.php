<!-- start header -->
<header class="header-with-topbar">
<div class="top-bar bg-extra-dark-gray navbar-light d-md-block">
    <div class="container-lg nav-header-container">
        <div class="d-flex flex-wrap align-items-center">
            <div class="col-12 col-md-3 header-social-icon d-none d-md-inline-block mr-auto pl-lg-0 border-0">
                <a href="http://www.facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="http://www.dribbble.com" target="_blank"><i class="fab fa-dribbble"></i></a>
                <a href="http://www.twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
                <a href="http://www.instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
            </div>
            <div class="col-12 col-md-6 text-center px-md-0 sm-padding-5px-tb line-height-normal">
                <span class="alt-font text-extra-small d-inline-block text-uppercase">주요 공지사항난</span>
            </div>
            <div class="col-12 col-md-3 text-right d-md-inline-block pr-0">

            <?php if ($logged_in): ?>
			    <a href="/user/logout" class="alt-font text-extra-small d-inline-block text-uppercase">로그아웃</a>
                <?php if ($logged_in && $user->level == 1): ?>
                | <a href="/admin/dashboard" class="alt-font text-extra-small d-inline-block text-uppercase">ADMIN</a>
                <?php endif; ?>
            <?php else: ?>
                <a href="/user/register" class="alt-font text-extra-small d-inline-block text-uppercase">회원가입</a>  | 
                <a href="/user/login" class="alt-font text-extra-small d-inline-block text-uppercase">로그인</a>
			<?php endif; ?>

                <div class="header-search-icon search-form-wrapper">
                    <a href="javascript:void(0)" class="search-form-icon header-search-form"><i class="feather icon-feather-search"></i></a>
                    <!-- start search input -->
                    <div class="form-wrapper">
                        <button title="Close" type="button" class="search-close alt-font">×</button>
                        <form id="search-form" role="search" method="get" class="search-form text-left" action="search-result.html">
                            <div class="search-form-box">
                                <span class="search-label alt-font text-small text-uppercase text-medium-gray">What are you looking for?</span>
                                <input class="search-input alt-font" id="search-form-input5e219ef164995" placeholder="Enter your keywords..." name="s" value="" type="text" autocomplete="off">
                                <button type="submit" class="search-button">
                                    <i class="feather icon-feather-search" aria-hidden="true"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <!-- end search input -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- start navigation -->
<nav class="navbar navbar-expand-lg top-space navbar-light bg-white header-light fixed-top menu-logo-center">
    <div class="container-lg nav-header-container">
        <div class="col-6 px-lg-0 menu-logo">
            <a class="navbar-brand" href="/">
                <img src="/images/logo-black.png" data-at2x="/images/logo-black@2x.png" class="default-logo" style='padding-top:7px;padding-bottom:10px' alt="">
                <img src="/images/logo-black.png" data-at2x="/images/logo-black@2x.png" class="alt-logo" alt="">
                <img src="/images/logo-black.png" data-at2x="/images/logo-black@2x.png" class="mobile-logo" alt="">
            </a>
        </div>
        <div class="col-auto col-lg-12 px-lg-0 menu-order">
            <button class="navbar-toggler float-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-label="Toggle navigation">
                <span class="navbar-toggler-line"></span>
                <span class="navbar-toggler-line"></span>
                <span class="navbar-toggler-line"></span>
                <span class="navbar-toggler-line"></span>
            </button>
            <div class=" collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="navbar-nav alt-font navbar-left justify-content-end">
                    <li class="nav-item dropdown simple-dropdown">
                        <a href="/greeting" class="nav-link">센터소개</a>
                        <i class="fa fa-angle-down dropdown-toggle" data-toggle="dropdown" aria-hidden="true"></i>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/greeting">인사말</a></li>
                            <li><a href="/intro">소개</a></li>
                            <li><a href="/address">위치&연락처</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown simple-dropdown">
                        <a href="/platform" class="nav-link">지역 문제 해결 플랫폼</a>
                        <i class="fa fa-angle-down dropdown-toggle" data-toggle="dropdown" aria-hidden="true"></i>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/platform">소개</a></li>
                            <li><a href="/board/agenda/list?group_no=2">의제</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown simple-dropdown">
                        <a href="/promote" class="nav-link">사회적기업가 육성사업</a>
					<i class="fa fa-angle-down dropdown-toggle" data-toggle="dropdown" aria-hidden="true"></i>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/promote">소개</a></li>
                            <li><a href="/board/agenda/list?group_no=3">의제</a></li>
                        </ul>
                    </li>
                    
                </ul>
                <ul class="navbar-nav alt-font navbar-right justify-content-start">
                	<li class="nav-item dropdown simple-dropdown">
                        <a href="/board/list?board_id=notice" class="nav-link">아카이브</a>
                        <i class="fa fa-angle-down dropdown-toggle" data-toggle="dropdown" aria-hidden="true"></i>
                        <ul class="dropdown-menu" role="menu">
                            <?php foreach($archive_menus as $menu):?>
                            <li> <a href="/board/list?board_id=<?=$menu->board_id?>"><?=$menu->board_name?></a></li>
                            <?php endforeach?>
                        </ul>
                    </li>
                	<li class="nav-item dropdown simple-dropdown">
                        <a href="/board/list?board_id=notice" class="nav-link">소통공간</a>
                        <i class="fa fa-angle-down dropdown-toggle" data-toggle="dropdown" aria-hidden="true"></i>
                        <ul class="dropdown-menu" role="menu">
                        <?php foreach($communication_menus as $menu): ?>
                        <li> <a href="/board/list?board_id=<?=$menu->board_id?>"><?=$menu->board_name?></a></li>
                        <?php endforeach?>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.ihappynanum.com/Nanum/B/JYMN0II76R" class="nav-link" target='_blank'>후원하기</a>
                    </li>
                    <li class="nav-item dropdown simple-dropdown">
                        <a href="/rent" class="nav-link">대관신청</a>
                        <i class="fa fa-angle-down dropdown-toggle" data-toggle="dropdown" aria-hidden="true"></i>
                        <ul class="dropdown-menu" role="menu">
                            <li class="dropdown"><a href="/rent">시설안내</a></li>
                            <li class="dropdown"><a href="/calendar">대관 신청</a></li>
                            <li class="dropdown"><a href="blog-classic.html">Blog classic</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- end navigation -->
</header>
<!-- end header -->