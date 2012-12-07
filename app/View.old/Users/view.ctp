<div class="users view">
<h2><?php  echo __('User'); ?></h2>
	<dl>
	
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo __('**********'); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Role'); ?></dt>
		<dd>
			<?php echo h($user['User']['role']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo $this->Time->format('d-m-Y, H:i:s', h($user['User']['created'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo $this->Time->format('d-m-Y, H:i:s', h($user['User']['modified'])); ?>
			&nbsp;
		</dd>
                <dt><?php echo __('Last Login'); ?></dt>
		<dd>
			<?php if($user['User']['last_login'] != null) 
                                { 
                                echo $this->Time->format('d-m-Y, H:i:s', h($user['User']['last_login']));
                                } 
                                else 
                                { 
                                echo null; 
                                }
                    ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
                <li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
	</ul>
</div>
