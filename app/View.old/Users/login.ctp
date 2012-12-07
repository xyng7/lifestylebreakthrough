
    <div style="float: right; width: 60%; margin-right: 100px;">   
    <div style="width:300px;">
<?php echo $this->Session->flash(); ?></div>
     <?php echo $this->Session->flash('auth'); ?>
    <?php echo $this->Form->create('User'); ?>	
    <h4><?php echo __('Welcome! Please login to continue'); ?></h4>
    <ul>
    <fieldset style="width: 50%;">
    <?php
        echo $this->Form->input('username');
        echo $this->Form->input('password');
    ?>
    
    <?php echo $this->Form->end(__('Login')); ?>
    <?php echo $this->Html->link(__('Fogot password?'), array('action' => 'forgotpassword')); ?>
    </fieldset>
    </ul>
    </div>
        
    


