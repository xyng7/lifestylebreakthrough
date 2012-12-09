


    <div style="float: right; width: 60%; margin-right: 100px;">   
    <div style="width:300px;">
<?php echo $this->Session->flash(); ?></div>
     <?php echo $this->Session->flash('auth'); ?>
    <?php echo $this->Form->create('User'); ?>	
    <h4><?php echo __('Forgot Password?'); ?></h4>
    <h5><?php echo __('Please enter your email address or username'); ?></h5>
    <ul>
    <fieldset style="width: 50%;">
    <?php
        echo $this->Form->input('username');
     //   echo $this->Form->input('password');
    ?>
    
    <?php echo $this->Form->end(__('Reset Password')); ?>
    <?php echo $this->Html->link(__('Back to login'), array('action' => 'login')); ?>
    </fieldset>
    </ul>
    </div>
