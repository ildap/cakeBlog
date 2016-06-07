<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
$user = $auth->user('email');
$user_id = $auth->user('id');
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= $this->Html->meta('icon') ?>
    <!-- Bootstrap core CSS -->
    <?= $this->Html->css('bootstrap.min.css') ?>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="http://getbootstrap.com/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="http://getbootstrap.com/examples/blog/blog.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]>
    <script src="http://getbootstrap.com/assets/js/ie8-responsive-file-warning.js"></script>
    <![endif]-->
    <script src="http://getbootstrap.com/assets/js/ie-emulation-modes-warning.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Блог</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><?= $user ? $this->Html->link(__('новый пост'),['controller'=>'post','action'=>'add']) : null ?></li>
                <li><?= $user_id == 1 ? $this->Html->link(__('новая категория'),['controller'=>'category','action'=>'add']) : null ?></li>
                <!--li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li-->
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <?php if ($user): ?>
                    <!--logout-->
                    <li><?= $this->Html->link(__($user),['controller'=>'users','action'=>'logout'])?></li>
                <?php else: ?>
                    <form class="navbar-form navbar-right" action="<?= $this->Url->build(['controller'=>'users','action'=>'login'])?>" method="post">
                        <div class="form-group">
                            <input type="text" name='email' class="form-control" style="height: 30px;width: 150px;margin-right: 15px"
                                   placeholder="email">
                        </div>
                        <div class="form-group">
                            <input type="password" name='password' class="form-control" style="height: 30px;width: 150px"
                                   placeholder="password">
                        </div>
                        <button type="submit" class="btn btn-default">войти</button>
                    </form>
                    <li><?= $this->Html->link(__('регистрация'),['controller'=>'users','action'=>'add'])?></li>
                <?php endif ?>

            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <?= $this->Flash->render() ?>
    <?= $this->Flash->render('auth') ?>
    <?= $this->fetch('content') ?>
</div>
<footer class="blog-footer">
    <p>Саттаров Ильдар</p>
    <p>email <a href="mailto:i.sattarow@ya.ru">i.sattarow@ya.ru</a></p>
    <p>телефон 89174496019</p>
    <p>
        <a href="#">Back to top</a>
    </p>
</footer>
</body>
</html>
