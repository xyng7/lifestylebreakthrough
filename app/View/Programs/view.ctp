<div class="programs view">
<h3><?php  echo __('Program'); ?></h3>
<table id="gradient-style" cellpadding = "0" cellspacing = "0">
	<tr>    
            <th><?php echo __('Client'); ?></th>
            <th><?php echo __('Name'); ?></th>
            <th><?php echo __('Start Date'); ?></th>
            <th><?php echo __('End Date'); ?></th>
            <th><?php echo __('Notes'); ?></th>            
               </tr>
        <tr>
            <td><?php echo $this->Html->link($program['Client']['first_name'], array('controller' => 'clients', 'action' => 'view', $program['Client']['id'])); ?></td>
            <td><?php echo h($program['Program']['name']); ?></td>
            <td><?php echo $this->Time->format('d-m-Y', h($program['Program']['start_date'])); ?></td>
            <td><?php echo $this->Time->format('d-m-Y', h($program['Program']['end_date'])); ?></td>
            <td><?php echo h($program['Program']['notes']); ?></td>
            
        </tr>
        </table>	
<!--<dl>
		<dt><?php echo __('Client'); ?></dt>
		<dd>
			<?php echo $this->Html->link($program['Client']['first_name'], array('controller' => 'clients', 'action' => 'view', $program['Client']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($program['Program']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start Date'); ?></dt>
		<dd>
			<?php echo $this->Time->format('d-m-Y', h($program['Program']['start_date'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End Date'); ?></dt>
		<dd>
			<?php echo $this->Time->format('d-m-Y', h($program['Program']['end_date'])); ?>
			&nbsp;
		</dd>
                <dt><?php echo __('Notes'); ?></dt>
		<dd>
			<?php echo h($program['Program']['notes']); ?>
			&nbsp;
		</dd>
	</dl>

<br>-->
<div class="related">
	<h3><?php echo __('Exercises'); ?></h3>
	<?php if (!empty($program['Exercise'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>    
                <th><?php echo __('Number'); ?></th>
		<th><?php echo __('Name'); ?></th>
                <th><?php echo __('Sets'); ?></th>
                <th><?php echo __('Reps'); ?></th>
                <th><?php echo __('Rest(Sec)'); ?></th>
                <th><?php echo __('Load(Kg)'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 1;
		foreach ($program['Exercise'] as $exercise): ?>
		<tr>
                        
                        <td><?php echo $i; ?></td>
			<td><?php echo $exercise['name']; ?></td>
                        <td><?php echo $exercisesPrograms[$i - 1]['exercises_programs']['rec_sets']; ?></td>
                        <td><?php echo $exercisesPrograms[$i - 1]['exercises_programs']['rec_reps']; ?></td>
                        <td><?php echo $exercisesPrograms[$i - 1]['exercises_programs']['rec_res']; ?></td>
                        <td><?php echo $exercisesPrograms[$i - 1]['exercises_programs']['rec_load']; ?></td>
                        <td>
				<?php echo $this->Html->link(__('View Exercise'), array('controller' => 'Exercises', 'action' => 'view', $exercise['id'])); ?>
				
			</td>
                        
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
	<li><?php echo $this->Html->link(__('List Programs'), array('action' => 'index')); ?> </li>	            
               <li><?php echo $this->Html->link(__('PDF - 4 weeks'), array('action' => 'view2_pdf', 'ext' => 'pdf', $program['Program']['id'])); ?></li>
               <li><?php echo $this->Html->link(__('PDF - Descriptions'), array('action' => 'view_pdf', 'ext' => 'pdf', $program['Program']['id'])); ?></li>		
	</ul>
</div>