<?php
require ('./vendor/autoload.php');

$user = $_GET['user'] ?: 'kylinwin';
$response = Requests::get("https://emma.pixnet.cc/blog/articles?user=$user");
$articles = json_decode($response->body)->articles;
?>

<!DOCTYPE html>
<html lang="zh-tw">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>PIXNET Emma API DEMO</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    </head>
    <body>

        <div class="container">
            <div class="jumbotron">
                <h1 class="display-3"><?= $user ?>'s Demo site for PIXNET Emma API</h1>
            </div>

            <?php foreach ($articles as $article) { ?>
            <div class="alert alert-primary" role="alert">
                <a href="./article.php?user=<?= $user . '&id=' . $article->id ?>"><?= $article->title; ?></a>
            </div>
            <?php } ?>

        </div>
    </body>
</html>
