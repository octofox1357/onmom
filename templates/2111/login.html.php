<section class="wow animate__fadeIn">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 col-xl-5 col-md-6 lg-padding-30px-lr md-padding-15px-lr sm-margin-40px-bottom">
				<h6 class="alt-font font-weight-500 text-white">로그인</h6>
				<form class="bg-light-gray padding-4-rem-all lg-margin-35px-top md-padding-2-half-rem-all" method="post" action="">
					<?php if (isset($error)):?>
                		<div class="col-12 col-md-12 alert alert-danger fade in show" role="alert">
	                        <button type="button" class="close line-height-unset" data-dismiss="alert" aria-label="Close">
	                            <span aria-hidden="true">&times;</span>
	                        </button><?=$error;?>
	                    </div>
	                <?php endif; ?>
					<label class="margin-15px-bottom">이메일 주소 <span class="required-error text-radical-red">*</span></label>
					<input class="small-input bg-white margin-20px-bottom required" name="email" type="text" placeholder="Enter your email">

					<label class="margin-15px-bottom">비밀번호 <span class="required-error text-radical-red">*</span></label>
					<input class="small-input bg-white margin-20px-bottom required" type="password" name="password" placeholder="Enter your password">

					<button class="btn btn-medium btn-fancy btn-dark-gray w-100" type="submit">로그인</button>
					<p class="text-right margin-20px-top mb-0"><a href="/user/register" class="btn btn-link  btn-medium text-extra-dark-gray">사용자 등록</a></p>
				</form>
			</div>
		</div>
	</div>
</section>