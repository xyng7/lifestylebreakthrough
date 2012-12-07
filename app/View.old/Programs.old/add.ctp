
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

<div class="programs form">
    <?php echo $this->Form->create('Program'); ?>
    <fieldset>
        <legend><?php echo __('Add Program'); ?></legend>
        <table cellpadding = "0" cellspacing = "0">          
            <tr>
                <th> <?php echo $this->Form->input('client_id'); ?> </th>
                <th> <?php echo $this->Form->input('name'); ?> </th> 
            </tr>
        </table>

        <table cellpadding = "0" cellspacing = "0">          
            <tr>
                <th> <?php echo $this->Form->input('start_date', array('dateFormat' => 'DMY', 'minYear' => date('Y'), 'maxYear' => date('Y') + 50)); ?> </th>
                <th> <?php echo $this->Form->input('end_date', array('dateFormat' => 'DMY', 'minYear' => date('Y'), 'maxYear' => date('Y') + 50)); ?> </th> 
            </tr>
        </table>     
        <!--//        echo $this->Form->input('client_id');
        //        echo $this->Form->input('name');
        //        echo $this->Form->input('start_date', array('dateFormat' => 'DMY', 'minYear' => date('Y'), 'maxYear' => date('Y') + 50));
        //        echo $this->Form->input('end_date', array('dateFormat' => 'DMY', 'minYear' => date('Y'), 'maxYear' => date('Y') + 50));
                echo $this->Form->input('Exercise', array('type' => 'select','multiple' => 'checkbox'));-->

        <input id="search_input" placeholder="Type to filter">
        <ul id="search_list" style="list-style-type: none">
            <table border="0" cellpadding = "0" >            
                <tr>
                    <th>Exercises</th>
                </tr>
                <tr>
                    <td>
                        <?php
                        //for loop for body parts
                        foreach ($program_exercise as $pe) {
                            echo $this->Form->input('Exercise', array(
                                'type' => 'checkbox',
                                'label' => $pe['Exercise']['name'],
                                'value' => $pe['Exercise']['id'],
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
                </tr>
            </table>
        </ul>

    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Html->link(__('List Programs'), array('action' => 'index')); ?></li>

    </ul>
</div>
