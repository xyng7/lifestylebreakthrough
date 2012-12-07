<div class="users form">
    <?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('Edit Admin'); ?></legend>        
        <?php
        echo $this->Form->input('id',array('type' =>  'hidden'));
        echo $this->Form->input('username');
        echo $this->Form->input('password');
        echo $this->Form->input('password_confirm', array('type' => 'password'));
        echo $this->Form->input('role', array('options' => array('admin' => 'Admin', 'superadmin' => 'Superadmin')));
        //echo $this->Form->input('User.id',array('type' => 'hidden');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>
    <div class="actions">

    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
        <li><?php 
        if(($id=$this->Session->read('Auth.User.id')) !==  ($this->Form->value('User.id'))){
            echo $this->Form->postLink(__('Archive User'), array('action' => 'delete', $this->Form->value('User.id')), null, __('Are you sure you want to archive %s?', $this->Form->value('User.username'))); ?></li>
         <?php  } ?>
        
    </ul>
</div>
