        <!-- start page title -->
        <section class="quarter-section parallax bg-extra-dark-gray" data-parallax-background-ratio="0.5" style="background-image:url('/images/hero_<?=$board_metadata->board_id?>.jpg');">
            <div class="opacity-medium bg-extra-dark-gray"></div>
            <div class="container">
                <div class="row align-items-stretch justify-content-center small-screen">
                    <div class="col-12 col-xl-6 col-lg-7 col-md-8 page-title-extra-small text-center d-flex justify-content-center flex-column">
                        <h1 class="alt-font text-white opacity-6 margin-20px-bottom">구름공장</h1>
                        <h2 class="text-white alt-font font-weight-500 letter-spacing-minus-1px line-height-50 sm-line-height-45 xs-line-height-30 no-margin-bottom"><?=$board_metadata->board_name?></h2>
                    </div>
                    <div class="down-section text-center"><a href="#blog" class="section-link"><i class="ti-arrow-down icon-extra-small text-white bg-transparent-black padding-15px-all xs-padding-10px-all border-radius-100"></i></a></div>
                </div>
            </div>
        </section>
        <!-- end page title -->
        
	<section class="padding-eleven-lr pt-0 xl-padding-two-lr xs-no-padding-lr" id='blog'>
		<div class="container-fluid">
			<?php if(count($post_list)== 0): ?>
				<div class="container">
					<div class="row justify-content-center align-items-center" style='padding:70px'>
						<!-- start blockquote item -->
						<div class="col-12 col-sm-2 col-lg-1 text-sm-right xs-margin-10px-bottom wow animate__fadeIn" data-wow-delay="0.2s">
							<i class="fas fa-quote-left text-gradient-orange-pink icon-extra-medium margin-30px-right"></i>
						</div>
						<div class="border-left border-width-1px border-color-medium-white-transparent xs-border-none wow animate__fadeIn" data-wow-delay="0.4s">
							<h6 class="text-white margin-30px-left mb-0 line-height-40px xs-no-margin-left xs-line-height-30px">게시물이 없습니다.</h6>
						</div>
						<!-- end blockquote item -->
					</div>
				</div>
			<?php endif;?>
				<div class="row">
					<div class="col-12 blog-content sm-no-padding-lr">
						<ul class="blog-classic blog-wrapper grid grid-loading grid-5col xl-grid-4col lg-grid-3col md-grid-2col sm-grid-2col xs-grid-1col gutter-double-extra-large">
				              <li class="grid-sizer"></li>
				              <?php foreach ($post_list as $post): ?>
							<!-- start blog item -->
							<li class="grid-item wow animate__fadeIn">
								<div class="blog-post">
									<div class="blog-post-image">
										<a href="/post/read?board_id=<?=$_GET['board_id']?>&post_id=<?=$post->id?>">
										<img style="width: 225px; height:150px; object-fit: cover;" src=<?= $post->main_image ? '/attached_files/'.$post->main_image : 'https://via.placeholder.com/800x560' ?> alt=""/>
										</a>
									</div>
									<div class="post-details margin-30px-bottom md-margin-10px-bottom xs-no-margin-bottom">
										<a href="/post/read?board_id=<?=$_GET['board_id']?>&post_id=<?=$post->id?>" class="alt-font font-weight-500 text-extra-medium text-light-gray d-block"><?= $post->subject?></a>
										<p class="w-95"><?=$post->lib_kstrcut(20)?>...<br />
											[<?= gmdate("y.m.d", $post->reg_time)?>]</p>
										<span class="separator bg-gradient-magenta-orange"></span>
										<a href="/post/read?board_id=<?=$_GET['board_id']?>&post_id=<?=$post->id?>" class="alt-font font-weight-500 text-extra-small text-uppercase text-gradient-magenta-orange">Continue reading</a>
									</div>
								</div>
							</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
		</div>
	</section>
        <!-- end section -->  

    <!-- start pagination -->
    <?php if(count($post_list)!= 0): ?>
    <section class="padding-eleven-lr pt-0 xl-padding-two-lr xs-no-padding-lr">
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
  </section>
  <?php endif;?>
    <!-- end pagination -->

	<?php if($loggedIn):?>
		<section class="padding-eleven-lr pt-0 xl-padding-two-lr xs-no-padding-lr">
			<div class="row">
				<div class="col-12 col-md-5 sm-margin-20px-bottom wow animate__fadeIn" style="visibility: visible; animation-name: fadeIn;">
					<span class="alt-font font-weight-600 text-copper-red text-extra-medium text-uppercase d-block letter-spacing-1px"></span>
				</div>
				<div class="col-12 col-md-7 text-md-right wow animate__fadeIn" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeIn;">
					<a class="btn btn-large btn-gradient-magenta-orange d-table d-lg-inline-block lg-margin-15px-bottom md-margin-auto-lr" href="/post/write?board_id=<?=$_GET['board_id']?>">글 쓰기</a>
				</div>
			</div>
		</section>
    <?php endif;?> 