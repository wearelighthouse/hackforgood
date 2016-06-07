<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mango | <?= $this->fetch('title') ?></title>

    <?= $this->fetch('meta') ?>
    <link href="/css/semantic/semantic.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <?= $this->fetch('css') ?>

    <?= $this->fetch('script') ?>
</head>
<body>
    <div class="ui top fixed blue inverted one item menu">
        <a class="ui header item"><?= $this->fetch('title') ?></title></a>
    </div>
    <div class="ui container">
        <?= $this->Flash->render() ?>

        <?= $this->fetch('content') ?>
    </div>

    <script src="/js/vendor/jquery/dist/jquery.min.js"></script>
    <script src="/css/semantic/semantic.js"></script>
</body>
</html>
