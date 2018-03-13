<!DOCTYPE html>
<html em="ru">
<head>
		<meta charset="UTF-8">
		<title>Ошибка</title>
</head>
<body>
		<h1>Произошла ошибка!!!</h1>
		<p><b>КОД ОШИБКИ: </b><?= ' '.$errno;?></p>
		<p><b>ТЕКСТ ОШИБКИ: </b><?= ' '.$errstr;?></p>
		<p><b>ФАЙЛ В КОТОРОМ ПРОИЗОШЛА ОШИБКА: </b><?= ' '.$errfile;?></p>
	<p><b>СТРОКА В КОТОРОЙ ПРОИЗОШЛА ОШИБКА: </b> <?= ' '.$errline;?></p>
</body>
</html>