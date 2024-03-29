<?php
echo $this->Html->script(array('jquery-1.8.3', 'datepicker/jquery-ui', 'jquery.fastLiveFilter'));
echo $this->Html->CSS(array('datepicker/jquery-ui'));
?>
<div class="users form"> 

    <?php echo $this->Form->create('reqappointment'); ?>	
    
    <ul>
        <fieldset>
            <legend><?php echo __('Appointment Request'); ?></legend>
            <?php
            //debug($client);
            //$firstname = $client['Client']["first_name"];
           // $lastname = $client['Client']["last_name"];
            echo __("Name: $firstname $lastname");
            echo $this->Form->input('prefcontact', array('type' => 'select', 'label' => 'Prefered Contact', 'options' => array('Home' => 'Home', 'Mobile' => 'Mobile', 'Email' => 'Email')));
            //echo $this->Form->input('prefdate', array('type' => 'date', 'label' => 'Prefered Date', 'dateFormat' => 'DMY', 'minYear' => date('Y'), 'maxYear' => date('Y') + 5));              
            echo $this->Form->input('prefdate', array('id' => 'datepicker', 'class' => 'datepicker', 'type' => 'text', 'label' => array('text' => 'Prefered Date', 'style' => 'align:left')));         
            echo $this->Form->input('prefvenue', array('type' => 'select', 'label' => 'Prefered Venue', 
                 'options' => $venues));
            echo $this->Form->input('comment', array('type' => 'textarea', 'label' => 'Comment'));
            echo $this->Form->input('preftime', array('type' => 'select', 'label' => 'Prefered Time','multiple' => 'checkbox', 'options' => array('Morning' => 'Morning', 'Noon' => 'Noon', 'Late Afternoon' => 'Late Afternoon', 'Evening' => 'Evening')));
            ?>

            <?php echo $this->Form->end(__('Submit')); ?>
            
        </fieldset>
    </ul>
</div>

<script>
    $(document).ready(function() {
        $("#datepicker").datepicker({
            dateFormat : 'dd-mm-yy', altFormat : 'yy-mm-dd'
        });
        $("#datepicker2").datepicker({
            dateFormat : 'yy-mm-dd', altFormat : 'yy-mm-dd'
        });
    });
</script>