    <div style="float: right; width: 60%; margin-right: 100px;">   
    <div style="width:300px;">
<?php echo $this->Session->flash(); ?></div>
     <?php echo $this->Session->flash('auth'); ?>
    <?php echo $this->Form->create('User'); ?>	
    <h4><?php echo __('Lifestyle Breakthrough Newsletter'); ?></h4>
    <h5><?php echo __('To unsubscribe from our newsletter, please enter your email address below'); ?></h5>
    <ul>
    <fieldset style="width: 50%;">
    <?php
        echo $this->Form->input('address', array('type' => 'text', 'label' => 'Email Address')); 
        echo $this->Form->end(__('Submit')); ?>

    </fieldset>
    </ul>
    </div>
