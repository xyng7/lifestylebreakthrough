<?php echo $this->Html->script('ckeditor/ckeditor'); ?>

<script type="text/javascript">
    var ck_newsContent = CKEDITOR.replace( 'content',{
        filebrowserWindowWidth : '100',
        filebrowserWindowHeight : '900'
    } ); 
</script>

<div class="form">

    <?php echo $this->Form->create('Newsletter'); ?>
    <fieldset>
        <legend><?php echo __('Add Newsletter'); ?></legend>
        <?php echo $this->Form->input('title'); ?>
        <?php echo $this->Form->input('content', array('id' => 'content', 'class' => 'ckeditor')); ?> 
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>

<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('List Newsletters'), array('action' => 'index')); ?></li>
    </ul>
</div>
