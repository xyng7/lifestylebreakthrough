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
		
		<?php echo __('LSBT - Forgot Password'); ?>
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
                    echo $this->Html->image('lsbtlogo.jpeg', array('alt'=>'Lsbt logo', 'border'=>'0'));  
                    ?>

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
                    </div>
		</div>
		
	</div>

</body>
</html>
