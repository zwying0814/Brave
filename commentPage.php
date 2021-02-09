<?php

/**
 * 祝福板
 * @package custom
 * Author: Veen Zhao
 * CreateTime: 2020/9/6 15:38
 */
$this->need('base/head.php');
$this->need('base/nav.php');
$this->comments()->to($comments);
?>
<?php function threadedComments($comments, $options)
{
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';
        } else {
            $commentClass .= ' comment-by-user';
        }
    }
    $commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';
?>
    <div id="li-<?php $comments->theId(); ?>" class=" comment-body<?php if ($comments->levels > 0) {
                                                                        echo ' comment-child';
                                                                        $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
                                                                    } else {
                                                                        echo ' comment-parent';
                                                                    }
                                                                    $comments->alt(' comment-odd', ' comment-even');
                                                                    echo $commentClass;
                                                                    ?>">

        <div class="commentlist">
            <div class="comment" id="li-<?php $comments->theId(); ?>">
                <div id="<?php $comments->theId(); ?>">
                    <div class="comment-avatar"><img alt="" src="<?= App::avatarQQ($comments->mail); ?>s=100" class="avatar avatar-96 photo" height="96" width="96" style="display: inline;"></div>
                    <div class="comment-body">
                        <div class="comment_author">
                            <span class="name"><?php $comments->author(); ?></span>
                            <em><?php $comments->date('Y-m-d H:i'); ?></em>
                        </div>
                        <div class="comment-text">
                            <?php $comments->content(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <?php if ($this->allow('comment')) : ?>
        <div id="<?php $this->respondId(); ?>" class="respond list-content mx-auto mt-5">
            <div class="list-top">
                <?php if ($comments->have()) : ?>
                    <h5 class="text-center"><?php $this->commentsNum(_t('暂无祝福'), _t('仅有一条祝福'), _t('累计已经收到<span class="bigfontNum"> %d </span>条祝福')); ?></h5>
                    <?php $comments->listComments(); ?>
                    <?php $comments->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
                <?php endif; ?>
                <form method="post" action="<?php $this->commentUrl() ?>" name="comment-form" id="comment-form" role="form" class="comment-form">
                    <?php if ($this->user->hasLogin()) : ?>
                        <p><?php _e('登录身份: '); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>.
                            <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a>
                        </p>
                    <?php else : ?>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <input type="text" name="author" id="author" class="form-control" placeholder="<?php _e('姓名或昵称*'); ?>" value="<?php $this->remember('author'); ?>" required />
                            </div>
                            <div class="form-group col-md-4">
                                <input type="email" name="mail" id="mail" class="form-control" placeholder="<?php _e('邮箱*'); ?>" value="<?php $this->remember('mail'); ?>" <?php if ($this->options->commentsRequireMail) : ?> required<?php endif; ?> />
                            </div>
                            <div class="form-group col-md-4">
                                <input type="url" name="url" id="url" class="form-control" placeholder="<?php _e('网站或博客'); ?>" value="<?php $this->remember('url'); ?>" <?php if ($this->options->commentsRequireURL) : ?> required<?php endif; ?> />
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="form-group">
                        <textarea rows="3" cols="50" name="text" id="textarea" class="form-control" placeholder="<?php _e('写下对我们的祝福'); ?>" required><?php $this->remember('text'); ?></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="float-right btn btn-outline-danger"><?php _e('祝福发送'); ?></button>
                    </div>
                </form>
            </div>
        </div>
    <?php else : ?>
        <h3><?php _e('评论已关闭'); ?></h3>
    <?php endif; ?>

    <?php $this->need('base/footer.php'); ?>