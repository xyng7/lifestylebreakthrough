<?php
//echo $this->Html->css('cake.generic');
//echo $this->Html->css(array('webwidget_menu_glide'));
//echo $this->Html->css(array('/css/foundation/foundation.min', '/css/foundation/foundation'));
?>
<html>
    <head>

    </head>


    <body style="margin-left:auto; margin-right:auto; margin-top: 30px; width:730px;">

        <table>
            <tr>
                <td style="width:140px;">
                    <img border="0" src="http://localhost:8888/lifestylebreakthrough/img/lsbtlogo.jpeg" alt="lsbt logo" width="130" height="165">
                </td>
                <td>
                    <h3><?php echo __($program['Program']['name']); ?></h3>
                    <br>
                    <table class="null">
                        <tr>
                            <td>
                        <dt><?php echo __('Client'); ?></dt>
                        <dd>
                            <?php echo h($program['Client']['first_name'] . " " . $program['Client']['last_name']); ?>

                        </dd>
                </td>
                <td>
            <dt><?php echo __('Start Date'); ?></dt>
            <dd>
                <?php echo $this->Time->format('d-m-Y', h($program['Program']['start_date'])); ?>

            </dd>
        </td>
        <td>
        <dt><?php echo __('End Date'); ?></dt>
        <dd>
            <?php echo $this->Time->format('d-m-Y', h($program['Program']['end_date'])); ?>

        </dd>
    </td>
</tr>
</table>
<br>
<dt><?php echo __('Notes'); ?></dt>
<dd>
    <?php echo h($program['Program']['notes']); ?>

</dd>
</td>
</tr>
</table> 
<br>
<br>
<div>
    <h3><?php echo __('Exercises'); ?></h3>
    <br>

    <?php if (!empty($program['Exercise'])): ?>

        <?php
        $i = 1;
        foreach ($program['Exercise'] as $exercise):
            ?>

            <table style="width:730px;">
                <tr>    
                    <td colspan="4" style="line-height:20px; border-bottom:2px solid #666;">
                        <b><?php echo $exercise['name']; ?></b>
                        
                    </td>
                </tr>

                <tr>
                    <td id="container" style="width:300px; float:left;">
                        <?php echo $exercise['instructions']; ?>
                      
                    </td>
                    <td style="width:100px;">
                        
                    </td>

                    <td style="text-align: right;">
                        <?php
                        if ($exercise['start_pic'] != null) {

                            echo $this->Html->image('http://localhost:8888/lifestylebreakthrough/imgfiles/' . $exercise['start_pic'], array('width' => 150, 'height' => 150));
                        } else {
                            echo "no image available";
                        }
                        ?>&nbsp;</td>

                    <td style="text-align: right;">
                        <?php
                        if ($exercise['end_pic'] != null) {

                            echo $this->Html->image('http://localhost:8888/lifestylebreakthrough/imgfiles/' . $exercise['end_pic'], array('width' => 150, 'height' => 150));
                        } else {
                            echo "no image available";
                        }
                        ?>&nbsp;</td>

                </tr>

                <tr>
                    <td colspan="4">
                        <br>
                        <?php echo __("Complete " . $exercisesPrograms[$i - 1]['exercises_programs']['rec_sets'] . " sets of " . $exercisesPrograms[$i - 1]['exercises_programs']['rec_reps'] . " repetitions. Rest " . $exercisesPrograms[$i - 1]['exercises_programs']['rec_res'] . " secs between sets."); ?>
                    </td>
                </tr>
            </table>
        <?php $i++; ?>
            <br>
            <br>
    <?php endforeach; ?>
    <?php endif; ?>


</div>     
</body>

<style>

    /**
     *
     * Generic CSS for CakePHP
     *
     * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
     * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
     *
     * Licensed under The MIT License
     * Redistributions of files must retain the above copyright notice.
     *
     * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
     * @link          http://cakephp.org CakePHP(tm) Project
     * @package       app.webroot.css
     * @since         CakePHP(tm)
     * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
    */

    * {
        margin:0;
        padding:0;
    }

    /** General Style Info **/
    body {
        /* background: #003d4c; */


        font-family:'lucida grande',verdana,helvetica,arial,sans-serif;
        font-size:90%;
        margin: 30px;

    }
    a {
        color: #003d4c;
        text-decoration: underline;
        font-weight: bold;
    }
    a:hover {
        color: #367889;
        text-decoration:none;
    }
    a img {
        border:none;
    }
    h1, h2, h3, h4 {
        font-weight: normal;
        margin-bottom:0.5em;
    }
    h1 {
        background:#fff;
        color: #003d4c;
        font-size: 100%;
    }
    h2 {
        background:#fff;
        color: #e32;
        font-family:'Gill Sans','lucida grande', helvetica, arial, sans-serif;
        font-size: 190%;
    }
    h3 {
        color: #2c6877;
        font-family:'Gill Sans','lucida grande', helvetica, arial, sans-serif;
        font-size: 165%;
    }
    h4 {
        color: #993;
        font-weight: normal;
    }
    ul, li {
        margin: 0 12px;
    }
    p {
        margin: 0 0 1em 0;
    }

    /** Layout **/
    #container {

        width:1200px; 
        margin:0 auto; 
        position:relative; 
    }

    #header{
        padding: 10px 20px;
    }
    #header h1 {
        line-height:20px;
        background: #153E7E url('../img/cake.icon.png') no-repeat left;
        color: #fff;
        padding: 0px 30px;
    }
    #header h1 a {
        color: #fff;
        background: #003d4c;
        font-weight: normal;
        text-decoration: none;
    }
    #header h1 a:hover {
        color: #fff;
        background: #003d4c;
        text-decoration: underline;
    }
    #content{
        background: #fff;
        clear: both;
        color: #333;
        padding: 10px 20px 40px 20px;
        overflow: auto;

    }
    #footer {
        clear: both;
        padding: 6px 10px;
        text-align: right;
    }

    /** containers **/
    div.form,
    div.index,
    div.view {
        float:right;
        width:75%;

        padding:10px 2%;
    }

    div.actions {
        float:left;
        width:15%;
        padding:10px 1.5%;
    }
    div.leftmenu {
        float:left;
        width:15%;
        padding:10px 1.5%;
    }
    div.actions h3 {
        padding-top:0;
        color:#777;
    }
    div.navbar {

        margin-left: 100px;
    }



    /** Tables **/


    /* SQL log */
    .cake-sql-log {
        background: #fff;
    }
    .cake-sql-log td {
        padding: 4px 8px;
        text-align: left;
        font-family: Monaco, Consolas, "Courier New", monospaced;
    }
    .cake-sql-log caption {
        color:#fff;
    }

    /** Paging **/
    .paging {
        background:#fff;
        color: #ccc;
        margin-top: 1em;
        clear:both;
    }
    .paging .current,
    .paging .disabled,
    .paging a {
        text-decoration: none;
        padding: 5px 8px;
        display: inline-block
    }
    .paging > span {
        display: inline-block;
        border: 1px solid #ccc;
        border-left: 0;
    }
    .paging > span:hover {
        background: #efefef;
    }
    .paging .prev {
        border-left: 1px solid #ccc;
        -moz-border-radius: 4px 0 0 4px;
        -webkit-border-radius: 4px 0 0 4px;
        border-radius: 4px 0 0 4px;
    }
    .paging .next {
        -moz-border-radius: 0 4px 4px 0;
        -webkit-border-radius: 0 4px 4px 0;
        border-radius: 0 4px 4px 0;
    }
    .paging .disabled {
        color: #ddd;
    }
    .paging .disabled:hover {
        background: transparent;
    }
    .paging .current {
        background: #efefef;
        color: #c73e14;
    }

    /** Scaffold View **/
    dl {
        line-height: 2em;
        margin: 0em 0em;
        width: 60%;
    }
    dl dd:nth-child(4n+2),
    dl dt:nth-child(4n+1) {
        background: #f4f4f4;
    }

    dt {
        font-weight: bold;
        padding-left: 4px;
        vertical-align: top;
        width: 10em;
    }
    dd {
        margin-left: 10em;
        margin-top: -2em;
        vertical-align: top;
    }

    /** Forms **/
    form {
        clear: both;
        margin-right: 20px;
        padding: 0;
        width: 500px;
    }
    fieldset {
        border: none;
        margin-bottom: 1em;
        padding: 16px 10px;
    }
    fieldset legend {
        color: #e32;
        font-size: 160%;
        font-weight: bold;
    }
    fieldset fieldset {
        margin-top: 0;
        padding: 10px 0 0;
    }
    fieldset fieldset legend {
        font-size: 120%;
        font-weight: normal;
    }
    fieldset fieldset div {
        clear: left;
        margin: 0 20px;
    }
    form div {
        clear: both;
        margin-bottom: 1em;
        padding: .5em;
        vertical-align: text-top;
    }
    form .input {
        color: #444;
    }
    form .required {
        font-weight: bold;
    }
    form .required label:after {
        color: #e32;
        content: '*';
        display:inline;
    }
    form div.submit {
        border: 0;
        clear: both;
        margin-top: 10px;
    }
    label {
        display: block;
        font-size: 110%;
        margin-bottom:3px;
    }
    input, textarea {
        clear: both;
        font-size: 110%;
        font-family: "frutiger linotype", "lucida grande", "verdana", sans-serif;
        padding: 1%;
        width:98%;
    }
    select {
        clear: both;
        font-size: 120%;
        vertical-align: text-bottom;
    }
    select[multiple=multiple] {
        width: 100%;
    }
    option {
        font-size: 120%;
        padding: 0 3px;
    }
    input[type=checkbox] {
        clear: left;
        float: none;
        margin: 0px 6px 7px 2px;
        width: auto;

    }
    div.checkbox label {
        display: inline;
    }
    input[type=radio] {
        float:left;
        width:auto;
        margin: 6px 0;
        padding: 0;
        line-height: 26px;
    }
    .radio label {
        margin: 0 0 6px 20px;
        line-height: 26px;
    }
    input[type=submit] {
        display: inline;
        font-size: 110%;
        width: auto;
    }
    form .submit input[type=submit] {
        background:#62af56;
        background-image: -webkit-gradient(linear, left top, left bottom, from(#76BF6B), to(#3B8230));
        background-image: -webkit-linear-gradient(top, #76BF6B, #3B8230);
        background-image: -moz-linear-gradient(top, #76BF6B, #3B8230);
        border-color: #2d6324;
        color: #fff;
        text-shadow: rgba(0, 0, 0, 0.5) 0px -1px 0px;
        padding: 8px 10px;
    }
    form .submit input[type=submit]:hover {
        background: #5BA150;
    }
    /* Form errors */
    form .error {
        background: #FFDACC;
        -moz-border-radius: 4px;
        -webkit-border-radius: 4px;
        border-radius: 4px;
        font-weight: normal;
    }
    form .error-message {
        -moz-border-radius: none;
        -webkit-border-radius: none;
        border-radius: none;
        border: none;
        background: none;
        margin: 0;
        padding-left: 4px;
        padding-right: 0;
    }
    form .error,
    form .error-message {
        color: #9E2424;
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        -ms-box-shadow: none;
        -o-box-shadow: none;
        box-shadow: none;
        text-shadow: none;
    }

    /** Notices and Errors **/
    .message {
        clear: both;
        color: #fff;
        font-size: 140%;
        font-weight: bold;
        margin: 0 0 1em 0;
        padding: 5px;
    }

    .success,
    .message,
    .cake-error,
    .cake-debug,
    .notice,
    p.error,
    .error-message {
        /*yellow*/
        background: #ffcc00;
        background-repeat: repeat-x;
        background-image: -moz-linear-gradient(top, #ffcc00, #E6B800);
        background-image: -ms-linear-gradient(top, #ffcc00, #E6B800);
        background-image: -webkit-gradient(linear, left top, left bottom, from(#ffcc00), to(#E6B800));
        background-image: -webkit-linear-gradient(top, #ffcc00, #E6B800);
        background-image: -o-linear-gradient(top, #ffcc00, #E6B800);
        background-image: linear-gradient(top, #ffcc00, #E6B800);
        text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
        border: 1px solid rgba(0, 0, 0, 0.2);
        margin-bottom: 18px;
        padding: 7px 14px;
        color: #404040;
        text-shadow: 0 1px 0 rgba(255, 255, 255, 0.5);
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.25);
        -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.25);
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.25);
    }
    .cake-error,
    p.error,
    .error-message {
        /*red*/
        clear: both;
        color: #fff;
        background: #c43c35;
        border: 1px solid rgba(0, 0, 0, 0.5);
        background-repeat: repeat-x;
        background-image: -moz-linear-gradient(top, #ee5f5b, #c43c35);
        background-image: -ms-linear-gradient(top, #ee5f5b, #c43c35);
        background-image: -webkit-gradient(linear, left top, left bottom, from(#ee5f5b), to(#c43c35));
        background-image: -webkit-linear-gradient(top, #ee5f5b, #c43c35);
        background-image: -o-linear-gradient(top, #ee5f5b, #c43c35);
        background-image: linear-gradient(top, #ee5f5b, #c43c35);
        text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.3);
    }
    .message,
    success {
        /*green*/
        clear: both;
        color: #fff;
        border: 1px solid rgba(0, 0, 0, 0.5);
        background: #3B8230;
        background-repeat: repeat-x;
        background-image: -webkit-gradient(linear, left top, left bottom, from(#76BF6B), to(#3B8230));
        background-image: -webkit-linear-gradient(top, #76BF6B, #3B8230);
        background-image: -moz-linear-gradient(top, #76BF6B, #3B8230);
        background-image: -ms-linear-gradient(top, #76BF6B, #3B8230);
        background-image: -o-linear-gradient(top, #76BF6B, #3B8230);
        background-image: linear-gradient(top, #76BF6B, #3B8230);
        text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.3);
    }
    p.error {
        font-family: Monaco, Consolas, Courier, monospace;
        font-size: 120%;
        padding: 0.8em;
        margin: 1em 0;
    }
    p.error em {
        font-weight: normal;
        line-height: 140%;
    }
    .notice {
        color: #000;
        display: block;
        font-size: 120%;
        padding: 0.8em;
        margin: 1em 0;
    }
    .success {
        color: #fff;
    }

    /**  Actions  **/
    .actions ul {
        width:135px;
        margin: 0;
        padding: 0;
        overflow:visible;
    }
    .actions li {
        margin:0 0 0.5em 0;
        list-style-type: none;
        white-space: nowrap;
        padding: 0;
        overflow:visible;
    }
    .actions ul li a {
        font-weight: normal;
        display: block;
        clear: both;
        overflow:visible;
    }

    /* Buttons and button links */
    input[type=submit],
    .actions ul li a,
    .actions a {
        font-weight:normal;
        padding: 4px 10px;
        background: #dcdcdc;
        background-image: -webkit-gradient(linear, left top, left bottom, from(#fefefe), to(#dcdcdc));
        background-image: -webkit-linear-gradient(top, #fefefe, #dcdcdc);
        background-image: -moz-linear-gradient(top, #fefefe, #dcdcdc);
        background-image: -ms-linear-gradient(top, #fefefe, #dcdcdc);
        background-image: -o-linear-gradient(top, #fefefe, #dcdcdc);
        background-image: linear-gradient(top, #fefefe, #dcdcdc);
        color:#333;
        border:1px solid #bbb;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
        text-decoration: none;
        text-shadow: #fff 0px 1px 0px;
        min-width: 0;
        -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.3), 0px 1px 1px rgba(0, 0, 0, 0.2);
        -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.3), 0px 1px 1px rgba(0, 0, 0, 0.2);
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.3), 0px 1px 1px rgba(0, 0, 0, 0.2);
        -webkit-user-select: none;
        user-select: none;
        overflow:visible;
    }
    .actions ul li a:hover,
    .actions a:hover {
        background: #ededed;
        border-color: #acacac;
        text-decoration: none;
        overflow:visible;
    }
    input[type=submit]:active,
    .actions ul li a:active,
    .actions a:active {
        background: #eee;
        background-image: -webkit-gradient(linear, left top, left bottom, from(#dfdfdf), to(#eee));
        background-image: -webkit-linear-gradient(top, #dfdfdf, #eee);
        background-image: -moz-linear-gradient(top, #dfdfdf, #eee);
        background-image: -ms-linear-gradient(top, #dfdfdf, #eee);
        background-image: -o-linear-gradient(top, #dfdfdf, #eee);
        background-image: linear-gradient(top, #dfdfdf, #eee);
        text-shadow: #eee 0px 1px 0px;
        -moz-box-shadow: inset 0 1px 4px rgba(0, 0, 0, 0.3);
        -webkit-box-shadow: inset 0 1px 4px rgba(0, 0, 0, 0.3);
        box-shadow: inset 0 1px 4px rgba(0, 0, 0, 0.3);
        border-color: #aaa;
        text-decoration: none;
        overflow:visible;
    }

    /** Related **/
    .related {
        clear: both;
        display: block;
    }

    /** Debugging **/
    pre {
        color: #000;
        background: #f0f0f0;
        padding: 15px;
        -moz-box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        -webkit-box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
    }
    .cake-debug-output {
        padding: 0;
        position: relative;
    }
    .cake-debug-output > span {
        position: absolute;
        top: 5px;
        right: 5px;
        background: rgba(255, 255, 255, 0.3);
        -moz-border-radius: 4px;
        -webkit-border-radius: 4px;
        border-radius: 4px;
        padding: 5px 6px;
        color: #000;
        display: block;
        float: left;
        -moz-box-shadow: inset 0 1px 0 rgba(0, 0, 0, 0.25), 0 1px 0 rgba(255, 255, 255, 0.5);
        -webkit-box-shadow: inset 0 1px 0 rgba(0, 0, 0, 0.25), 0 1px 0 rgba(255, 255, 255, 0.5);
        box-shadow: inset 0 1px 0 rgba(0, 0, 0, 0.25), 0 1px 0 rgba(255, 255, 255, 0.5);
        text-shadow: 0 1px 1px rgba(255, 255, 255, 0.8);
    }
    .cake-debug,
    .cake-error {
        font-size: 16px;
        line-height: 20px;
        clear: both;
    }
    .cake-error > a {
        text-shadow: none;
    }
    .cake-error {
        white-space: normal;
    }
    .cake-stack-trace {
        background: rgba(255, 255, 255, 0.7);
        color: #333;
        margin: 10px 0 5px 0;
        padding: 10px 10px 0 10px;
        font-size: 120%;
        line-height: 140%;
        overflow: auto;
        position: relative;
        -moz-border-radius: 4px;
        -webkit-border-radius: 4px;
        border-radius: 4px;
    }
    .cake-stack-trace a {
        text-shadow: none;
        background: rgba(255, 255, 255, 0.7);
        padding: 5px;
        -moz-border-radius: 10px;
        -webkit-border-radius: 10px;
        border-radius: 10px;
        margin: 0px 4px 10px 2px;
        font-family: sans-serif;
        font-size: 14px;
        line-height: 14px;
        display: inline-block;
        text-decoration: none;
        -moz-box-shadow: inset 0px 1px 0 rgba(0, 0, 0, 0.3);
        -webkit-box-shadow: inset 0px 1px 0 rgba(0, 0, 0, 0.3);
        box-shadow: inset 0px 1px 0 rgba(0, 0, 0, 0.3);
    }
    .cake-code-dump pre {
        position: relative;
        overflow: auto;
    }
    .cake-context {
        margin-bottom: 10px;
    }
    .cake-stack-trace pre {
        color: #000;
        background-color: #F0F0F0;
        margin: 0px 0 10px 0;
        padding: 1em;
        overflow: auto;
        text-shadow: none;
    }
    .cake-stack-trace li {
        padding: 10px 5px 0px;
        margin: 0 0 4px 0;
        font-family: monospace;
        border: 1px solid #bbb;
        -moz-border-radius: 4px;
        -wekbkit-border-radius: 4px;
        border-radius: 4px;
        background: #dcdcdc;
        background-image: -webkit-gradient(linear, left top, left bottom, from(#fefefe), to(#dcdcdc));
        background-image: -webkit-linear-gradient(top, #fefefe, #dcdcdc);
        background-image: -moz-linear-gradient(top, #fefefe, #dcdcdc);
        background-image: -ms-linear-gradient(top, #fefefe, #dcdcdc);
        background-image: -o-linear-gradient(top, #fefefe, #dcdcdc);
        background-image: linear-gradient(top, #fefefe, #dcdcdc);
    }
    /* excerpt */
    .cake-code-dump pre,
    .cake-code-dump pre code {
        clear: both;
        font-size: 12px;
        line-height: 15px;
        margin: 4px 2px;
        padding: 4px;
        overflow: auto;
    }
    .cake-code-dump .code-highlight {
        display: block;
        background-color: rgba(255, 255, 0, 0.5);
    }
    .code-coverage-results div.code-line {
        padding-left:5px;
        display:block;
        margin-left:10px;
    }
    .code-coverage-results div.uncovered span.content {
        background:#ecc;
    }
    .code-coverage-results div.covered span.content {
        background:#cec;
    }
    .code-coverage-results div.ignored span.content {
        color:#aaa;
    }
    .code-coverage-results span.line-num {
        color:#666;
        display:block;
        float:left;
        width:20px;
        text-align:right;
        margin-right:5px;
    }
    .code-coverage-results span.line-num strong {
        color:#666;
    }
    .code-coverage-results div.start {
        border:1px solid #aaa;
        border-width:1px 1px 0px 1px;
        margin-top:30px;
        padding-top:5px;
    }
    .code-coverage-results div.end {
        border:1px solid #aaa;
        border-width:0px 1px 1px 1px;
        margin-bottom:30px;
        padding-bottom:5px;
    }
    .code-coverage-results div.realstart {
        margin-top:0px;
    }
    .code-coverage-results p.note {
        color:#bbb;
        padding:5px;
        margin:5px 0 10px;
        font-size:10px;
    }
    .code-coverage-results span.result-bad {
        color: #a00;
    }
    .code-coverage-results span.result-ok {
        color: #fa0;
    }
    .code-coverage-results span.result-good {
        color: #0a0;
    }

    /** Elements **/
    #url-rewriting-warning {
        display:none;
    }

    #coolMenu,
    #coolMenu ul {
        list-style: none;
        padding: 0px;
        margin: 0px;
        font-family:Arial;
    }
    #coolMenu {
        float: left;
    }
    #coolMenu > li {
        display: inline;
        float: left;
        list-style: none;
        position: relative;
        text-align: left;
        margin-left: 55px;
        width: 100px;
    }
    #coolMenu li a {
        display: block;
        height: 2em;
        line-height: 2em;
        padding: 0 1.5em;
        text-decoration: none;
    }
    #coolMenu ul {
        display: absolute;
        position: relative;
        display: none;
        z-index: 999;
    }
    #coolMenu ul li a {
        width: 80px;
    }
    #coolMenu li:hover ul {
        display: block;
    }

    /* Main menu
    ------------------------------------------*/
    #coolMenu {
        font-family: Arial;
        font-size: 12px;
        background: #2f8be8;
    }
    #coolMenu > li > a {
        color: #fff;
        font-weight: bold;
    }
    #coolMenu > li:hover > a {
        background: #f09d28;
        color: #000;
    }

    /* Submenu
    ------------------------------------------*/
    #coolMenu ul {
        background: #f09d28;
    }
    #coolMenu ul li a {
        color: #000;
    }
    #coolMenu ul li:hover a {
        background: #ffc97c;
    }

    div.failure-message{
        /*red*/
        background: #c43c35;
    }

    div.success-message{
        /*green*/
        background: #76BF6B;
    }
</style>