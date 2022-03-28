<?php if (!empty($errors)): ?>
	<div class="errors">
		<p>등록할 수 없습니다. 다음을 확인해 주세요.</p>
		<ul>
		<?php foreach ($errors as $error): ?>
			<li><?= $error ?></li>
		<?php endforeach; 	?>
		</ul>
	</div>
<?php endif; ?>

<section class="wow animate__fadeIn">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 col-xl-5 offset-xl-1 col-md-6 lg-padding-30px-lr md-padding-15px-lr">
				<h6 class="alt-font font-weight-500 text-white">회원 가입</h6>
				<form action="" method="post" class="border-all border-color-medium-gray padding-4-rem-all lg-margin-35px-top md-padding-2-half-rem-all bg-light-gray">

					<label class="margin-15px-bottom">이름 <span class="required-error text-radical-red">*</span></label>
					<input class="small-input bg-white margin-20px-bottom required" type="text" name="user[name]" value="<?=$user['name'] ?? ''?>" placeholder="Enter your username">

					<label class="margin-15px-bottom">이메일 <span class="required-error text-radical-red">*</span></label>
					<input class="small-input bg-white margin-20px-bottom required" type="email" name="user[email]" value="<?=$user['email'] ?? ''?>" placeholder="Enter your email">

					<label class="margin-15px-bottom">비밀번호 <span class="required-error text-radical-red">*</span></label>
					<input class="small-input bg-white margin-20px-bottom required" type="password" name="user[password]" value="<?=$user['password'] ?? ''?>" placeholder="Enter your password">

					<button class="btn btn-medium btn-fancy btn-dark-gray w-100" type="submit">사용자 등록</button>
					<p class="text-right margin-20px-top mb-0"><a href="/user/login" class="btn btn-link  btn-medium text-extra-dark-gray">로그인 페이지</a></p>
				</form>
			</div>
		</div>
	</div>
</section>