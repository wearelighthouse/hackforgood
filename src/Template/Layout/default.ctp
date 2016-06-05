<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $this->fetch('title') ?></title>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <?= $this->Flash->render() ?>
    
    <?= $this->fetch('content') ?>

    <script data-main="/webroot/js/main" src="/webroot/js/vendor/requirejs/require.js"></script>
</body>
</html>
