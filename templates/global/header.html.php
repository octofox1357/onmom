<header class="side-menu-nav bg-smoky-black border-color-white-transparent">
    <div class="left-sidebar-nav sidebar-nav-menu bg-smoky-black border-color-white-transparent padding-2-rem-lr padding-5-rem-tb md-padding-10-rem-top"
        data-sticky_column>
        <div class="side-menu-header text-center">
            <?php if($loggedIn):?>
            <div class="text-right">
                <a href="/user/logout">로그아웃</a>
            </div>
            <?php endif;?>
            <div class="navbar-brand">
                <a href="/">
                    <img src="/images/logo-copper-red-white.png" data-at2x="/images/logo-copper-red-white@2x.png"
                        class="default-logo" alt="">
                    <img src="/images/logo-copper-red-black.png" data-at2x="/images/logo-copper-red-black@2x.png"
                        class="mobile-logo" alt="">
                </a>
            </div>
            <div class="side-menu-button">
                <a href="javascript:void(0);" class="nav-icon dark" data-toggle="collapse" data-target="#navbar-menu">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </a>
            </div>
        </div>
        <!-- start menu -->
        <div class="side-menu-header-bottom">
            <div
                class="col-12 margin-10-half-rem-tb lg-margin-5-half-rem-tb md-margin-7-half-rem-tb sm-margin-6-rem-top md-no-margin-tb">
                <ul class="menu-list alt-font">
                    <li class="menu-list-item"> <a href="/">홈</a></li>
                    <li class="menu-list-item"> <a href="javascript:void(0);">소개</a></li>
                    <li class="menu-list-item"><a href="/post/list?board_id=archive">아카이브</a></li>
                    <li class="menu-list-item"><a href="/post/list?board_id=column">컬럼</a></li>
                    <li class="menu-list-item"><a href="/post/list?board_id=video">영상 자료</a></li>
                </ul>
            </div>
            <!-- end menu -->
            <div
                class="col-12 text-center padding-3-rem-top lg-padding-1-rem-tb lg-no-padding-bottom md-padding-3-rem-tb">
                <div class="footer-holder">
                    <div class="text-center elements-social social-icon-style-02 margin-2-rem-tb">
                        <ul class="small-icon light">
                            <li><a class="facebook" href="https://www.facebook.com/" target="_blank"><i
                                        class="fab fa-facebook-f"></i></a></li>
                            <li><a class="instagram" href="http://www.instagram.com" target="_blank"><i
                                        class="fab fa-instagram"></i></a></li>
                            <li><a class="twitter" href="http://www.twitter.com" target="_blank"><i
                                        class="fab fa-twitter"></i></a></li>
                            <li><a class="dribbble" href="http://www.dribbble.com" target="_blank"><i
                                        class="fab fa-dribbble"></i></a></li>
                        </ul>

                    </div>
                    <div class="text-medium-gray text-extra-small">&copy; 2021 LITHO</div>
                </div>
            </div>
        </div>

    </div>
</header>