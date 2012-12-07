<div class="templates view">
<h3><?php  echo __('Template'); ?></h3>
<!--	<dl>
		
		<dt><?php echo __('Template Name'); ?></dt>
		<dd>
			<?php echo h($template['Template']['name']); ?>
			&nbsp;
		</dd>
                <dt><?php echo __('Notes'); ?></dt>
		<dd>
			<?php echo h($template['Template']['notes']); ?>
			&nbsp;
		</dd>
	</dl>-->
<table id="gradient-style" cellpadding = "0" cellspacing = "0">
	<tr>    
            <th><?php echo __('Template Name'); ?></th>
            <th><?php echo __('Notes'); ?></th>
               </tr>
        <tr>
            <td><?php echo h($template['Template']['name']); ?></td>
            <td><?php echo h($template['Template']['notes']); ?></td>
        </tr>
        </table>

<div class="related">
	<h3><?php echo __('Exercises'); ?></h3>
	<?php if (!empty($template['Exercise'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>    
                <th><?php echo __('Number'); ?></th>
		<th><?php echo __('Name'); ?></th>
                <th><?php echo __('Sets'); ?></th>
                <th><?php echo __('Reps'); ?></th>
                <th><?php echo __('Rest(Sec)'); ?></th>
                <th><?php echo __('Load(Kg)'); ?></th>
		
	</tr>
	<?php
		$i = 1;
		foreach ($template['Exercise'] as $exercise): ?>
		<tr>
                        
                        <td><?php echo $i; ?></td>
			<td><?php echo $exercise['name']; ?></td>
                        <td><?php echo $exercisesPrograms[$i - 1]['exercises_templates']['rec_sets']; ?></td>
                        <td><?php echo $exercisesPrograms[$i - 1]['exercises_templates']['rec_reps']; ?></td>
                        <td><?php echo $exercisesPrograms[$i - 1]['exercises_templates']['rec_res']; ?></td>
                        <td><?php echo $exercisesPrograms[$i - 1]['exercises_templates']['rec_load']; ?></td>
                        
		</tr>
                <?php $i++; ?>
	<?php endforeach; ?>
	</table>
            <?php endif; ?>

	
</div>

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
		
		<li><?php echo $this->Html->link(__('List Templates'), array('action' => 'index')); ?> </li>
		
	</ul>
</div>