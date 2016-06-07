<?php $this->assign('title', 'Login'); ?>

<?php $this->loadHelper('Form', [
    'templates' => 'app_form',
]);
?>

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
    <button type="submit" class="ui primary button">Login</button>
<?= $this->Form->end() ?>