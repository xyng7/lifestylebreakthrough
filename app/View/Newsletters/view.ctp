<div class="newsletters view">
<h2><?php  echo __('Newsletter'); ?></h2>
	<dl style="width: auto;">
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($newsletter['Newsletter']['title']); ?>
			&nbsp;
		</dd>
                <dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($newsletter['Newsletter']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($newsletter['User']['username'], array('controller' => 'users', 'action' => 'view', $newsletter['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Content'); ?></dt>
		<dd style="width: 100%;">
			<?php 
                            //echo $this->HTML->css ($newsletter['Newsletter']['content']); 
                            echo $msg;
                            //echo $this->Html->script('ckeditor/ckeditor');
                            //echo $this->Form->input('content', array('id' => 'content', 'value' => $msg, 'escape' => false,'rows' => '500', 'cols' => '10000', 'label'=>'','class'=>'ckeditor'));
                        
                            ?>
			&nbsp;
		</dd>
		
	</dl>
</div>
    <div class="actions">

	<h3><?php echo __('Actions'); ?></h3>
	<ul>
<<<<<<< HEAD
               <li><?php echo $this->Html->link(__('List Newsletters'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Newsletter'), array('action' => 'delete', $newsletter['Newsletter']['id']), null, __('Are you sure you want to delete # %s?', $newsletter['Newsletter']['title'])); ?> </li>
=======
                            <li><?php echo $this->Html->link(__('List Newsletters'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Newsletter'), array('action' => 'delete', $newsletter['Newsletter']['id']), null, __('Are you sure you want to delete # %s?', $newsletter['Newsletter']['id'])); ?> </li>
>>>>>>> bug fixed on live server
		
	</ul>
</div>
