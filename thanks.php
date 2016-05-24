<?php
// 入力内容をそれぞれ変数に入れる
$nickname = htmlspecialchars($_POST['nickname']);
$email = htmlspecialchars($_POST['email']);
$content = htmlspecialchars($_POST['content']);

// ①DB接続
$dsn = 'mysql:dbname=phpkiso;host=localhost';
$user = 'root';
$password = '';
$dbh = new PDO($dsn,$user,$password);
$dbh->query('SET NAMES utf8');

// ②SQL文を作成
$sql = 'INSERT INTO `survey`(`nickname`, `email`, `content`) VALUES ("'.$nickname.'","'.$email.'","'.$content.'")';

// SQLを実行
$stmt = $dbh->prepare($sql);
$stmt->execute();

// ③DB切断
$dbh = null;

?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>送信完了</title>
</head>
<body>
	<h1>お問い合わせありがとうございました！</h1>
	<div>
		<h3>お問い合わせ詳細内容</h3>
		<p>ニックネーム：<?php echo $nickname; ?></p>
		<p>メールアドレス：<?php echo $email; ?></p>
		<p>お問い合わせ内容：<?php echo $content; ?></p>
	</div>
</body>
</html>