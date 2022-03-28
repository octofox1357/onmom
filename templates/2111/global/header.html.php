<header class="side-menu-nav bg-smoky-black border-color-white-transparent">
    <div class="left-sidebar-nav sidebar-nav-menu bg-smoky-black border-color-white-transparent padding-2-rem-lr padding-5-rem-tb md-padding-10-rem-top"
        data-sticky_column>
        <div class="side-menu-header text-center">
            <?php if($loggedIn):?>
            <div class="text-right">
                <a href="/user/logout" class='btn btn-very-small btn-gradient-magenta-orange d-table d-lg-inline-block lg-margin-15px-bottom md-margin-auto-lr'>로그아웃</a>
            </div>
            <?php endif;?>
            <div class="navbar-brand">
                <a href="/">
                    <img src="/images/logo.png" data-at2x="/images/logo@2x.png"
                        class="default-logo" alt="">
                    <img src="/images/logo.png" data-at2x="/images/logo@2x.png"
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
                    <li class="menu-list-item"> <a href="/onmom">온몸 소개</a></li>
                    <li class="menu-list-item"><a href="/edu_youtube">온몸 교육거점</a></li>
                    <li class="menu-list-item"> <a href="/cloud">구름공장 페스타</a></li>
                    <!--<li class="menu-list-item"><a href="/post/list?board_id=archive">아카이브</a></li>
                    <li class="menu-list-item"><a href="/post/list?board_id=column">컬럼</a></li>-->
                    <li class="menu-list-item"><a href="/cloud_youtube">구름공장 영상 매거진</a></li>
                </ul>
            </div>
            <!-- end menu -->
            <div
                class="col-12 text-center padding-3-rem-top lg-padding-1-rem-tb lg-no-padding-bottom md-padding-3-rem-tb">
                <div class="footer-holder">
                    <div class="text-center elements-social social-icon-style-02 margin-2-rem-tb">
                        <ul class="small-icon light">
                            <li><a class="blog" href="https://blog.naver.com/0nmom" target="_blank"><i class="fab fa-blogger-b"></i></a></li>
                            <li><a class="instagram" href="https://www.instagram.com/onmom_official/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                            <li><a class="facebook" href="https://www.facebook.com/%EC%98%A8%EB%AA%B8%EB%AC%B8%ED%99%94%EA%B3%B5%EA%B0%84-112009687177488" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a class="youtube" href="https://www.youtube.com/channel/UCY6zUY_bu1l2K4nYpu7kmMQ" target="_blank"><i class="fab fa-youtube"></i></a></li>
                            
 <!--                            
                            <li><a class="twitter" href="http://www.twitter.com" target="_blank"><i
                                        class="fab fa-twitter"></i></a></li>
                            <li><a class="dribbble" href="http://www.dribbble.com" target="_blank"><i
                                        class="fab fa-dribbble"></i></a></li>-->
                        </ul>

                    </div>
                    <div class="text-medium-gray text-extra-small">&copy; 2021 온몸 주식회사</div>
                </div>
            </div>
        </div>

    </div>
</header>