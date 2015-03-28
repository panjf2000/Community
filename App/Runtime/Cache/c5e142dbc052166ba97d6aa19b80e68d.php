<?php if (!defined('THINK_PATH')) exit();?><!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <div>
           <?php echo (testname($name)); ?>
            <form action="<?php echo U('Index/addForm');?>" method="post">
                <input type="text" name="text">
                <input type="submit">
            </form>
        </div>
    </body>
</html>