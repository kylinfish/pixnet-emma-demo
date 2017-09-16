<?php
require ('./vendor/autoload.php');

$user = $_GET['user'] ?: 'kylinwin';
$article_id = $_GET['id'];
$response = Requests::get("https://emma.pixnet.cc/blog/articles/{$article_id}?user={$user}");
$article = json_decode($response->body)->article;
?>

<!DOCTYPE html>
<html lang="zh-tw">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>PIXNET Emma API DEMO</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <link rel="stylesheet" href="http://getbootstrap.com/docs/4.0/examples/blog/blog.css">
    </head>
    <style>
        body { background-color: #eee; } .notice { padding: 15px; background-color: #fafafa; border-left: 6px solid #7f7f84; margin-bottom: 10px; -webkit-box-shadow: 0 5px 8px -6px rgba(0,0,0,.2); -moz-box-shadow: 0 5px 8px -6px rgba(0,0,0,.2); box-shadow: 0 5px 8px -6px rgba(0,0,0,.2); } .notice-sm { padding: 10px; font-size: 80%; } .notice-lg { padding: 35px; font-size: large; } .notice-success { border-color: #80D651; } .notice-success>strong { color: #80D651; } .notice-info { border-color: #45ABCD; } .notice-info>strong { color: #45ABCD; } .notice-warning { border-color: #FEAF20; } .notice-warning>strong { color: #FEAF20; } .notice-danger { border-color: #d73814; } .notice-danger>strong { color: #d73814; }
    </style>
    <body>

        <div class="blog-masthead">
            <div class="container">
                <nav class="nav">
                    <a class="nav-link active" href="/staging/demo/?user=<?= $user ?>"><?= $user ?></a>
                </nav>
            </div>
        </div>

        <div class="container" id="content">
            <div class="blog-header">
                <div class="container">
                    <h1><?= $article->title ?></h1>
                    <p class="lead blog-description"><?php $article->site_category ?></p>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-sm-8 blog-main">
                        <div class="blog-post">
                            <p class="blog-post-meta"><?= date('Y/m/d H:i:s', $article->public_at) ?> by <a href="#"> <?= $article->user->display_name ?> </a></p>
                            <?= $article->body ?>
                        </div>
                    </div>

                    <div class="col ml-2">
                        <div class="notice notice-success">
                            <strong>Hits Total</strong> <?= $article->hits->total ?>
                        </div>

                        <div class="notice notice-danger">
                            <strong>Hits Daily</strong> <?= $article->hits->daily ?>
                        </div>

                        <div class="notice notice-info">
                            <strong>Tags</strong> <?= explode(',', $article->tags) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
