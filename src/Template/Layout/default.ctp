<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Hack-For-Good | <?= $this->fetch('title') ?></title>

    <?= $this->fetch('meta') ?>
    <link href="/css/semantic/semantic.css" rel="stylesheet">
    <?= $this->fetch('css') ?>

    <?= $this->fetch('script') ?>
</head>
<body>
    <div class="ui container">
        <?= $this->Flash->render() ?>

        <?= $this->fetch('content') ?>
    </div>
    <script src="css/semantic/semantic.js"></script>
</body>
</html>
