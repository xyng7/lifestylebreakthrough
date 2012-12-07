<div class="bodyParts index">
    <h2><?php echo __('Body Parts'); ?></h2>

    <table id="js-datatable" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('body_part'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bodyParts as $bodyPart): ?>
                <tr>
                    <td><?php echo h($bodyPart['BodyPart']['body_part']); ?>&nbsp;</td>
                    <td>
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $bodyPart['BodyPart']['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $bodyPart['BodyPart']['id']), null, __('Are you sure you want to delete # %s? This body part may be related to exercises that could effect searching', $bodyPart['BodyPart']['body_part'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <!-- //without data table
    <table cellpadding="0" cellspacing="0">
    <tr>
                    <th><?php echo $this->Paginator->sort('body_part'); ?></th>
                    <th class="actions"><?php echo __('Actions'); ?></th>
    </tr>
    <?php foreach ($bodyParts as $bodyPart): ?>
        <tr>
                <td><?php echo h($bodyPart['BodyPart']['body_part']); ?>&nbsp;</td>
                <td>
        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $bodyPart['BodyPart']['id'])); ?>
        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $bodyPart['BodyPart']['id']), null, __('Are you sure you want to delete # %s? This body part may be related to exercises that could effect searching', $bodyPart['BodyPart']['body_part'])); ?>
                </td>
        </tr>
    <?php endforeach; ?>
    </table>-->
    <p>
        <?php
        //echo $this->Paginator->counter(array(
            //'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
        //));
        ?>	
    </p>

    <!--<div class="paging">
        <?php/*
        echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ''));
        echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
        */?>
    </div>-->
    
</div>

<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('New Body Part'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('Back'), array('controller' => 'exercises', 'action' => 'index')); ?> </li>
    </ul>
</div>
