<div class="actions">	
    <h4><?php echo __('Archived Admin'); ?></h4>
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
                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?> <br>
                    <?php echo $this->Form->postlink(__('Activate'), array('action' => 'activate', $user['User']['id'])); ?>
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
    ?>	</p>



