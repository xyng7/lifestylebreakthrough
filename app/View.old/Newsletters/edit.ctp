
<div class="row">
    <div class="twelve mobile-twelve columns">
<div class="form">

    <?php echo $this->Form->create('Newsletter'); ?>
    <fieldset>
        <?php echo $this->Html->script('ckeditor/ckeditor'); ?>
        <legend><?php echo __('Edit Newsletter'); ?></legend>
        <?php echo $this->Form->input('title', array('default' => $newsinfo[0]['Newsletter']['title'])); ?>
        <?php echo $this->Form->input('content', array('id' => 'content', 'value' => $newsinfo[0]['Newsletter']['content'], 'escape' => false,'rows' => '500', 'cols' => '900', 'label'=>'','class'=>'ckeditor')); ?>       
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>


<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Newsletter.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Newsletter.id'))); ?></li>
        <li><?php echo $this->Html->link(__('List Newsletters'), array('action' => 'index')); ?></li>
    </ul>
</div>
            </div>
        </div>

