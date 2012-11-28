<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Edit My Details'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('username'); 
                echo $this->Form->input('old_password', array('type' => 'password'));
                echo $this->Form->input('password', array('type' => 'password', 'label' => 'New Password'));
		echo $this->Form->input('new_password_confirm', array('type' => 'password'));
	?>
<!--<div class="passwordAlert"> 
          <?php 
                echo $this->Form->input('password', array('onkeyup' =>  '', 'type' => 'password', 'label' => 'New Password'));
		echo $this->Form->input('new_password_confirm', array('onkeyup' => '' , 'type' => 'password'));
	?>
</div>-->
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
	</ul>
</div>

<!--<script type="text/javascript">
function checkPass()
{
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('password');
    var pass2 = document.getElementById('new_password_confirm');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field 
    //and the confirmation field
    if(pass1.value == pass2.value){
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!"
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
    }
} 
    </script>-->