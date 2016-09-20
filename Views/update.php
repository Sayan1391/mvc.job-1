<html>
<head>
    <title>Update</title>
</head>
<body>

<form action="/news/UpdateProcess" method="post">
    <div class="theme-block blocks">
        <label for="title">Загаловок</label><br>
        <input name="title" id="title" type="text" value="<?= $result['title']; ?>">
    </div>

    <div class="news-block blocks">
        <label for="description">Описание</label><br>
        <textarea name="description" id="description"><?= $result['description']; ?></textarea>
    </div>

    <div><input type="submit" value="Обновить"></div>

    <div class="delete">
        <a href="Delete?id=<?= $result['id']; ?>">Удалить</a>
    </div>

    <input type="hidden" name="id" value="<?= $result['id']; ?>">
</form>

</body>
</html>