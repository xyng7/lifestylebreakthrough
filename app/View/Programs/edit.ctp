<?php
echo $this->Html->script(array('jquery-1.8.3', 'datepicker/jquery-ui', 'jquery.fastLiveFilter', 'DatePicker'));
echo $this->Html->CSS(array('datepicker/jquery-ui','datepicker/jquery-ui-1.8.23.custom'));
?>
    <script>
    $(document).ready(function() {
        $("#datepicker").datepicker({
            dateFormat : 'yy-mm-dd', altFormat : 'yy-mm-dd'
        });
        $("#datepicker2").datepicker({
            dateFormat : 'yy-mm-dd', altFormat : 'yy-mm-dd'
        });
    });
    
</script>


<div class="programs index">
    <?php echo $this->Form->create('Program'); ?>
    <fieldset>
        <legend><?php echo __('Add Program'); ?></legend>

        <table cellpadding = "0" cellspacing = "0">          
            <tr>
                <th> <?php echo $this->Form->input('client_id', array('type' => 'select', 'options' => $clients)); ?> </th>
                <th> <?php echo $this->Form->input('name'); ?> </th> 
            </tr>
        </table>

        <table cellpadding = "0" cellspacing = "0">          
            <tr>
                <th> <?php echo $this->Form->input('start_date', array('id' => 'datepicker', 'class' => 'datepicker', 'type' => 'text', 'label' => array('text' => '<p align="left">Start Date</p>', 'style' => 'align:left'))); ?>
                <th> <?php echo $this->Form->input('end_date', array('id' => 'datepicker2', 'class' => 'datepicker2', 'type' => 'text', 'label' => array('text' => '<p align="left">End Date</p>', 'style' => 'align:left'))); ?>
            </tr>
        </table>
        <table>
            <tr>
                <th> <?php echo $this->Form->input('notes'); ?> </th> 
            </tr>
        </table> 
        <?php
        echo $this->Html->script('datatables/jquery.dataTables.min');
        echo $this->Html->css('jquery.dataTables');
        ?>
        <script>
               $(document).ready(function(){
                       $('#js-datatable').dataTable({
                    "bPaginate": false,
                    "bInfo": false
                });
               });
        </script>        
        <table id="js-datatable" cellpadding="0" cellspacing="0">
            <thead>
                <tr> 
                    <th><?php echo h('Exercise'); ?></th>
                    <th><?php echo h('Image'); ?></th>
                    <th><?php echo h('Sets'); ?></th>
                    <th><?php echo h('Reps'); ?></th>
                    <th><?php echo h('Rest(Sec)'); ?></th>
                    <th><?php echo h('Load(Kg)'); ?></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
               <tr>
                    <?php
                    $i = 0;
                    //for loop for body parts
                    foreach ($exercises as $eb){
                        
                        foreach ($program['Exercise'] as $existex )
                           {
                               if($eb['Exercise']['id'] === $existex['id'])
                               {
                                 // debug($existex);
                                   $checked = true;
                                  $setsdef = $existex['ExercisesProgram']['rec_sets'];
                                  $repsdef = $existex['ExercisesProgram']['rec_reps'];
                                  $resdef = $existex['ExercisesProgram']['rec_res'];
                                  $resload = $existex['ExercisesProgram']['rec_load'];
                                  break;
                               }
                              else{
                                   $checked = false;
                                   $setsdef = '4-5';
                                   $repsdef = '12-14';
                                   $resdef = 30;
                                   $resload = 5;
                              }
                           }
                        ?> 

                        <td> <?php
                    echo $this->Form->input("Exercise.Exercise.$i.", array(
                        'type' => 'checkbox',
                        'default' => $checked,
                        'label' => $eb['Exercise']['name'],
                        'value' => $eb['Exercise']['id'],
                        'hiddenField' => false,
                        'div' => false
                    ));
                        ?>
                        </td>

                        <td>
                            <?php
                            if ($eb['Exercise']['start_pic'] != null) {
                                //echo $instruction['image']."<br /><br />"; 
                                echo $this->Html->image('../imgfiles/' . $eb['Exercise']['start_pic'], array('width' => 50, 'height' => 50));
                            } else {
                                echo "no image available";
                            }
                            ?>
                        </td>

                        <td> <?php
                        echo $this->Form->input("Exercise.Exercise.$i.program.", array(
                            'type' => 'text',
                            'label' => 'Sets:',
                            //'options' => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17),
                            'default' => $setsdef,
                            //'before' => '<li>',
                            //'after' => '</li>',
                            'hiddenField' => false,
                            'div' => false
                        ));
                            ?>
                        </td>
                        <td> <?php
                        echo $this->Form->input("Exercise.Exercise.$i.program.", array(
                            'type' => 'text',
                            'label' => 'Reps:',
                            //'options' => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17),
                            'default' => $repsdef,
                            //'before' => '<li>',
                            //'after' => '</li>',
                            'hiddenField' => false,
                            'div' => false
                        ));
                            ?>
                        </td>
                        <td> <?php
                        echo $this->Form->input("Exercise.Exercise.$i.program.", array(
                            'type' => 'select',
                            'label' => 'Rest:',
                            'options' => array('5' => '5', '10' => '10', '15' => '15', '20' => '20', '25' => '25', '30' => '30', '35' => '35', '40' => '40', '45' => '45', '50' => '50', '55' => '55', '60' => '60', '65' => '65', '70' => '70', '75' => '75', '80' => '80', '85' => '85', '90' => '90'),
                            'default' => $resdef,
                            //'before' => '<li>',
                            //'after' => '</li>',
                            'hiddenField' => false,
                            'div' => false
                        ));
                            ?>
                        </td>
                        <td> <?php
                        echo $this->Form->input("Exercise.Exercise.$i.program.", array(
                            'type' => 'select',
                            'label' => 'Load:',
                            'options' => array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25'),
                            'default' => $resload,
                            //'before' => '<li>',
                            //'after' => '</li>',
                            'hiddenField' => false,
                            'div' => false
                        ));
                            ?>
                        </td>
                        <td><?php foreach ($eb['BodyPart'] as $bodyparts) {
                           
                            //debug("\n\n".$bodyparts['body_part']);
                           
                        echo $this->Form->input("Bodyparts", array('type' => 'hidden', 'default' => $bodyparts['body_part']));
                           
                        }
                        
                        ?></td>
                        <td><?php foreach ($eb['Category'] as $categories) {
                           
                  
                           
                        echo $this->Form->input("Bodyparts", array('type' => 'hidden', 'default' => $categories['category']));
                           
                        }
                        
                        ?></td>
                        <td><?php foreach ($eb['Equipment'] as $equipments) {
                           
                           // debug($eb);
                           
                        echo $this->Form->input("Bodyparts", array('type' => 'hidden', 'default' => $equipments['equipment']));
                           
                        }
                        
                        ?></td>
                    </tr>
                    <?php $i++; ?>
                <?php } ?>
            </tbody>
        </table>
<?php echo $this->Form->end(__('Submit')); ?>
    </fieldset>
</div>


<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php
            if (AuthComponent::user('role') === 'superadmin') {
                echo $this->Form->postLink(__('Archive'), array('action' => 'delete', $this->Form->value('Program.id')), null, __('Are you sure you want to archive # %s?', $this->Form->value('Program.name')));
            }
            ?></li>
        <li><?php echo $this->Html->link(__('List Programs'), array('action' => 'index')); ?></li>

    </ul>
</div>
