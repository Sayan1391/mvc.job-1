<html>
<head>
    <title>Index</title>
    <link rel="stylesheet" type="text/css" href="/../style/style.css">
</head>
<body>

<div class="create">
    <a href="create">Добавить</a>
</div>

<div class="page">
    <?php foreach ($result as $key): ?>
        <div class="news">
            <div class="theme-box"><?= $key['title']; ?></div>
            <div class="news-box"><?= $key['description']; ?></div>
            <div class="status">
                <a href="view?id=<?= $key['id']; ?>">Подробнее</a>
                <a href="update?id=<?= $key['id']; ?>">Редактировать</a></div>
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>