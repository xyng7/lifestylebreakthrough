     
<div class="programs view">


    <br>
    <div class="related">
        <h3><?php echo __('Programs'); ?></h3>
        <?php if (!empty($client['Program'])): ?>
            <table cellpadding = "0" cellspacing = "0">
                <tr>    
                    <th><?php echo __('Number'); ?></th>
                    <th><?php echo __('Name'); ?></th>
                    <th class="actions"><?php echo __('Actions'); ?></th>
                </tr>
                <?php
                $i = 1;
                foreach ($client['Program'] as $programs):
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $programs['name']; ?></td>
                        <td>
                        <?php echo $this->Html->link(__('View'), array('action' => 'viewProgram', $programs['id'])); ?>

                        </td>
                    </tr>
                    <?php $i++; ?>
            <?php endforeach; ?>
            </table>
<?php endif; ?>

    </div>
</div>



