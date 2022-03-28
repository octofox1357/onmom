<!-- start section -->
<section class="extra-big-section position-relative wow animate__fadeIn">
    <div class="opacity-extra-medium bg-gradient-peacock-blue-crome-yellow"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-xl-7 col-lg-8 col-md-10 text-center padding-five-tb">
                        <h3 class="alt-font text-white font-weight-600 margin-35px-bottom">온몸 교육거점</h3>
                        <!--<p class="text-white opacity-7 alt-font text-large w-80 mx-auto line-height-32px margin-45px-bottom sm-w-100">Lorem ipsum dolor sit amet, adipiscing elit, sed do eiusmod tempor incididunt ut labore dolore.</p>-->
		                <a href="https://www.youtube.com/channel/UCrulnn2FrZgKvfQvqvzCeGg" target='_blank' class="btn btn-large btn-white btn-rounded btn-box-shadow">유튜브 채널 보기</a>
                    </div>
                </div>
            </div>
            <div class="bg-video-wrapper">
            <iframe src="https://www.youtube.com/embed/G_T_IDMhntA?autoplay=1&loop=1&mute=1&showinfo=0&background=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
           </div>
        </section>
        <!-- end section -->

        <!-- start section -->
        <section class="padding-four-lr no-padding-top lg-padding-two-lr sm-no-padding-lr">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 filter-content">
                    	<ul class="portfolio-classic portfolio-wrapper grid grid-loading grid-4col xl-grid-4col lg-grid-3col md-grid-2col sm-grid-2col xs-grid-1col gutter-extra-large text-center">
                            <li class="grid-sizer"></li>
	                    	<?php foreach ($list as $video): ?>
	                    	<!-- start portfolio item -->
                            <li class="grid-item wow animate__fadeIn">
                                <div class="portfolio-box border-radius-6px box-shadow-large">
                                    <div class="portfolio-image bg-gradient-peacock-blue-crome-yellow">
                                        <img src="<?=$video->snippet->thumbnails->high->url?>" alt="" />
                                        <div class="portfolio-hover align-items-center justify-content-center d-flex h-100">
                                            <div class="portfolio-icon">
                                            	<a href="https://www.youtube.com/watch?v=<?=$video->id->videoId?>" target='_blank' class="text-slate-blue text-slate-blue-hover rounded-circle bg-white"><i class="fas fa-link icon-very-small" aria-hidden="true"></i></a>
                                            	<a href="https://www.youtube.com/watch?v=<?=$video->id->videoId?>" class="popup-youtube video-icon-box video-icon-small"><span class="video-icon bg-white box-shadow-extra-large"><i class="fas fa-search icon-very-small" aria-hidden="true"></i></span></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="portfolio-caption bg-white padding-20px-tb padding-10px-lr">
                                        <a href="https://www.youtube.com/watch?v=<?=$video->id->videoId?>"class="popup-youtube video-icon-box video-icon-small"><span class="alt-font text-extra-dark-gray font-weight-500"><?=$video->snippet->title?></span></a>
                                        <span class="text-medium d-block margin-one-bottom"><?=$video->snippet->description?></span>
                                    </div>
                                </div>
                            </li>
                            <!-- end portfolio item -->
	                    	<?php endforeach; ?>
                    	</ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- end section -->


