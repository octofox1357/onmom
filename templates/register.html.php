
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

<h1>회원 가입</h1>
<form action="" method="post">
    <label for="email">이메일</label>
    <input name="user[email]" id="email" type="text" value="<?=$user['email'] ?? ''?>">
    
    <label for="name">이름</label>
    <input name="user[name]" id="name" type="text" value="<?=$user['name'] ?? ''?>">

    <label for="password">비밀번호</label>
    <input name="user[password]" id="password" type="password" value="<?=$user['password'] ?? ''?>">
 
    <input type="submit" name="submit" value="사용자 등록">
</form>