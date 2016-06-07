<?php $this->assign('title', 'Assessment'); ?>

<?php $this->loadHelper('Form', [
    'templates' => 'app_form',
]);
?>

<?= $this->Form->create($homeOwner, ['class' => 'ui form']) ?>
    <?= $this->Form->input('assessment.0', [
            'class' => 'ui dropdown',
            'label' => 'Structure Type',
            'options' => [
                'Single Family',
                'Multi-Family',
                'Mobile Home',
                'Commercial'
            ],
            'type' => 'select'
        ]) ?>

    <?= $this->Form->input('assessment.1', [
            'class' => 'ui dropdown',
            'label' => 'Rent/Own/Public?',
            'options' => [
                'Rent',
                'Own',
                'Public Land',
                'Non-Profit',
                'Business',
            ],
            'type' => 'select'
        ]) ?>

    <button type="submit" class="ui primary button">Submit Assessment</button>
<?= $this->Form->end() ?>

<div class="ui horizontal divider">
    Or
</div>

<?= $this->Html->link('Submit assessment later', [
        'controller' => 'HomeOwners',
        'action' => 'index',
        'operation_id' => $operation->id
    ]) ?>