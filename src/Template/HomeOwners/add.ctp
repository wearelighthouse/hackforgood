<?php $this->assign('title', 'Add Home Owner'); ?>

<?= $this->Form->create($homeOwner) ?>
    <?= $this->Form->input('name') ?>
    <?= $this->Form->input('street_address') ?>

    <?= $this->Form->input('geolocation.latitude') ?>
    <?= $this->Form->input('geolocation.longitude') ?>

    <?= $this->Form->submit('Add home owner') ?>
<?= $this->Form->end() ?>