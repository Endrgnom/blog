<?php

include_once "mysqlConnect.php";
function generation_head_menu ($mysqli) {
    // Строим SQL запрос
    $sql = "SELECT * FROM `topic`";
    // Отправляем SQL запрос к БД
    $resSQL = $mysqli -> query($sql);
    ?>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="/">Navbar</a>
            <ul class="navbar-nav mr-auto">
                <?php
                // Создаём список категорий в меню
                while ($rowTopic = $resSQL -> fetch_assoc()) {
                    // Выводим элемент списка
                    echo '<li class="nav-item"><a class="nav-link" href="./topic.php?id_topic='. $rowTopic["id"] .'">'. $rowTopic['name'].'</a></li>';
                }
                ?>
            </ul>
        </nav>
    </header>
    <?php
}
function generation_posts_index ($mysqli) {
    $sql = "SELECT * FROM `articles`";
    // Отправляем SQL запрос
    $res = $mysqli -> query($sql);
    // Проверка что есть статьи
    if ($res -> num_rows > 0) {
        // Выводим статьи
        while ($resArticle = $res -> fetch_assoc()) {
            ?>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title" ><a href="post.php?id_article=<?= $resArticle['id'] ?>"><?= $resArticle['title'] ?></a></h5>
                    <p class="card-text"><?= mb_substr($resArticle['text'], 0, 158, 'UTF-8') ?></p>
                </div>
            </div>
            <?php
        }
    } else {
        // Если нет статей то выводим надпись
        echo "Нет статей";
    }
}
function generation_posts_topic ($mysqli, $id_topic) {
    // Строим SQL запрос
    $sql = "SELECT * FROM `articles` WHERE `id_topic` = $id_topic";
    // Отправляем SQL запрос
    $res = $mysqli -> query($sql);
    // Проверяем есть ли статьи
    if ($res -> num_rows > 0) {
        // Через цикл выводим статьи
        while ($resArticle = $res -> fetch_assoc()) {
            ?>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title" ><a href="post.php?id_article=<?= $resArticle['id'] ?>"><?= $resArticle['title'] ?></a></h5>
                    <p class="card-text"><?= mb_substr($resArticle['text'], 0, 158, 'UTF-8') ?></p>
                </div>
            </div>
            <?php
        }
    } else {
        // Если нет статей, то выводим надпись
        echo "В этом раздели статей нету";
    }
}
function generation_post ($mysqli, $id_article) {
    // Строим SQL запрос
    $sql = "SELECT * FROM `articles` WHERE `id` = '$id_article'";

    $res = $mysqli -> query($sql);

    if ($res -> num_rows === 1) {

        $resPost = $res -> fetch_assoc()?>
        <h1><?= $resPost['title'] ?></h1>
        <p><?= $resPost['text'] ?></p>
        <p>Дата публикации: <?= substr($resPost['date'], 0, 11) ?></p>
        <?php
    }
}
function generation_comment ($mysqli, $id_article) {

    $sql = "SELECT * FROM `comments` WHERE `id_article` = $id_article";

    $resSQL = $mysqli -> query($sql);

    if ($resSQL -> num_rows > 0) {
        while ($resComment = $resSQL -> fetch_assoc()) {
            ?>
            <div class="comment">
                <p><b><?= $resComment['comment']?></b></p>
                <p>Оставлен: <?= substr($resComment['date'], 0, 11)  ?></p>
            </div>
            <hr>
            <?php
        }
    } else {
        ?>
        <p>Комментариев нет</p>
        <?php
    }
}