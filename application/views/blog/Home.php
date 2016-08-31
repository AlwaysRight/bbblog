<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>Blog For BB</title>
    <link rel="icon" href="bootstrap/img/icon.jpg">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="bootstrap/css/blog.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="blog-masthead">
    <div class="container">
        <nav class="blog-nav">
            <a class="blog-nav-item active" href="#">BB Home</a>
            <a class="blog-nav-item" href="index.php?c=User&m=login">Join Blog</a>
            <a class="blog-nav-item" href="#">Friends</a>
            <a class="blog-nav-item" href="#">About</a>
        </nav>
    </div>
</div>

<div class="container">

    <div class="blog-header">
        <h1 class="blog-title">Home Blog</h1>
        <p class="lead blog-description">Show some hot blogs...= =...</p>
    </div>
    <div class="row">
        <div class="col-sm-8 blog-main">
            <?php foreach ($data as $blog): ?>
                <div class="blog-post">
                    <h2 class="blog-post-title"><a href="#"><?php echo $blog["blog_title"]; ?></a></h2>
                    <p class="blog-post-meta"><?php echo $blog["blog_updatetime"]; ?></p>
                    <p> <?php echo $blog["blog_content"]; ?></p>
                </div>
            <?php endforeach; ?>
            <?php echo $this->pagination->create_links(); ?>
        </div> <!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
            <div class="sidebar-module sidebar-module-inset">
                <h4>About</h4>
                <p>This is bb'blog page. Test...Test....WELCOME.</p>
                <p>^ ^ 23333333333</p>
            </div>
            <div class="sidebar-module">
                <h4>Archives</h4>
                <ol class="list-unstyled">
                    <li><a href="#"> me</a></li>
                    <li><a href="#">ooooo</a></li>
                </ol>
            </div>
            <div class="sidebar-module">
                <h4>Elsewhere</h4>
                <ol class="list-unstyled">
                    <li><a href="https://github.com/AlwaysRight/bbblog">GitHub</a></li>
                    <li><a href="#">新浪微博</a></li>
                    <li><a href="#">Facebook</a></li>
                </ol>
            </div>
        </div><!-- /.blog-sidebar -->
    </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="bootstrap/js/jquery-2.1.4.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>