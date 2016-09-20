<html>
<head>
    <meta charset="UTF-8">
    <title>News</title>
</head>
<body>

<form action="/news/CreateProcess" method="post">
    <div class="theme-block blocks">
        <label for="title">Загаловок</label><br>
        <input name="title" id="title" type="text">
    </div>

    <div class="news-block blocks">
        <label for="description">Описание</label><br>
        <textarea name="description" id="description"></textarea>
    </div>

    <div><input type="submit" value="Добавить"></div>
</form>

</body>
</html>