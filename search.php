<?php
//①DB接続
$dsn = 'mysql:dbname=phpkiso;host=localhost';
$user = 'root';
$password = '';
$dbh = new PDO($dsn,$user,$password);
$dbh->query('SET NAMES utf8');

// POST送信された時だけSQLを実行する
if (!empty($_POST)) {
	//②SQL文を作成
	$sql = 'SELECT * FROM `survey` WHERE `code` = ?';
	$data[] = $_POST['code'];

	// SQLを実行
	$stmt = $dbh->prepare($sql);
	$stmt->execute($data);
	$rec = $stmt->fetch(PDO::FETCH_ASSOC);

	$code = $rec['code'];
	$nickname = $rec['nickname'];
	$email = $rec['email'];
	$content = $rec['content'];
}

// ③DB切断
$dbh = null;

?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<title>検索ページ</title>
	<meta charset="utf-8">
</head>
<body>
	<form action="search.php" method="post">
		<p>検索したいcodeを入力してください</p>
		<input type="text" name="code">
		<input type="submit" value="検索">
	</form>

	<!-- ここに検索結果を表示 -->
	<?php if (!empty($_POST)): ?>
	<div>
		<p>code: <?php echo $code; ?></p>
		<p>nickname: <?php echo $nickname; ?></p>
		<p>email: <?php echo $email; ?></p>
		<p>content: <?php echo $content; ?></p>
	</div>
	<?php endif; ?>
</body>
</html>