<div class="actions">	
    <h4><?php echo __('Clients'); ?></h4>
</div>

<div class="actions">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <ul>
        <li><?php echo $this->Html->link(__('New Client'), array('action' => 'add')); ?></li>
    </ul>
        <ul>
        <li><?php // view page of archive clients 
        echo $this->Html->link(__('Archive Client'), array('action' => 'archive')); ?></li>
    </ul>
</div>

<table id="js-datatable" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?php echo h('First Name'); ?></th>
            <th><?php echo h('Last Name'); ?></th>
            <th><?php echo h('Email'); ?></th>
            <th><?php echo h('Dob'); ?></th>
            <th><?php echo h('Phone'); ?></th>
            <th><?php echo h('Mobile'); ?></th>
            <th><?php echo h('Address'); ?></th>
            <th><?php echo h('Suburb'); ?></th>
            <th><?php echo h('Postal'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($clients as $client): ?>
            <tr>
                <td><?php echo h($client['Client']['first_name']); ?>&nbsp;</td>
                <td><?php echo h($client['Client']['last_name']); ?>&nbsp;</td>
                <td><?php echo h($client['Client']['email']); ?>&nbsp;</td>
                <td><?php echo $this->Time->format('d-m-Y', h($client['Client']['dob'])); ?>&nbsp;</td>
                <td><?php echo h($client['Client']['phone']); ?>&nbsp;</td>
                <td><?php echo h($client['Client']['mobile']); ?>&nbsp;</td>
                <td><?php echo h($client['Client']['address']); ?>&nbsp;</td>
                <td><?php echo h($client['Client']['suburb']); ?>&nbsp;</td>
                <td><?php echo h($client['Client']['postal']); ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $client['Client']['id'])); ?> <br>
                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $client['Client']['id'])); ?> <br>
                    <?php if (AuthComponent::user('role') === 'superadmin') {
                        echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $client['Client']['id']), null, __('Are you sure you want to archive # %s?', $client['Client']['first_name']));
                    }?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<p>
    <?php
    /*echo $this->Paginator->counter(array(
        'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
    ));*/
    ?>	</p>



