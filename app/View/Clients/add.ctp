<?php echo $this->Html->script(array('jquery.jeditable.mini', 'jquery.min.js')); ?>

<div class="clients form">   
    <?php echo $this->Form->create('Client'); ?>
    <fieldset>
        <legend><?php echo __('Add Client'); ?></legend>

        <table cellpadding = "0" cellspacing = "0">          
            <tr>
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

    <h6>
        <?php echo __('Adding a client will automatically generate client username (from email) and password (from date of birth)'); ?>
    </h6>
    <?php echo $this->Form->end(__('Add Client', array('onSubmit' => 'validate()'))); ?>
</div>


<script type="text/javascript">
    function search(type){
        var areaval = '';
        if(type == 'postcode'){
            areaval = $('#ClientPostal').val();
        } else{
            areaval = $('#ClientSuburb').val();
        }
        $.get(location+'../../../postcodes/search/'+type+'/'+ areaval,
        //$url = Router::url( array('controller'=>'postcodes','action'=>'search'), true ).'/'.$key.'#'.$hash;
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




