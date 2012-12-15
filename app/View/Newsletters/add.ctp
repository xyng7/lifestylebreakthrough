<div class="row">
    <div class="twelve mobile-twelve columns">
<div class="form">

    <?php echo $this->Form->create('Newsletter'); ?>
    <fieldset>
        <?php echo $this->Html->script('ckeditor/ckeditor'); ?>
        <legend><?php echo __('Add Newsletter'); ?></legend>
        <?php echo $this->Form->input('title'); ?>
        <?php //echo $this->Form->input('content', array('id' => 'content', 'class' => 'ckeditor')); ?> 
        <?php echo $this->Form->input('content', array('id' => 'content', 'escape' => false,'rows' => '500', 'cols' => '900', 'label'=>'Content','class'=>'ckeditor')); ?>       
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>

    <div class="actions">

    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('List Newsletters'), array('action' => 'index')); ?></li>
    </ul>
</div>
            </div>
        </div>
