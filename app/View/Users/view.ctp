<div class="users view">
<h2><?php  echo __('User'); ?></h2>
	<dl>
	
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo __('**********'); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Role'); ?></dt>
		<dd>
			<?php echo h($user['User']['role']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo $this->Time->format('d-m-Y, H:i:s', h($user['User']['created'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo $this->Time->format('d-m-Y, H:i:s', h($user['User']['modified'])); ?>
			&nbsp;
		</dd>
                <dt><?php echo __('Last Login'); ?></dt>
		<dd>
			<?php if($user['User']['last_login'] != null) 
                                { 
                                echo $this->Time->format('d-m-Y, H:i:s', h($user['User']['last_login']));
                                } 
                                else 
                                { 
                                echo null; 
                                }
                    ?>
			&nbsp;
		</dd>
	</dl>
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
                <li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
	</ul>
</div>
