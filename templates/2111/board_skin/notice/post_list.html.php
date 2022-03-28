<section class="extra-big-section">
    <div class="container">
    <?php if(count($post_list) == 0): ?>
        <h6>게시물이 없습니다.</h6>
    <?php endif?>
    <ul class="list-style-10">
        <?php foreach ($post_list as $post): ?>
        <li class="border-bottom border-color-white-transparent">
            <div class="w-90 lg-w-85 xs-w-80 last-paragraph-no-margin">
                <a href="/post/read?board_id=<?=$_GET['board_id']?>&post_id=<?=$post->id?>">
                <span class="text-white"><?= $post->subject?></span></a>
            </div>
            <div class="font-weight-500 text-extra-medium text-white text-center">
                <?= gmdate("y.m.d", $post->reg_time)?>
            </div>
        </li>
        <?php endforeach; ?>
    </ul>
    <!-- start pagination -->
    <div
        class="col-12 d-flex justify-content-center margin-7-half-rem-top lg-margin-4-rem-top sm-margin-5-rem-top wow animate__fadeIn">
        <ul class="pagination pagination-style-01 text-small font-weight-500 align-items-center">
            <li class="page-item"><a class="page-link" href="#"><i
                        class="feather icon-feather-arrow-left icon-extra-small d-xs-none"></i></a></li>
            <?php
                $num_pages = ceil($total_post/15);
                for ($i = 1; $i <= $num_pages; $i++):
                if ($i == $current_page):
            ?>
            <li class="page-item active"><a class="page-link"
                    href="/post/list?board_id=<?=$_GET['board_id']?>&page=<?=$i?>"><?=$i?></a></li>
            <?php else: ?>
            <li class="page-item"><a class="page-link"
                    href="/post/list?board_id=<?=$_GET['board_id']?>&page=<?=$i?>"><?=$i?></a></li>
            <?php endif; ?>
            <?php endfor; ?>
            <li class="page-item"><a class="page-link" href="#"><i class="feather icon-feather-arrow-right icon-extra-small  d-xs-none"></i></a></li>

        </ul>
    </div>
    <!-- end pagination -->

    <?php if($loggedIn):?>
    <div class="row">
        <div class="col-12 col-md-5 sm-margin-20px-bottom wow animate__fadeIn" style="visibility: visible; animation-name: fadeIn;">
            <span class="alt-font font-weight-600 text-copper-red text-extra-medium text-uppercase d-block letter-spacing-1px"></span>
        </div>
        <div class="col-12 col-md-7 text-md-right wow animate__fadeIn" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeIn;">
            <a class="btn btn-link thin btn-extra-large text-medium-gray" href="/post/write?board_id=<?=$_GET['board_id']?>">글 쓰기</a>
        </div>
    </div>
    <?php endif;?>
    </div>
</section>