<?php
echo $this->Html->script(array('jquery-1.8.3', 'datepicker/jquery-ui', 'jquery.fastLiveFilter', 'DatePicker'));
echo $this->Html->CSS(array('datepicker/jquery-ui','datepicker/jquery-ui-1.8.23.custom'));
?>
    <script>
    $(document).ready(function() {
        $("#datepicker").datepicker({
            dateFormat : 'yy-mm-dd', altFormat : 'yy-mm-dd'
        });
        $("#datepicker2").datepicker({
            dateFormat : 'yy-mm-dd', altFormat : 'yy-mm-dd'
        });
    });
    
</script>


<div class="programs index">
    <?php echo $this->Form->create('Program'); ?>
    <fieldset>
        <legend><?php echo __('Add Program'); ?></legend>

        <table cellpadding = "0" cellspacing = "0">          
            <tr>
                <th> <?php echo $this->Form->input('client_id', array('type' => 'select', 'options' => $clients)); ?> </th>
                <th> <?php echo $this->Form->input('name'); ?> </th> 
            </tr>
        </table>

        <table cellpadding = "0" cellspacing = "0">          
            <tr>
                <th> <?php echo $this->Form->input('start_date', array('id' => 'datepicker', 'class' => 'datepicker', 'type' => 'text', 'label' => array('text' => '<p align="left">Start Date</p>', 'style' => 'align:left'))); ?>
                <th> <?php echo $this->Form->input('end_date', array('id' => 'datepicker2', 'class' => 'datepicker2', 'type' => 'text', 'label' => array('text' => '<p align="left">End Date</p>', 'style' => 'align:left'))); ?>
            </tr>
        </table>

        <?php
        if ($usetemp == true) {
            $notes = $template['Template']['notes'];
        } else {
            $notes = null;
        }
        ?>

        <table>
            <tr>
                <th> <?php echo $this->Form->input('notes', array('default' => $notes)); ?> </th> 
            </tr>
        </table> 
        <?php
        echo $this->Html->script('datatables/jquery.dataTables.min');
        echo $this->Html->css('jquery.dataTables');
        ?>
        <script>
               $(document).ready(function(){
                       $('#js-datatable').dataTable({
                    "bPaginate": false,
                    "bInfo": false
                });
               });
        </script>        
        <table id="js-datatable" cellpadding="0" cellspacing="0">
            <thead>
                <tr> 
                    <th><?php echo h('Exercise'); ?></th>
                    <th><?php echo h('Image'); ?></th>
                    <th><?php echo h('Sets'); ?></th>
                    <th><?php echo h('Reps'); ?></th>
                    <th><?php echo h('Rest(Sec)'); ?></th>
                    <th><?php echo h('Load(Kg)'); ?></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
               <tr>
                    <?php
                    $i = 0;
                    //for loop for body parts
                    foreach ($exercises as $eb){
                        if ($usetemp == true) {
                            //  debug($template);                          
                            foreach ($template['Exercise'] as $templates) {
                                if ($eb['Exercise']['id'] === $templates['id']) {
                                    // debug($existex);
                                    $checked = true;
                                    $setsdef = $templates['ExercisesTemplate']['rec_sets'];
                                    $repsdef = $templates['ExercisesTemplate']['rec_reps'];
                                    $resdef = $templates['ExercisesTemplate']['rec_res'];
                                    $resload = $templates['ExercisesTemplate']['rec_load'];
                                    break;
                                } else {
                                    $checked = false;
                                    $setsdef = '4-5';
                                    $repsdef = '12-14';
                                    $resdef = 30;
                                    $resload = 5;
                                }
                            }
                        } else {
                            $checked = false;
                            $setsdef = '4-5';
                            $repsdef = '12-14';
                            $resdef = 30;
                            $resload = 5;
                        }
                        ?> 

                        <td> <?php
                    echo $this->Form->input("Exercise.Exercise.$i.", array(
                        'type' => 'checkbox',
                        'default' => $checked,
                        'label' => $eb['Exercise']['name'],
                        'value' => $eb['Exercise']['id'],
                        'hiddenField' => false,
                        'div' => false
                    ));
                        ?>
                        </td>

                        <td>
                            <?php
                            if ($eb['Exercise']['start_pic'] != null) {
                                //echo $instruction['image']."<br /><br />"; 
                                echo $this->Html->image('../imgfiles/' . $eb['Exercise']['start_pic'], array('width' => 50, 'height' => 50));
                            } else {
                                echo "no image available";
                            }
                            ?>
                        </td>

                        <td> <?php
                        echo $this->Form->input("Exercise.Exercise.$i.program.", array(
                            'type' => 'text',
                            'label' => 'Sets:',
                            //'options' => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17),
                            'default' => $setsdef,
                            //'before' => '<li>',
                            //'after' => '</li>',
                            'hiddenField' => false,
                            'div' => false
                        ));
                            ?>
                        </td>
                        <td> <?php
                        echo $this->Form->input("Exercise.Exercise.$i.program.", array(
                            'type' => 'text',
                            'label' => 'Reps:',
                            //'options' => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17),
                            'default' => $repsdef,
                            //'before' => '<li>',
                            //'after' => '</li>',
                            'hiddenField' => false,
                            'div' => false
                        ));
                            ?>
                        </td>
                        <td> <?php
                        echo $this->Form->input("Exercise.Exercise.$i.program.", array(
                            'type' => 'select',
                            'label' => 'Rest:',
                            'options' => array('5' => '5', '10' => '10', '15' => '15', '20' => '20', '25' => '25', '30' => '30', '35' => '35', '40' => '40', '45' => '45', '50' => '50', '55' => '55', '60' => '60', '65' => '65', '70' => '70', '75' => '75', '80' => '80', '85' => '85', '90' => '90'),
                            'default' => $resdef,
                            //'before' => '<li>',
                            //'after' => '</li>',
                            'hiddenField' => false,
                            'div' => false
                        ));
                            ?>
                        </td>
                        <td> <?php
                        echo $this->Form->input("Exercise.Exercise.$i.program.", array(
                            'type' => 'select',
                            'label' => 'Load:',
                            'options' => array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25'),
                            'default' => $resload,
                            //'before' => '<li>',
                            //'after' => '</li>',
                            'hiddenField' => false,
                            'div' => false
                        ));
                            ?>
                        </td>
                        <td><?php foreach ($eb['BodyPart'] as $bodyparts) {
                           
                            //debug("\n\n".$bodyparts['body_part']);
                           
                        echo $this->Form->input("Bodyparts", array('type' => 'hidden', 'default' => $bodyparts['body_part']));
                           
                        }
                        
                        ?></td>
                        <td><?php foreach ($eb['Category'] as $categories) {
                           
                  
                           
                        echo $this->Form->input("Bodyparts", array('type' => 'hidden', 'default' => $categories['category']));
                           
                        }
                        
                        ?></td>
                        <td><?php foreach ($eb['Equipment'] as $equipments) {
                           
                           // debug($eb);
                           
                        echo $this->Form->input("Bodyparts", array('type' => 'hidden', 'default' => $equipments['equipment']));
                           
                        }
                        
                        ?></td>
                    </tr>
                    <?php $i++; ?>
                <?php } ?>
            </tbody>
        </table>
<?php echo $this->Form->end(__('Submit')); ?>
    </fieldset>
</div>

<script type=text/javascript src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script type="text/javascript">
    var $j = jQuery.noConflict(); 
(function($){
    $j.fn.dynamicNav=function(options){
     
     var defaults = {
      direction:"up", 
      duration:100  
      };   
      
    var opts = $j.extend(defaults, options);
       
    this.each(function(){
     var navList=$j(this).find("li"),
      navLink=navList.find("a");
            
      navList.wrapInner("<span></span>");
         
      var span=navLink.parent();

      if(opts.direction=="up" || opts.direction=="down"){
       var v=true;
          }

      if(opts.direction=="right" || opts.direction=="down"){
       var restSpan=true;
         }
         
       navLink.each(function(){

       var w=$j(this).outerWidth(),
        p=$j(this).parent();

       $j(this).clone().appendTo(p).addClass("over");

        if(v){    
          p.css("width",w);          
              }else{
          p.css("width",2*w).parent().css("width",w); 
          }
               
          });

      if(restSpan){
      span.each(function(){
             
         if(opts.direction=="right"){
         $j(this).css({"margin-left":-$j(this).outerWidth()/2});
         }
              
        if(opts.direction=="down"){
         $j(this).css({"margin-top" : -$j(this).outerHeight()/2});
         }
              
        $j(this)
        .find('a')
        .last()
        .removeClass("over")
        .prev()
        .addClass("over");
       });
         }

      function over(o){
         o.animate(v?{"margin-top": -o.outerHeight()/2}:{"margin-left": -o.outerWidth()/2}, opts.duration);
          }

      function out(o){
       o.animate(v?{"margin-top":0}:{"margin-left": 0}, opts.duration);
         }

      span.hover(function(){
          restSpan ? out($j(this)) : over($j(this));
           },function(){
            restSpan ? over($j(this)) : out($j(this));
           });
         
     });
   };
     
 })(jQuery);

    $j(function(){

     $j("#nav1").dynamicNav({
        direction:"left", 
        duration:300  
        });

     $j("#nav2").dynamicNav({
        direction:"right", 
        duration:200  
        });

     $j("#nav3").dynamicNav({
        direction:"up", 
        duration:100 
        });

     $j("#nav4").dynamicNav({
        direction:"down",
        duration:400
        });
     });

</script>
    <div class="actions">
        <div class="navx" id="nav3">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('List Programs'), array('action' => 'index')); ?></li>
<?php echo $this->Form->create('temp', array('style' => 'width: 30%')); ?>

        <fieldset>
            <legend>Template</legend>
<?php echo $this->Form->input('tempchoice', array('type' => 'input', 'label' => '', 'options' => $xyz)); ?>
<?php echo $this->Form->submit(__('Use template', true), array('name' => 'delimg2', 'div' => false)); ?>
            <br>
        </fieldset>

    </ul>
</div>

