<div class="users index">
    <h2><?php echo __('Admin'); ?></h2>

    <table id="js-datatable" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('username'); ?></th>
                <th><?php echo $this->Paginator->sort('role'); ?></th>
                <th><?php echo $this->Paginator->sort('created'); ?></th>
                <th><?php echo $this->Paginator->sort('modified'); ?></th>
                <th><?php echo $this->Paginator->sort('last_login'); ?></th>
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
                            echo __(' ');
                            echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['username']));
                        }
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <p>
        <?php
        /* echo $this->Paginator->counter(array(
          'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
          )); */
        ?>	
    </p>

    <div class="paging">
        <?php
        /* echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
          echo $this->Paginator->numbers(array('separator' => ''));
          echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled')); */
        ?>
    </div>
</div>

<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php
        if (AuthComponent::user('role') === 'superadmin') {
            echo $this->Html->link(__('New Admin'), array('action' => 'add'));
        }?> 
                    
         
        <li><?php //echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout'));  ?> </li>
    </ul>
</div>
