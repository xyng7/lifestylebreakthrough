<div class="programs view">
    <h3><?php echo __('Program'); ?></h3>
    <table id="gradient-style" cellpadding = "0" cellspacing = "0">
        <tr>    
            <th><?php echo __('Client'); ?></th>
            <th><?php echo __('Name'); ?></th>
            <th><?php echo __('Start Date'); ?></th>
            <th><?php echo __('End Date'); ?></th>
            <th><?php echo __('Notes'); ?></th>            
        </tr>
        <tr>
            <td><?php echo $this->Html->link($program['Client']['first_name'], array('controller' => 'clients', 'action' => 'view', $program['Client']['id'])); ?></td>
            <td><?php echo h($program['Program']['name']); ?></td>
            <td><?php echo $this->Time->format('d-m-Y', h($program['Program']['start_date'])); ?></td>
            <td><?php echo $this->Time->format('d-m-Y', h($program['Program']['end_date'])); ?></td>
            <td><?php echo h($program['Program']['notes']); ?></td>

        </tr>
    </table>	
    <!--<dl>
                    <dt><?php echo __('Client'); ?></dt>
                    <dd>
    <?php echo $this->Html->link($program['Client']['first_name'], array('controller' => 'clients', 'action' => 'view', $program['Client']['id'])); ?>
                            &nbsp;
                    </dd>
                    <dt><?php echo __('Name'); ?></dt>
                    <dd>
    <?php echo h($program['Program']['name']); ?>
                            &nbsp;
                    </dd>
                    <dt><?php echo __('Start Date'); ?></dt>
                    <dd>
    <?php echo $this->Time->format('d-m-Y', h($program['Program']['start_date'])); ?>
                            &nbsp;
                    </dd>
                    <dt><?php echo __('End Date'); ?></dt>
                    <dd>
    <?php echo $this->Time->format('d-m-Y', h($program['Program']['end_date'])); ?>
                            &nbsp;
                    </dd>
                    <dt><?php echo __('Notes'); ?></dt>
                    <dd>
    <?php echo h($program['Program']['notes']); ?>
                            &nbsp;
                    </dd>
            </dl>
    
    <br>-->
    <div class="related">

        <?php if (!empty($program['Exercise'])): ?>
            <h3><?php echo __('Exercises'); ?></h3>
            <table cellpadding = "0" cellspacing = "0">
                <tr>    
                    <th><?php echo __('Number'); ?></th>
                    <th><?php echo __('Name'); ?></th>
                    <th><?php echo __('Sets'); ?></th>
                    <th><?php echo __('Reps'); ?></th>
                    <th><?php echo __('Rest(Sec)'); ?></th>
                    <th><?php echo __('Load(Kg)'); ?></th>
                    <th class="actions"><?php echo __('Actions'); ?></th>
                </tr>
                <?php
                $i = 1;
                foreach ($program['Exercise'] as $exercise):
                    ?>
                    <tr>

                        <td><?php echo $i; ?></td>
                        <td><?php echo $exercise['name']; ?></td>
                        <td><?php echo $exercisesPrograms[$i - 1]['exercises_programs']['rec_sets']; ?></td>
                        <td><?php echo $exercisesPrograms[$i - 1]['exercises_programs']['rec_reps']; ?></td>
                        <td><?php echo $exercisesPrograms[$i - 1]['exercises_programs']['rec_res']; ?></td>
                        <td><?php echo $exercisesPrograms[$i - 1]['exercises_programs']['rec_load']; ?></td>
                        <td>
        <?php echo $this->Html->link(__('View Exercise'), array('controller' => 'Exercises', 'action' => 'view', $exercise['id'])); ?>

                        </td>

                    </tr>
                    <?php $i++; ?>
            <?php endforeach; ?>
            </table>
<?php endif; ?>


    </div>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('List Programs'), array('action' => 'index')); ?> </li>	            
        <li><?php echo $this->Html->link(__('PDF - 4 weeks'), array('action' => 'view2_pdf', 'ext' => 'pdf', $program['Program']['id']), array('target' => '_blank')); ?></li>
        <li><?php echo $this->Html->link(__('PDF - Descriptions'), array('action' => 'view_pdf', 'ext' => 'pdf', $program['Program']['id']), array('target' => '_blank')); ?></li>
        <li><?php echo $this->Html->link(__('PDF - Text Only'), array('action' => 'view3_pdf', 'ext' => 'pdf', $program['Program']['id']), array('target' => '_blank')); ?></li>
    </ul>
</div>