     
<div class="programs view">


    <br>
    <div class="related">
        <div style="width:500px;">
<?php echo $this->Session->flash(); ?></div>
        <h3><?php echo __('Programs'); ?></h3>
        <?php
                $i = 0;?>
        <?php if (!empty($client['Program'])): 
         ?>
            <table  cellpadding = "0" cellspacing = "0" style="width: 500px;">
                <tr>    
                    <th><?php echo __('Number'); ?></th>
                    <th><?php echo __('Name'); ?></th>
                    <th class="actions"><?php echo __('Actions'); ?></th>
                </tr>
                
              <?php  foreach ($client['Program'] as $programs):
                    ?>
                    <?php //debug($programs);
                    if($programs['flag_active'] == 'active'):
                    ?>
                    <?php $i++; ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $programs['name']; ?></td>
                        <td>
                        <u><?php echo $this->Html->link(__('View'. "\n". 'Program'), array('action' => 'viewProgram', $programs['id'])); ?></u><br>
                        <u><?php echo $this->Html->link(__('Update Progress'), array('action' => 'progress', $programs['id'])); ?></u>

                        </td>
                    </tr>
                    
                    <?php endif; ?>
            <?php endforeach; ?>
            </table>
<?php endif; ?> 
    
        <?php if($i === 0): ?>
        <br>
        <h5><?php echo __('No Programs Available'); ?></h5>
        <?php endif; ?>
   

    </div>
</div>



