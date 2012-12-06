<div class="actions">
    <h4><?php echo __('Admin'); ?></h4>
</div>

<div class="actions">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <?php if (AuthComponent::user('role') === 'superadmin') { ?>
        <ul>
            <li>
                <?php echo $this->Html->link(__('New Admin'), array('action' => 'add')); ?>
            </li>
        </ul>
        <ul>
            <li>
                <?php echo $this->Html->link(__('Archived Admin'), array('action' => 'archive'));} ?> 
            </li>
        </ul>
</div>

<table id="js-datatable" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?php echo h('Username'); ?></th>
            <th><?php echo h('Role'); ?></th>
            <th><?php echo h('Created'); ?></th>
            <th><?php echo h('Modified'); ?></th>
            <th><?php echo h('Last login'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
                <td><?php echo h($user['User']['role']); ?>&nbsp;</td>
                <td><?php echo $this->Time->format('d-m-Y, H:i:s', h($user['User']['created'])); ?>&nbsp;</td>
                <td><?php echo $this->Time->format('d-m-Y, H:i:s', h($user['User']['modified'])); ?>&nbsp;</td>
                <td>
                    <?php
                    if ($user['User']['last_login'] != null) {
                        echo $this->Time->format('d-m-Y, H:i:s', h($user['User']['last_login']));
                    } else {
                        echo null;
                    }
                    ?>
                </td>
                <td>
                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
                    <?php
                    if (AuthComponent::user('role') === 'superadmin') {
                        echo __(' <br> ');
                        echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id']));
                        echo __(' <br> ');
                        if(($id=$this->Session->read('Auth.User.id')) !== ($user['User']['id'])){
                            //if login user does not show delete button
                        echo $this->Form->postLink(__('Archive'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to archive # %s?', $user['User']['username']));
                        }
                    }
                    ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>