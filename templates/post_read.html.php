<section class="padding-eleven-lr xl-padding-two-lr lg-no-padding-lr">
    <div calss="container">
        <div class="row">
            <div class="col-12 blog-details-text last-paragraph-no-margin margin-6-rem-bottom">
                <h5 class="alt-font font-weight-500 text-white margin-2-half-rem-bottom"> <?=$post->subject?> </h5>
                <?=$post->content?>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-5 sm-margin-20px-bottom wow animate__fadeIn" style="visibility: visible; animation-name: fadeIn;">
                <span class="alt-font font-weight-600 text-copper-red text-extra-medium text-uppercase d-block letter-spacing-1px"></span>
            </div>
            <div class="col-12 col-md-7 text-md-right wow animate__fadeIn" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeIn;">
                <a class="btn btn-link thin btn-extra-large text-medium-gray" href="/post/write?board_id=<?=$_GET['board_id']?>&post_id=<?=$post->id?>">수정하기</a>
            </div>
        </div>
    </div>
</section>