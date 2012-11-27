<div class="categories index">
    <h2><?php echo __('Categories'); ?></h2>

    <table id="js-datatable" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('category'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $category): ?>
                <tr>
                    <td><?php echo h($category['Category']['category']); ?>&nbsp;</td>
                    <td>
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $category['Category']['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $category['Category']['id']), null, __('Are you sure you want to delete # %s? This category may be related to exercises that could effect searching', $category['Category']['category'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!--
    <table cellpadding="0" cellspacing="0">
    <tr>
                    <th><?php echo $this->Paginator->sort('category'); ?></th>
                    <th class="actions"><?php echo __('Actions'); ?></th>
    </tr>
    <?php foreach ($categories as $category): ?>
            <tr>
                    <td><?php echo h($category['Category']['category']); ?>&nbsp;</td>
                    <td><?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $category['Category']['id'])); ?>
        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $category['Category']['id']), null, __('Are you sure you want to delete # %s? This category may be related to exercises that could effect searching', $category['Category']['category'])); ?>
                    </td>
            </tr>
    <?php endforeach; ?>
    </table>-->
    <p>
        <?php
        /*echo $this->Paginator->counter(array(
            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
        ));*/
        ?>	</p>

    <div class="paging">
        <?php
       /* echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ''));
        echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));*/
        ?>
    </div>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('New Category'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('Back'), array('controller' => 'exercises', 'action' => 'index')); ?> </li>
    </ul>
</div>
