<?php if (!defined('THINK_PATH')) exit();?><span>
(<span class='show_digg_number'><?php echo ($number); ?></span>)
<!--当type为1的时候 赞 0 取消赞-->
<?php if($type){ ?>
<a href='javascript:;' comment_id='<?php echo ($comment_id); ?>' uid='<?php echo ($uid); ?>' class='digg_btn' type='1'>赞</a>
<?php }else{ ?>
<a href='javascript:;' comment_id='<?php echo ($comment_id); ?>' uid='<?php echo ($uid); ?>' class='digg_btn' type='0'>取消赞</a>
<?php } ?>
</span>