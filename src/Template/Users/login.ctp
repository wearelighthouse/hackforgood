<?php $this->assign('title', 'Login'); ?>

<?= $this->Form->create($login, [
        'url' => [
            'controller' => 'Users',
            'action' => 'login'
        ]
    ]) ?>
    <?= $this->Form->input('email') ?>
    <?= $this->Form->input('password') ?>
    <?= $this->Form->input('remember_me', [
            'type' => 'checkbox',
            'checked' => true
        ]) ?>
    <?= $this->Form->button('Login') ?>
<?= $this->Form->end() ?>