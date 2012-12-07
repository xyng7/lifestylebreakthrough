<?php
echo $this->Html->script(array('jquery-1.8.3', 'datepicker/jquery-ui', 'jquery.fastLiveFilter'));
echo $this->Html->CSS(array('datepicker/jquery-ui'));
?>
<!-- start -->
<?php
echo $this->Html->script('DatePicker');
echo $this->Html->css('datepicker/jquery-ui-1.8.23.custom');
?>

<!-- end -->
<script>
    $(function() {
        $('#search_input').fastLiveFilter('#search_list');
    });
</script>

<div class="programs form">
    <?php echo $this->Form->create('Template'); ?>
    <fieldset>
        <legend><?php echo __('Add Template'); ?></legend>
        <table cellpadding = "0" cellspacing = "0">          
            <tr>
         
                <th> <?php echo $this->Form->input('name'); ?> </th> 
            </tr>
        </table>

        <table>
            <tr>
                <th> <?php echo $this->Form->input('notes'); ?> </th> 
            </tr>
        </table>   
     
        <table id="js-datatable" cellpadding="0" cellspacing="0">
            <thead>
            <tr> 
                <th>Exercise</th>
                <th>Image</th>
                <th>Sets</th>
                <th>Reps</th>
                <th>Rest(Sec)</th> 
                <th>Load(Kg)</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <?php
                $i = 0;
                //for loop for body parts
                
                foreach ($exercises as $eb):
                    ?> 


                    <td> <?php
                echo $this->Form->input("Template.Exercise.$i.", array(
                    'type' => 'checkbox',
                    //'multiple' => 'checkbox',
                    'label' => $eb['Exercise']['name'],
                    'value' => $eb['Exercise']['id'],
                    'before' => '<div class="checkbox">',
                    'after' => '</div>',
                    'hiddenField' => false,
                    'div' => false
                ));
                    ?>
                    </td>   
                    
                        <td>
                            <?php if($eb['Exercise']['start_pic'] != null) 
                                { 
                                //echo $instruction['image']."<br /><br />"; 
                                echo $this->Html->image('files/'.$eb['Exercise']['start_pic'], array('width' => 50, 'height' => 50)); 
                                } 
                                else 
                                { 
                                echo "no image available"; 
                                }
	 
                                ?>&nbsp;
                        </td>
               
                    <td> <?php
                    echo $this->Form->input("Template.Exercise.$i.program.", array(
                    'type' => 'text',
                    'label' => 'Sets:',
                    //'options' => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17),
                    'default' => '4-5',
                    //'before' => " ",
                    // 'after' => '</div>',
                    'hiddenField' => false,
                    'div' => false
                ));
                    ?>
                    </td>
                    <td> <?php
                    echo $this->Form->input("Template.Exercise.$i.program.", array(
                        'type' => 'text',
                        'label' => 'Reps:',
                        //'options' => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17),
                        'default' => '12-14',
                        //'before' => " ",
                        // 'after' => '</div>',
                        'hiddenField' => false,
                        'div' => false
                    ));
                    ?>
                    </td>
                    <td> <?php
                    echo $this->Form->input("Template.Exercise.$i.program.", array(
                        'type' => 'select',
                        'label' => 'Rest:',
                        'options' => array('5' => '5', '10' => '10', '15' => '15', '20' => '20', '25' => '25', '30' => '30', '35' => '35', '40' => '40', '45' => '45', '50' => '50', '55' => '55', '60' => '60', '65' => '65', '70' => '70', '75' => '75', '80' => '80', '85' => '85', '90' => '90'),
                        'default' => 30,
                        //'before' => " ",
                        // 'after' => '</div>',
                        'hiddenField' => false,
                        'div' => false
                    ));
                    ?>
                    </td>
                    <td> <?php
                    echo $this->Form->input("Template.Exercise.$i.program.", array(
                        'type' => 'select',
                        'label' => 'Load:',
                        'options' => array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25'),
                        'default' => 5,
                        //'before' => " ",
                        // 'after' => '</div>',
                        'hiddenField' => false,
                        'div' => false
                    ));
                    ?>
                    </td>
                </tr>
                
                <?php $i++; ?>
</tbody>
            <?php endforeach; ?>


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
        <li><?php echo $this->Html->link(__('List Templates'), array('action' => 'index')); ?></li>
      
    </ul>
</div>
