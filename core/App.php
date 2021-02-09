<?php
/**
 * Author: Veen Zhao
 * CreateTime: 2020/9/5 18:26
 */

class App
{
    public static function parseShortCode($content)
    {
        $content = do_shortcode($content);
        return $content;
    }

    public static function avatarQQ($ctx)
    {
        if ($ctx) {
            if (strpos($ctx, "@qq.com") !== false) {
                $email = str_replace('@qq.com', '', $ctx);
                if (is_numeric($email)) {
                    return "//q1.qlogo.cn/g?b=qq&nk=" . $email . "&";
                } else {
                    $str = $email . '@qq.com';
                    $email = md5($str);
                    return "//sdn.geekzu.org/avatar/" . $email . "?";
                }
            } else {
                $email = md5($ctx);
                return "//sdn.geekzu.org/avatar/" . $email . "?";
            }
        } else {
            return "//sdn.geekzu.org/avatar/null?";
        }
    }

}

function loveListAcc($atts, $content = '')
{
    if (!preg_match_all("/(.?)\[(item)\b(.*?)(?:(\/))?\](?:(.+?)\[\/item\])?(.?)/s", $content, $matches)) {
        return do_shortcode($content);
    } else {
        for ($i = 0; $i < count($matches[0]); $i++) {
            $matches[3][$i] = shortcode_parse_atts($matches[3][$i]);
        }
        $out = '<div class="accordion mx-auto mt-5" id="loveList">';
        foreach ($matches[3] as $key => $value){
            $out .= '<div class="card">';
            $out .= '<div class="card-header p-1 bg-white" id="heading'.$key.'"><h2 class="mb-0">';
            $out .= '<span class="btn collapsed ml-auto d-flex align-items-center" type="button" data-toggle="collapse" data-target="#collapse'.$key.'" aria-expanded="false" aria-controls="collapse'.$key.'">';
            if ($value['status'] == "0")
                $out .= '<img class="statusIcon" src="'.Helper::options()->themeUrl.'/svg/todo.svg">';
            else
                $out .= '<img class="statusIcon" src="'.Helper::options()->themeUrl.'/svg/ok.svg">';
            $out .= '<strong>'.$matches[5][$key].'</strong>';
            $out .= '</span></h2></div>';
            $out .= '<div id="collapse'.$key.'" class="collapse" aria-labelledby="heading'.$key.'" data-parent="#loveList">';
            $out .= '<div class="card-body p-0">';
            $out .= '<section style="background-image: url('.$value['img'].')"></section>';
            $out .= '</div></div></div>';
        }
        $out .= '</div>';
        return $out;
    }
}
add_shortcode('loveList', 'loveListAcc');