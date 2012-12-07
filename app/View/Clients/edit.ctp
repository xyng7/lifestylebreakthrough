<?php echo $this->Html->script(array('jquery.jeditable.mini', 'jquery.min.js')); ?>

<div class="clients form">   
    <?php echo $this->Form->create('Client'); ?>
    <fieldset>
        <legend><?php echo __('Edit Client'); ?></legend>

        <table cellpadding = "0" cellspacing = "0">          
            <tr>
                <th><?php echo $this->Form->input('id'); ?></th>
                <th><?php echo $this->Form->input('first_name'); ?></th>
                <th><?php echo $this->Form->input('last_name'); ?></th>                     
                <th><?php echo $this->Form->input('dob', array('dateFormat' => 'DMY', 'minYear' => date('Y') - 100, 'maxYear' => date('Y'))); ?></th>
            </tr>
        </table>

        <table cellpadding = "0" cellspacing = "0">  
            <tr>
                <th><?php echo $this->Form->input('email'); ?></th>
            </tr>
        </table>

        <table cellpadding = "0" cellspacing = "0">    
            <tr>
                <th><?php echo $this->Form->input('phone'); ?></th>
                <th><?php echo $this->Form->input('mobile'); ?></th>                     
            </tr>
        </table>

        <table cellpadding = "0" cellspacing = "0">  
            <tr>
                <th><?php echo $this->Form->input('address'); ?></th>
            </tr>
        </table>
        
        <table>
            <tr>
                <th><?php echo $this->Form->input('suburb'); ?></th>
                <th><?php echo $this->Form->input('postal', array('label' => 'Postcode')); ?></th>                     
            </tr>
        </table>
    </fieldset>


    <?php echo $this->Form->end(__('Save Client', array('onSubmit' => 'validate()'))); ?>
</div>

    <div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php if (AuthComponent::user('role') === 'superadmin') {
                    echo $this->Form->postLink(__('Archive Client'), array('action' => 'delete', $this->Form->value('Client.id')), null, __('Are you sure you want to archive # %s?', $this->Form->value('Client.first_name'))); 
                } ?></li>
		<li><?php echo $this->Html->link(__('List Clients'), array('action' => 'index')); ?></li>
	</ul>
</div>


<script type="text/javascript">
    function search(type){
        var areaval = '';
        if(type == 'postcode'){
            areaval = $('#ClientPostal').val();
        } else{
            areaval = $('#ClientSuburb').val();
        }
        $.get('http://localhost:8888/lifestylebreakthrough/postcodes/search/'+type+'/'+ areaval,
        //$.get('http://ie.infotech.monash.edu.au/project33/review/cakephp/postcodes/search/'+type+'/'+ areaval,
        function(data){
            console.log(data);
            if(type == 'postcode'){
                $('#ClientSuburb').val(data);
            } else{
                $('#ClientPostal').val(data);
            }
        }
    );
    }
    $('#ClientPostal').change(function(event){
        console.log('key pressed');
        search('postcode');
    });
    $('#ClientSuburb').change(function(event){
        console.log('key pressed');
        search('locality');
    });

 
</script>

