<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (!$board['bo_use_sns']) return;

$sns_msg = urlencode(str_replace('\"', '"', $view['subject']));
//$sns_url = googl_short_url('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
//$msg_url = $sns_msg.' : '.$sns_url;

/*
$facebook_url  = 'http://www.facebook.com/sharer/sharer.php?s=100&p[url]='.$sns_url.'&p[title]='.$sns_msg;
$twitter_url   = 'http://twitter.com/home?status='.$msg_url;
$gplus_url     = 'https://plus.google.com/share?url='.$sns_url;
*/

$sns_send  = G5_BBS_URL.'/sns_send.php?longurl='.urlencode('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
//$sns_send .= '&amp;title='.urlencode(utf8_strcut(get_text($view['subject']),140));
$sns_send .= '&amp;title='.$sns_msg;

$facebook_url = $sns_send.'&amp;sns=facebook';
$twitter_url  = $sns_send.'&amp;sns=twitter';
$gplus_url    = $sns_send.'&amp;sns=gplus';
?>

<?php if($config['cf_kakao_js_apikey']) { ?>
<script src="//developers.kakao.com/sdk/js/kakao.min.js"></script>
<script src="<?php echo G5_JS_URL; ?>/kakaolink.js"></script>
<script>
    // 사용할 앱의 Javascript 키를 설정해 주세요.
    Kakao.init("<?php echo $config['cf_kakao_js_apikey']; ?>");
</script>
<?php } ?>

<h3>공유하기</h3>
<ul>
    <li><a href="<?php echo $facebook_url; ?>" target="_blank" class="sns_f"><i class="fa fa-facebook" aria-hidden="true"></i><span class="sound_only">페이스북으로 보내기</span></a></li>
    <li><a href="<?php echo $gplus_url; ?>" target="_blank" class="sns_g"><i class="fa fa-twitter" aria-hidden="true"></i><span class="sound_only">구글플러스로 보내기</span></a></li>
    <li><a href="<?php echo $twitter_url; ?>" target="_blank" class="sns_t"><i class="fa fa-google" aria-hidden="true"></i><span class="sound_only">트위터로 보내기</span></a></li>
    <?php if(G5_IS_MOBILE && $config['cf_kakao_js_apikey']) { ?>
    <li><a href="javascript:kakaolink_send('<?php echo str_replace(array('%27', '\''), '', $sns_msg); ?>', '<?php echo urlencode('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); ?>');" class="sns_k"><img src="<?php echo G5_SNS_URL; ?>/icon/kakaotalk.png" alt="카카오톡으로 보내기" width="20"></a></li>
    <?php } ?>
</ul>