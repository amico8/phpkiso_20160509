<?php
// 入力内容をそれぞれ変数に入れる
$nickname = htmlspecialchars($_POST['nickname']);
$email = htmlspecialchars($_POST['email']);
$content = htmlspecialchars($_POST['content']);

if ($nickname == '') {
	$nickname_result = 'ニックネームが入力されていません。';
} else {
	$nickname_result = 'ようこそ' . $nickname .'様';
}

// emailと問い合わせ内容の必須入力チェック
if ($email == '') {
	$email_result = 'メールアドレスが入力されていません。';
} else {
	$email_result = 'メールアドレス：' . $email;
}

if ($content == '') {
	$content_result = 'お問い合わせ内容が入力されていません。';
} else {
	$content_result = 'お問い合わせ内容：' . $content;
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>入力内容確認</title>
</head>
<body>
	<h1>入力内容確認</h1>
	<p><?php echo $nickname_result; ?></p>
	<p><?php echo $email_result; ?></p>
	<p><?php echo $content_result; ?></p>
	<div>
		<form method="post" action="thanks.php">
			<input type="hidden" name="nickname" value="<?php echo $nickname; ?>">
			<input type="hidden" name="email" value="<?php echo $email; ?>">
			<input type="hidden" name="content"	value="<?php echo $content; ?>">

			<input type="button" onclick="history.back()" value="戻る">
			<?php if ($nickname != '' && $email != '' && $content != ''): ?>
				<input type="submit" value="OK">
			<?php endif; ?>
		</form>
	</div>
</body>
</html>