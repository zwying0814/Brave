<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
require_once("core/shortcodes.php");
require_once("core/App.php");
/**
 * 主题后台设置
 */
function themeConfig($form)
{
    $navsay = new Typecho_Widget_Helper_Form_Element_Text('navsay', NULL, NULL, _t('导航栏右侧文字设置'), _t('直接书写文字即可，不建议过长。也可使用相关随机api'));
    $form->addInput($navsay);
    $heroimg = new Typecho_Widget_Helper_Form_Element_Text('heroimg', NULL, NULL, _t('头部大图设置'), _t('在这里输入图片链接'));
    $form->addInput($heroimg);
    $lovetime = new Typecho_Widget_Helper_Form_Element_Text('lovetime', NULL, NULL, _t('恋爱起始日期设定'), _t('格式“YYYY-MM-DD”，例“2018-05-18”'));
    $form->addInput($lovetime);
    $boy = new Typecho_Widget_Helper_Form_Element_Text('boy', NULL, NULL, _t('男生头像设置'), _t('在这里输入头像链接'));
    $form->addInput($boy);
    $girl = new Typecho_Widget_Helper_Form_Element_Text('girl', NULL, NULL, _t('女生头像设置'), _t('在这里输入头像链接'));
    $form->addInput($girl);
    $boyname = new Typecho_Widget_Helper_Form_Element_Text('boyname', NULL, NULL, _t('男生昵称设置'), _t('在这里输入昵称'));
    $form->addInput($boyname);
    $girlname = new Typecho_Widget_Helper_Form_Element_Text('girlname', NULL, NULL, _t('女生昵称设置'), _t('在这里输入昵称'));
    $form->addInput($girlname);


    $loveListPageIcon = new Typecho_Widget_Helper_Form_Element_Text('loveListPageIcon', NULL, NULL, _t('首页Love List页面图标'), _t('在此输入图标直链，将显示在首页Love List小版块中'));
    $form->addInput($loveListPageIcon);
    $loveListPageLink = new Typecho_Widget_Helper_Form_Element_Text('loveListPageLink', NULL, NULL, _t('Love List页面链接'), _t('在此输入Love List页面链接'));
    $form->addInput($loveListPageLink);

    $blessingPageIcon = new Typecho_Widget_Helper_Form_Element_Text('blessingPageIcon', NULL, NULL, _t('首页祝福板页面图标'), _t('在此输入图标直链，将显示在首页祝福板小版块中'));
    $form->addInput($blessingPageIcon);
    $blessingPageLink = new Typecho_Widget_Helper_Form_Element_Text('blessingPageLink', NULL, NULL, _t('祝福页面链接'), _t('在此输入祝福页面链接'));
    $form->addInput($blessingPageLink);

    $timePageIcon = new Typecho_Widget_Helper_Form_Element_Text('timePageIcon', NULL, NULL, _t('首页点点滴滴图标'), _t('在此输入图标直链，将显示在首页点点滴滴小版块中'));
    $form->addInput($timePageIcon);

}




