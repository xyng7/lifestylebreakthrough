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

    <div class="actions">
                        <h4><?php echo __('Actions'); ?></h4>
                        <ul>    
                            <li><?php echo $this->Html->link(__('Home'), array('action' => 'index')); ?> </li>
                            <li><?php echo $this->Html->link(__('Appointment Request'), array('action' => 'reqappointment'),array('style'=>'font-size:14px;')); ?> </li>
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
