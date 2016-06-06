<?php $this->assign('title', 'Home Owners'); ?>

<ul>
<?php foreach ($homeOwners as $homeOwner) : ?>
    <li>
        <?= $this->Html->link($homeOwner->name, [
                'controller' => 'HomeOwners',
                'action' => 'add',
                'operation_id' => $homeOwner->operation_id
            ]) ?>
    </li>
<?php endforeach; ?>
</ul>