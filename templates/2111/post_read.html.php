<section class="padding-eleven-lr xl-padding-two-lr lg-no-padding-lr">
    <div class="container">
        <div class="row">
            <div class="col-12 blog-details-text last-paragraph-no-margin margin-6-rem-bottom text-light-gray">
            	<h6 class="text-light-gray alt-font font-weight-600"><?=$board_metadata->board_name?></h6>
                <h5 class="alt-font font-weight-500 text-white margin-2-half-rem-bottom"><?=$post->subject?></h5>
                <?=$post->content?>
            </div>
        </div>
    </div>
    <?php if($loggedIn):?>
    <div class="row justify-content-center">
        <form action="/post/delete?board_id=<?=$_GET['board_id']?>" method="POST" id="delete_post_form">
            <input type="hidden" name="board_id" value="<?=$_GET['board_id']?>">
            <input type="hidden" name="id" value="<?=$post->id?>">
            <div class="col-12 btn-dual text-center">
                <div id="modal-popup2" class="zoom-anim-dialog col-11 col-xl-3 col-lg-6 col-md-8 col-sm-9 mx-auto bg-white text-center modal-popup-main padding-4-half-rem-all mfp-hide border-radius-6px sm-padding-2-half-rem-lr">
                    <span class="text-extra-dark-gray text-uppercase alt-font text-extra-large font-weight-600 margin-15px-bottom d-block">선택된 해당 포스트를 삭제하시겠습니까?</span>
                    <p>삭제를 진행하시면 되돌릴 수 없습니다.</p>
                    <a class="btn btn-fancy btn-small btn-transparent-light-gray popup-modal-dismiss" href="#">취소</a>
                    <button onclick="delete_post_form_submit();" class="btn btn-fancy btn-small btn-transparent-light-gray" style='margin:0'>삭제하기</button>
                </div>
                <a href="/post/write?board_id=<?=$_GET['board_id']?>&post_id=<?=$post->id?>" class="btn btn-fancy btn-large btn-gradient-magenta-orange btn-box-shadow d-table d-lg-inline-block md-margin-auto-lr btn-round-edge" style='margin:0'>수정</a>
                <a class="btn btn-fancy btn-large btn-gradient-purple-magenta btn-box-shadow d-table d-lg-inline-block md-margin-auto-lr btn-round-edge popup-with-zoom-anim" href="#modal-popup2">삭제하기</a>                        						
                <a href="/post/list?board_id=<?=$_GET['board_id']?>" class="btn btn-fancy btn-large btn-gradient-sky-blue-pink btn-box-shadow d-table d-lg-inline-block md-margin-auto-lr btn-round-edge" style='margin:0'>목록</a>
            </div>
        </form>
    </div>
    <?php endif;?>
</section>

<script>
    function delete_post_form_submit(){
        document.getElementById("delete_post_form").submit();
    }
</script>