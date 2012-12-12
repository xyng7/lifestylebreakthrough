<div class="action">	
    <h4><?php echo __('Archived Exercise'); ?></h4>
</div>

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
                        <?php
                       if (AuthComponent::user('role') === 'superadmin') {
                        echo $this->Form->postlink(__('Activate'), array('action' => 'activate', $exercise['Exercise']['id'])); } ?>
                        
                    </td>
                </tr>

<?php endforeach; ?>
        </tbody>
    </table>


