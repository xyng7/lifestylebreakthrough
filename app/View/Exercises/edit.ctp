<div class="exercises form">
    <?php
    echo $this->Html->script(array('jquery-1.8.3', 'jquery.fastLiveFilter'));
    ?>
    <style>
        label{
            display:inline
        }
    </style>
    <script>
        $(function() {
            $('#search_input').fastLiveFilter('#search_list');
        });
    </script>

    <?php echo $this->Form->create('Exercise', array('enctype' => 'multipart/form-data')); ?>
    <fieldset>
        <legend><?php echo __('Edit Exercise'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('name'); 
        echo $this->Form->input('instructions'); ?>
        <table>
            <tr>
                <th><?php echo __('Start Picture'); ?> </th>
                <th>    <?php echo __('End Picture'); ?> </th>
            </tr>
            <tr>
                <td>
                <?php
                if($exercise['Exercise']['start_pic'] != null) 
                    { 
                        echo $this->Html->image('../imgfiles/'.$exercise['Exercise']['start_pic'], array('width' => 200, 'height' => 200));
                        //echo $this->Html->link(__('Delete Image'), array('action' => 'deleteImage', $exercise['Exercise']['id'], 'start_pic'));
                        echo $this->Form->submit(__('Delete Image', true), array('name' => 'delimg1','div' => false)); 
                        //echo $this->Html->image('files/'.$instruction['Instruction']['image']); 
                    } 
                else 
                    { 
                            echo "no image available"; 
                    } ?>
                <br><br>    
                <?php echo $this->Form->file('start_pic', array('label' => 'Start Picture', 'size'=>'100')); ?>
                </td>
                <td>
                <?php
                if($exercise['Exercise']['end_pic'] != null) 
                    { 
                        echo $this->Html->image('../imgfiles/'.$exercise['Exercise']['end_pic'], array('width' => 200, 'height' => 200));
                        //echo $this->Html->link(__('Delete Image'), array('action' => 'deleteImage', $exercise['Exercise']['id'], 'end_pic'));
                        echo $this->Form->submit(__('Delete Image', true), array('name' => 'delimg2','div' => false)); 
                        //echo $this->Html->image('files/'.$instruction['Instruction']['image']); 
                    } 
                else 
                    { 
                            echo "no image available"; 
                    }?>
                <br><br>
               <?php echo $this->Form->file('end_pic', array('label' => 'End Picture', 'size'=>'100')); ?>
                
                </td>
            </tr>
        </table>
       <?php  echo $this->Form->input('videos', array('label' => 'Video: enter Youtube embedded link below')); ?>
        
                        <table cellpadding = "0" cellspacing = "0">
                <tr>
                       
                      <td><?php echo $this->Form->input('BodyPart', array(
                            'multiple' => 'checkbox')); ?></td>
                      <td> <?php echo $this->Form->input('Category', array(
                            'multiple' => 'checkbox')); ?></td>
                      <td> <?php echo $this->Form->input('Equipment', array(
                            'multiple' => 'checkbox')); ?> </td>
                </tr>
                
                </table>
        
        <!-- filter
        <input id="search_input" placeholder="Type to filter">
        <ul id="search_list" style="list-style-type: none">
            <table border="0" cellpadding = "0" >            
                <tr>
                    <th>Body Part</th>
                    <th>Category</th>
                    <th>Equipment</th>
                </tr>
                <tr>
                    <td>
                        <?php
                        //for loop for body parts
                        foreach ($exercise_bodyparts as $eb) {
                            echo $this->Form->input('BodyPart.BodyPart.', array(
                                'type' => 'checkbox',
                                'label' => $eb['BodyPart']['body_part'],
                                'value' => $eb['BodyPart']['id'],
                                'before' => '<li>',
                                'after' => '</li>',
                                'hiddenField' => false,
                                'div' => false,
                                'style' => 'display:inline'
                            ));
                        }
                        ?>
                        </ul>
                    </td>
                    <td>
                        <?php
                        //for loop for categories
                        foreach ($exercise_categories as $ec) {
                            echo $this->Form->input('Category.Category.', array(
                                'type' => 'checkbox',
                                'label' => $ec['Category']['category'],
                                'value' => $ec['Category']['id'],
                                'before' => '<li>',
                                'after' => '</li>',
                                'hiddenField' => false,
                                'div' => false,
                            ));
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        //for loop for equipment
                        foreach ($exercise_equipment as $ee) {
                            echo $this->Form->input('Equipment.Equipment.', array(
                                'type' => 'checkbox',
                                'label' => $ee['Equipment']['equipment'],
                                'value' => $ee['Equipment']['id'],
                                'before' => '<li>',
                                'after' => '</li>',
                                'hiddenField' => false,
                                'div' => false
                            ));
                        }
                        ?>
                    </td>
                </tr>
            </table>
        </ul>-->



<?php echo $this->Form->end(__('Submit')); ?>
    </fieldset>
</div>
    <div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('List Exercises'), array('action' => 'index', $exercise['Exercise']['id'])); ?></li>
<!--        <li>?php                     if (AuthComponent::user('role') === 'superadmin') {
            echo $this->Form->postLink(__('Delete Exercise'), array('action' => 'delete', $this->Form->value('Exercise.id')), null, __('Are you sure you want to delete # %s? This exercise may be related to many programs', $this->Form->value('Exercise.name'))); } ?>
        </li>-->

    </ul>
</div>
