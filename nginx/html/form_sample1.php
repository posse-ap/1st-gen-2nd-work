<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>フォームサンプル１</title>
</head>
<body>
<p><?php echo htmlspecialchars(@$_POST['name'], ENT_QUOTES, 'UTF-8'); ?>さん。</p>
<p>あなたは、<?php echo (int)@$_POST['age']; ?> 歳です。</p>
</body>
</html>

