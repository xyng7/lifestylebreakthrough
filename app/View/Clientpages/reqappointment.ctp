<div class="users form"> 

    <?php echo $this->Form->create('reqappointment'); ?>	
    
    <ul>
        <fieldset>
            <legend><?php echo __('Appointment Request'); ?></legend>
            <?php
            //debug($client);
            //$firstname = $client['Client']["first_name"];
           // $lastname = $client['Client']["last_name"];
            echo __("Name: $firstname $lastname");
            echo $this->Form->input('prefcontact', array('type' => 'select', 'label' => 'Prefered Contact', 'options' => array('Home' => 'Home', 'Mobile' => 'Mobile', 'Email' => 'Email')));
            echo $this->Form->input('prefdate', array('type' => 'date', 'label' => 'Prefered Date', 'dateFormat' => 'DMY', 'minYear' => date('Y'), 'maxYear' => date('Y') + 5));
            echo $this->Form->input('prefvenue', array('type' => 'select', 'label' => 'Prefered Venue', 
                 'options' => array("Brighton Family and Women's Clinic" => "Brighton Family and Women's Clinic", 
                                     'North Road Medical' => 'North Road Medical',
                                     'Toorak Medical Centre' => 'Toorak Medical Centre',
                                     'Caulfield General Medical Centre' => 'Caulfield General Medical Centre',
                                     'Lifestyle Breakthrough Clinic' => 'Lifestyle Breakthrough Clinic'
                     
                     )));
            echo $this->Form->input('prefstaff', array('type' => 'select', 'label' => 'Prefered Staff', 'options' => array('Angus' => 'Angus', 'Nathan' => 'Nathan')));
            echo $this->Form->input('preftime', array('type' => 'select', 'label' => 'Prefered Time','multiple' => 'checkbox', 'options' => array('Morning' => 'Morning', 'Noon' => 'Noon', 'Late Afternoon' => 'Late Afternoon', 'Evening' => 'Evening')));
            ?>

            <?php echo $this->Form->end(__('Submit')); ?>
            
        </fieldset>
    </ul>
</div>