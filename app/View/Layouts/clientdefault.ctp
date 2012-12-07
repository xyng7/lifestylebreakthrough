<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>

            <?php echo __('LSBT - Client'); ?>
        </title>
        <?php
        echo $this->Html->meta('icon');

        echo $this->Html->css('cake.generic');

        echo $this->fetch('meta');
        //echo $this->fetch('css');
        echo $this->fetch('script');
        echo $this->Html->css(array('webwidget_menu_glide'));
        echo $this->Html->css(array('/css/foundation/foundation.min', '/css/foundation/foundation'));
        ?>


    </head>
    <body>
        <div id="container">
            <div id="header">

            </div>
            
            <div id="content">
                <div style="margin-left: 70px; margin-top: 50px;">   
                    <?php
                    echo $this->Html->image('lsbtlogo.jpeg', array('alt' => 'Lsbt logo', 'border' => '0'));
                    ?>
                    <?php
                    //print $this->Session->flash("flash", array("element" => "alert"));
                    ?>

                    <?php echo $this->Session->flash(); ?>

                    <?php echo $this->fetch('content'); ?>

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
                        <h4><?php echo __('Actions'); ?></h4>
                        <ul>    
                            <li><?php echo $this->Html->link(__('Home'), array('action' => 'index')); ?> </li>
                            <li><?php echo $this->Html->link(__('Appointment Request'), array('action' => 'reqappointment')); ?> </li>
                        </ul>
                    </div>

                </div>
                

            </div>

        </div>
        <div class="row">
            <div class="twelve columns">
                <div class ="footer" style="border-top:#999999 1px solid; " align ="left">
                    <div align ="right">
                        <ul>
                            <?php echo "Logged in as " . AuthComponent::user('username') . " (" . $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout')) . ")\n(" . $this->Html->link(__('Change Password'), array('action' => 'changePassword', AuthComponent::user('id'))) . ")";
                            ?>
                        </ul>  
                    </div>

                </div>
            </div>

    </body>
</html>
