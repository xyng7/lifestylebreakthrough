<div class="programs index">
    <h2><?php echo __('Programs'); ?></h2>

    <table id="js-datatable" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('name'); ?></th>
                <th><?php echo $this->Paginator->sort('client_id'); ?></th>
                <th><?php echo $this->Paginator->sort('start_date'); ?></th>
                <th><?php echo $this->Paginator->sort('end_date'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($programs as $program): ?>
                <tr>
                    <td><?php echo h($program['Program']['name']); ?>&nbsp;</td>
                    <td><?php echo $this->Html->link($program['Client']['first_name'], array('controller' => 'clients', 'action' => 'view', $program['Client']['id'])); ?></td>
                    <td><?php echo $this->Time->format('d-m-Y', h($program['Program']['start_date'])); ?>&nbsp;</td>
                    <td><?php echo $this->Time->format('d-m-Y', h($program['Program']['end_date'])); ?>&nbsp;</td>
                    <td><?php echo $this->Html->link(__('View'), array('action' => 'view', $program['Program']['id'])); ?>
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $program['Program']['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $program['Program']['id']), null, __('Are you sure you want to delete # %s?', $program['Program']['name'])); ?></td>
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
</div>

<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('New Program'), array('action' => 'add')); ?></li>

    </ul>
    <br>
    <h3><?php echo __('Templates'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Manage Templates'), array('controller' => 'templates', 'action' => 'index')); ?> </li>
    </ul>
</div>
