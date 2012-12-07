<div class="clients view">
<h3><?php  echo __('Client'); ?></h3>
	<table id="gradient-style" cellpadding = "0" cellspacing = "0">
	<tr>    
            <th><?php echo __('First Name'); ?></th>
            <th><?php echo __('Last Name'); ?></th>
            <th><?php echo __('Email'); ?></th>
            <th><?php echo __('Date of Birth'); ?></th>
            <th><?php echo __('Phone'); ?></th>
            <th><?php echo __('Mobile'); ?></th>
            <th><?php echo __('Address'); ?></th>
            <th><?php echo __('Suberb'); ?></th>
            <th><?php echo __('Postal'); ?></th>
               </tr>
        <tr>
            <td><?php echo h($client['Client']['first_name']); ?></td>
            <td><?php echo h($client['Client']['last_name']); ?></td>
            <td><?php echo h($client['Client']['email']); ?></td>
            <td><?php echo $this->Time->format('d-m-Y', h($client['Client']['dob'])); ?></td>
            <td><?php echo h($client['Client']['phone']); ?></td>
            <td><?php echo h($client['Client']['mobile']); ?></td>
            <td><?php echo h($client['Client']['address']); ?></td>
            <td><?php echo h($client['Client']['suburb']); ?></td>
            <td><?php echo h($client['Client']['postal']); ?></td>
        </tr>
        </table>
<!--        <dl>
		<dt><?php echo __('First Name'); ?></dt>
		<dd>
			<?php echo h($client['Client']['first_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Name'); ?></dt>
		<dd>
			<?php echo h($client['Client']['last_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($client['Client']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dob'); ?></dt>
		<dd>
			<?php echo $this->Time->format('d-m-Y', h($client['Client']['dob'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($client['Client']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mobile'); ?></dt>
		<dd>
			<?php echo h($client['Client']['mobile']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($client['Client']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Suburb'); ?></dt>
		<dd>
			<?php echo h($client['Client']['suburb']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Postal'); ?></dt>
		<dd>
			<?php echo h($client['Client']['postal']); ?>
			&nbsp;
		</dd>
	</dl>-->
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
		<li><?php echo $this->Html->link(__('Edit Client'), array('action' => 'edit', $client['Client']['id'])); ?> </li>
                <li><?php echo $this->Html->link(__('Resend Email'), array('action' => 'resendwelcome', $client['Client']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Clients'), array('action' => 'index')); ?> </li>
		<li><?php if (AuthComponent::user('role') === 'superadmin') {
                    echo $this->Html->link(__('New Client'), array('action' => 'add')); }?> </li>
	</ul>
</div>
