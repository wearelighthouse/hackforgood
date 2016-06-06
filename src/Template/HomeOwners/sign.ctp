<?php $this->assign('title', 'Sign'); ?>

<h1>Sign request for <?= $homeOwner->name ?></h1>

<?= $this->Html->link('Sign!', $url) ?>