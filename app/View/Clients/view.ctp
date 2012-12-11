<div class="clients view">
<h3><?php  echo __('Client'); ?></h3>
<!--	<table id="gradient-style" cellpadding = "0" cellspacing = "0">
	<tr>    
            <th><?php echo __('First Name'); ?></th>
            <th><?php echo __('Last Name'); ?></th>
            <th><?php echo __('Email'); ?></th>
            <th><?php echo __('Date of Birth'); ?></th>
            <th><?php echo __('Phone'); ?></th>
            <th><?php echo __('Mobile'); ?></th>
            <th><?php echo __('Address'); ?></th>
            <th><?php echo __('Suberb'); ?></th>
            <th><?php echo __('Postal'); ?></th>
               </tr>
        <tr>
            <td><?php echo h($client['Client']['first_name']); ?></td>
            <td><?php echo h($client['Client']['last_name']); ?></td>
            <td><?php echo h($client['Client']['email']); ?></td>
            <td><?php echo $this->Time->format('d-m-Y', h($client['Client']['dob'])); ?></td>
            <td><?php echo h($client['Client']['phone']); ?></td>
            <td><?php echo h($client['Client']['mobile']); ?></td>
            <td><?php echo h($client['Client']['address']); ?></td>
            <td><?php echo h($client['Client']['suburb']); ?></td>
            <td><?php echo h($client['Client']['postal']); ?></td>
        </tr> -->
        </table> 
    <dl>
		<dt><?php echo __('First Name'); ?></dt>
		<dd>
			<?php echo h($client['Client']['first_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Name'); ?></dt>
		<dd>
			<?php echo h($client['Client']['last_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($client['Client']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dob'); ?></dt>
		<dd>
			<?php echo $this->Time->format('d-m-Y', h($client['Client']['dob'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($client['Client']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mobile'); ?></dt>
		<dd>
			<?php echo h($client['Client']['mobile']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($client['Client']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Suburb'); ?></dt>
		<dd>
			<?php echo h($client['Client']['suburb']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Postal'); ?></dt>
		<dd>
			<?php echo h($client['Client']['postal']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
    <div class="actions">

	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php //echo $this->Html->link(__('Edit Client'), array('action' => 'edit', $client['Client']['id'])); ?> </li>
                <li><?php echo $this->Html->link(__('Resend Email'), array('action' => 'resendwelcome', $client['Client']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Clients'), array('action' => 'index')); ?> </li>
		<li><?php //if (AuthComponent::user('role') === 'superadmin') {
                    //echo $this->Html->link(__('New Client'), array('action' => 'add')); }?> </li>
	</ul>
</div>
