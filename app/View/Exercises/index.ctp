<div class="exercise form">	
    <h4><?php echo __('Exercises'); ?></h4>

<table id="js-datatable" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?php echo h('name'); ?></th>
            <th><?php echo h('Start Picture'); ?></th>
            <th><?php echo h('End Picture'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
<?php foreach ($exercises as $exercise): ?>
            <tr>
                <td><?php echo h($exercise['Exercise']['name']); ?>&nbsp;</td>
                <td><?php
    if ($exercise['Exercise']['start_pic'] != null) {
        //echo $instruction['image']."<br /><br />"; 
        echo $this->Html->image('files/' . $exercise['Exercise']['start_pic'], array('width' => 50, 'height' => 50));
    } else {
        echo "no image available";
    }
    ?></td>
                <td><?php
    if ($exercise['Exercise']['end_pic'] != null) {
        //echo $instruction['image']."<br /><br />"; 
        echo $this->Html->image('files/' . $exercise['Exercise']['end_pic'], array('width' => 50, 'height' => 50));
    } else {
        echo "no image available";
    }
    ?></td>
                <td>
                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $exercise['Exercise']['id'])); ?> <br>
                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $exercise['Exercise']['id'])); ?> <br>
                    <?php
                    if (AuthComponent::user('role') === 'superadmin') {
                        echo $this->Form->postLink(__('Archive'), array('action' => 'delete', $exercise['Exercise']['id']), null, __('Are you sure you want to archive # %s? This exercise may be related to many programs', $exercise['Exercise']['name']));
                        
                    }
                    ?>
                </td>
            </tr>

<?php endforeach; ?>
    </tbody>
</table>
</div>
    <div class="actions">


<!--        <h4><?php echo __('Actions'); ?></h4>
        <ul>
            <li><?php echo $this->Html->link(__('New Exercise'), array('action' => 'add')); ?></li>
        </ul>-->
                <?php if (AuthComponent::user('role') === 'superadmin') { ?>
        <h3><?php echo __('Actions'); ?></h3>
            <ul>
<!--            <li><?php echo $this->Html->link(__('Archived Exercise'), array('action' => 'archive')); ?></li>-->
            <li><?php echo $this->Html->link(__('Manage Body Parts'), array('controller' => 'body_parts', 'action' => 'index')); ?>
            <li><?php echo $this->Html->link(__('Manage Categories'), array('controller' => 'categories', 'action' => 'index')); ?>
            <li><?php echo $this->Html->link(__('Manage Equipment'), array('controller' => 'equipment', 'action' => 'index')); ?>
    </ul>
</div>
<?php } ?>

