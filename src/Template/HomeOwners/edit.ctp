<?php $this->assign('title', 'Edit Home Owner'); ?>

<?= $this->Form->create($homeOwner) ?>
    <?= $this->Form->input('name') ?>
    <?= $this->Form->input('street_address') ?>

    <?= $this->Form->input('geolocation.latitude') ?>
    <?= $this->Form->input('geolocation.longitude') ?>

    <?= $this->Form->submit('Update') ?>
<?= $this->Form->end() ?>