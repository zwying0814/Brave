<?php
/**
 * Love List
 * @package custom
 *
 * Author: Veen Zhao
 * CreateTime: 2020/9/4 22:37
 * Love list page
 */

$this->need('base/head.php');
$this->need('base/nav.php');?>
<div class="container text-center my-5">
<h5 class="list-text">💕世间最动情之事，莫过于两人相依💑，走过四季三餐的温暖。<br>📜一百件事记录着我们的点点滴滴，你一百种样子💃，我一百种喜欢。</h5>
<?php echo App::parseShortCode($this->content) ?>
</div>
<?php $this->need('base/footer.php'); ?>
