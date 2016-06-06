<?php $this->assign('title', 'Home Owners'); ?>

<ul>
<?php foreach ($homeOwners as $homeOwner) : ?>
    <li>
        <?= $this->Html->link($homeOwner->name, [
                'controller' => 'HomeOwners',
                'action' => 'sign',
                'operation_id' => $homeOwner->operation_id,
                'id' => $homeOwner->id
            ]) ?>
    </li>
<?php endforeach; ?>
</ul>