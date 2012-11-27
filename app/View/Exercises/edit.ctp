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

    <?php echo $this->Form->create('Exercise'); ?>
    <fieldset>
        <legend><?php echo __('Edit Exercise'); ?></legend>
        <?php
        echo $this->Form->input('id');
        echo $this->Form->input('name');
        echo $this->Form->input('videos', array('label' => 'Video: enter Youtube embedded link below'));
        ?>
        
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
        <li><?php echo $this->Html->link(__('Back'), array('action' => 'view', $exercise['Exercise']['id'])); ?></li>
        <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Exercise.id')), null, __('Are you sure you want to delete # %s? This exercise may be related to many programs', $this->Form->value('Exercise.name'))); ?></li>

    </ul>
</div>
