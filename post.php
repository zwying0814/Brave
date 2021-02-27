<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('base/head.php');
$this->need('base/nav.php');
?>

<div class="list-content mx-auto mt-5">
    <div id="article" class="list-top">
        <h5 class="list-text">💕<?php $this->title() ?>💕</h5>
        <article>
            <?php $this->content(); ?>
        </article>
    </div>
</div>

<?php $this->need('base/footer.php'); ?>