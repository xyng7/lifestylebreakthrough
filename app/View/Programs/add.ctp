<?php
echo $this->Html->script(array('jquery-1.8.3', 'jquery.fastLiveFilter'));
?>
<script>
    $(function() {
        $('#search_input').fastLiveFilter('#search_list');
    });
</script>

<div class="programs form">
    <?php echo $this->Form->create('Program'); ?>
    <fieldset>
        <legend><?php echo __('Add Program'); ?></legend>
        <?php
        echo $this->Form->input('client_id');
        echo $this->Form->input('name');
        echo $this->Form->input('start_date', array('dateFormat' => 'DMY', 'minYear' => date('Y'), 'maxYear' => date('Y') + 50));
        echo $this->Form->input('end_date', array('dateFormat' => 'DMY', 'minYear' => date('Y'), 'maxYear' => date('Y') + 50));

        //echo $this->Form->input('Exercise', array('type' => 'select','multiple' => 'checkbox')); 
        ?>
        <div class="input select">
            <input id="search_input" placeholder="Type to filter">
        </div>
        <table id="search_list" cellpadding="0" cellspacing="0">
            <tr> 
                <th>Exercise</th>
                <th>Image</th>
                <th>Sets</th>
                <th>Reps</th>
                <th>Rest</th>
            </tr>
            <tr>
                <?php
                $i = 0;
                //for loop for body parts
                foreach ($exercises as $eb):
                    ?> 


                    <td> <?php
                    echo $this->Form->input("Exercise.Exercise.$i.", array(
                        'type' => 'checkbox',
                        //'multiple' => 'checkbox',
                        'label' => $eb['Exercise']['name'],
                        'value' => $eb['Exercise']['id'],
                        'before' => '<div class="checkbox">',
                        'after' => '</div>',
                        'hiddenField' => false,
                        'div' => false
                    ));
                    ?>
                    </td>   
                        <?php foreach ($eb['Instruction'] as $instruction): ?>
                        <td>
                            <?php
                            if ($instruction['image'] != null) {
                                //echo $instruction['image']."<br /><br />"; 
                                echo $this->Html->image('files/' . $instruction['image'], array('width' => 50, 'height' => 50));
                            } else {
                                echo "no image available";
                            }
                            /// echo "no image available"; 
                            break;
                            ?>
                            &nbsp;

                        </td>
                    <?php endforeach; ?>
                    <td> <?php
                    echo $this->Form->input("Exercise.Exercise.$i.program.", array(
                        'type' => 'select',
                        'label' => 'Sets:',
                        'options' => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17),
                        'default' => 5,
                        //'before' => " ",
                        // 'after' => '</div>',
                        'hiddenField' => false,
                        'div' => false
                    ));
                    ?>
                    </td>
                    <td> <?php
                    echo $this->Form->input("Exercise.Exercise.$i.program.", array(
                        'type' => 'select',
                        'label' => 'Reps:',
                        'options' => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17),
                        'default' => 5,
                        //'before' => " ",
                        // 'after' => '</div>',
                        'hiddenField' => false,
                        'div' => false
                    ));
                    ?>
                    </td>
                    <td> <?php
                    echo $this->Form->input("Exercise.Exercise.$i.program.", array(
                        'type' => 'select',
                        'label' => 'Rest:',
                        'options' => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17),
                        'default' => 5,
                        //'before' => " ",
                        // 'after' => '</div>',
                        'hiddenField' => false,
                        'div' => false
                    ));
                    ?>
                    </td>
                </tr>
                <?php $i++; ?>

<?php endforeach; ?>


        </table>
<?php echo $this->Form->end(__('Submit')); ?>
    </fieldset>

</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('List Programs'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Form->submit(__('Use Template', true), array('name' => 'Cancel','div' => false)); ?></li>
    </ul>
</div>
