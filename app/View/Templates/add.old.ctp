<?php
echo $this->Html->script(array('jquery-1.8.3', 'datepicker/jquery-ui', 'jquery.fastLiveFilter'));
echo $this->Html->CSS(array('datepicker/jquery-ui'));
?>
<!-- start -->
<?php
echo $this->Html->script('DatePicker');
echo $this->Html->css('datepicker/jquery-ui-1.8.23.custom');
?>

<!-- end -->
<script>
    $(function() {
        $('#search_input').fastLiveFilter('#search_list');
    });
</script>

<div class="programs form">
    <?php echo $this->Form->create('Template'); ?>
    <fieldset>
        <legend><?php echo __('Add Template'); ?></legend>
        <table cellpadding = "0" cellspacing = "0">          
            <tr>
         
                <th> <?php echo $this->Form->input('name'); ?> </th> 
            </tr>
        </table>

        <table>
            <tr>
                <th> <?php echo $this->Form->input('notes'); ?> </th> 
            </tr>
        </table>   
     
        <table id="js-datatable" cellpadding="0" cellspacing="0">
            <thead>
            <tr> 
                <th>Exercise</th>
                <th>Image</th>
                <th>Sets</th>
                <th>Reps</th>
                <th>Rest(Sec)</th> 
                <th>Load(Kg)</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <?php
                $i = 0;
                //for loop for body parts
                
                foreach ($exercises as $eb):
                    ?> 


                    <td> <?php
                echo $this->Form->input("Template.Exercise.$i.", array(
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
                    
                        <td>
                            <?php if($eb['Exercise']['start_pic'] != null) 
                                { 
                                //echo $instruction['image']."<br /><br />"; 
                                echo $this->Html->image('files/'.$eb['Exercise']['start_pic'], array('width' => 50, 'height' => 50)); 
                                } 
                                else 
                                { 
                                echo "no image available"; 
                                }
	 
                                ?>&nbsp;
                        </td>
               
                    <td> <?php
                    echo $this->Form->input("Template.Exercise.$i.program.", array(
                    'type' => 'text',
                    'label' => 'Sets:',
                    //'options' => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17),
                    'default' => '4-5',
                    //'before' => " ",
                    // 'after' => '</div>',
                    'hiddenField' => false,
                    'div' => false
                ));
                    ?>
                    </td>
                    <td> <?php
                    echo $this->Form->input("Template.Exercise.$i.program.", array(
                        'type' => 'text',
                        'label' => 'Reps:',
                        //'options' => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17),
                        'default' => '12-14',
                        //'before' => " ",
                        // 'after' => '</div>',
                        'hiddenField' => false,
                        'div' => false
                    ));
                    ?>
                    </td>
                    <td> <?php
                    echo $this->Form->input("Template.Exercise.$i.program.", array(
                        'type' => 'select',
                        'label' => 'Rest:',
                        'options' => array('5' => '5', '10' => '10', '15' => '15', '20' => '20', '25' => '25', '30' => '30', '35' => '35', '40' => '40', '45' => '45', '50' => '50', '55' => '55', '60' => '60', '65' => '65', '70' => '70', '75' => '75', '80' => '80', '85' => '85', '90' => '90'),
                        'default' => 30,
                        //'before' => " ",
                        // 'after' => '</div>',
                        'hiddenField' => false,
                        'div' => false
                    ));
                    ?>
                    </td>
                    <td> <?php
                    echo $this->Form->input("Template.Exercise.$i.program.", array(
                        'type' => 'select',
                        'label' => 'Load:',
                        'options' => array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25'),
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
</tbody>
            <?php endforeach; ?>


        </table>
        
        <?php echo $this->Form->end(__('Submit')); ?>
    </fieldset>

</div>
    <div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('List Templates'), array('action' => 'index')); ?></li>
      
    </ul>
</div>
