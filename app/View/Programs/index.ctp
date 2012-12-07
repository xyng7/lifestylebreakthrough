<div class="programs index">
    <h3><?php echo __('Programs'); ?></h3>

    <table id="js-datatable" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?php echo h('Client'); ?></th>
                <th><?php echo h('Program Name'); ?></th>
                <th><?php echo h('Start Date'); ?></th>
                <th><?php echo h('End Date'); ?></th>
                <th class="actions"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($programs as $program): ?>
                <tr>
                    <td><?php echo $this->Html->link($program['Client']['first_name'], array('controller' => 'clients', 'action' => 'view', $program['Client']['id'])); ?></td>
                    <td><?php echo h($program['Program']['name']); ?>&nbsp;</td>
                    <td><?php echo $this->Time->format('d-m-Y', h($program['Program']['start_date'])); ?>&nbsp;</td>
                    <td><?php echo $this->Time->format('d-m-Y', h($program['Program']['end_date'])); ?>&nbsp;</td>
                    <td><?php echo $this->Html->link(__('View'), array('action' => 'view', $program['Program']['id'])); ?> <br>
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $program['Program']['id'])); ?> <br>
                        <?php echo $this->Html->link(__('Progress'), array('action' => 'view_progress', $program['Program']['id'])); ?> <br>
                        <?php if (AuthComponent::user('role') === 'superadmin') {
                            echo $this->Form->postLink(__('Archive'), array('action' => 'delete', $program['Program']['id']), null, __('Are you sure you want to archive # %s?', $program['Program']['name'])); } ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <p>
        <?php
        /* echo $this->Paginator->counter(array(
          'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
          )); */
        ?>	
    </p>
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
<!--    <ul>
        <li><?php echo $this->Html->link(__('New Program'), array('action' => 'add')); ?></li>
    </ul>
    <ul>
        <li><?php echo $this->Html->link(__('Archived Program'), array('action' => 'archive')); ?></li>

    </ul>
    <br>
    <h3><?php echo __('Templates'); ?></h3>-->
    <ul>
        <li><?php echo $this->Html->link(__('Manage Templates'), array('controller' => 'templates', 'action' => 'index')); ?> </li>
    </ul>
</div>
