<div class="actions">	
    <h4><?php echo __('Archived Programs'); ?></h4>
</div>

<table id="js-datatable" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
                <th><?php echo h('Client'); ?></th>
                <th><?php echo h('Program Name'); ?></th>
                <th><?php echo h('Start Date'); ?></th>
                <th><?php echo h('End Date'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($programs as $program): ?>
                <tr>
                    <td><?php echo $this->Html->link($program['Client']['first_name'], array('controller' => 'clients', 'action' => 'view', $program['Client']['id'])); ?></td>
                    <td><?php echo h($program['Program']['name']); ?>&nbsp;</td>
                    <td><?php echo $this->Time->format('d-m-Y', h($program['Program']['start_date'])); ?>&nbsp;</td>
                    <td><?php echo $this->Time->format('d-m-Y', h($program['Program']['end_date'])); ?>&nbsp;</td>
                <td>
                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $program['Program']['id'])); ?> <br>
                    <?php
                    if (AuthComponent::user('role') === 'superadmin') {
                        echo $this->Form->postlink(__('Activate'), array('action' => 'activate', $program['Program']['id'])); } ?>
                    </td>
        <?php endforeach; ?>
    </tbody>
</table>
<p>
    <?php
    /* echo $this->Paginator->counter(array(
      'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
      )); */
    ?>	</p>



