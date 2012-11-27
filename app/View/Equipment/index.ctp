<div class="equipment index">
    <h2><?php echo __('Equipment'); ?></h2>

    <table id="js-datatable" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('equipment'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($equipment as $equipment): ?>
                <tr>
                    <td><?php echo h($equipment['Equipment']['equipment']); ?>&nbsp;</td>
                    <td>
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $equipment['Equipment']['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $equipment['Equipment']['id']), null, __('Are you sure you want to delete # %s? This equipment may be related to exercises that could effect searching', $equipment['Equipment']['equipment'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <!--
    <table cellpadding="0" cellspacing="0">
    <tr>
                    <th><?php echo $this->Paginator->sort('equipment'); ?></th>
                    <th class="actions"><?php echo __('Actions'); ?></th>
    </tr>
    <?php foreach ($equipment as $equipment): ?>
        <tr>
                <td><?php echo h($equipment['Equipment']['equipment']); ?>&nbsp;</td>
                <td>
        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $equipment['Equipment']['id'])); ?>
        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $equipment['Equipment']['id']), null, __('Are you sure you want to delete # %s? This equipment may be related to exercises that could effect searching', $equipment['Equipment']['equipment'])); ?>
                </td>
        </tr>
    <?php endforeach; ?>
    </table>-->

    <p>
        <?php
        /* echo $this->Paginator->counter(array(
          'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
          )); */
        ?>	</p>

    <!--<div class="paging">
    <?php /*
      echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
      echo $this->Paginator->numbers(array('separator' => ''));
      echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled')); */
    ?>
    </div>-->

</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('New Equipment'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('Back'), array('controller' => 'exercises', 'action' => 'index')); ?></li>
    </ul>
</div>
