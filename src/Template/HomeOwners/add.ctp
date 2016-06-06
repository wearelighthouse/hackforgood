<?php $this->assign('title', 'Add Home Owner'); ?>

<?php $this->loadHelper('Form', [
    'templates' => 'app_form',
]);
?>

<?= $this->Form->create($homeOwner, ['class' => 'ui form']) ?>
    <?= $this->Form->input('name') ?>
    <?= $this->Form->input('email') ?>
    <?= $this->Form->input('street_address') ?>

    <?= $this->Form->input('geolocation.latitude') ?>
    <?= $this->Form->input('geolocation.longitude') ?>

    <button type="submit" class="ui button">Add Home</button>
<?= $this->Form->end() ?>