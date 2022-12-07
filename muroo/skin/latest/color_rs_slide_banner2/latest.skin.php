<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

$img_w = 1600; // 이미지($img) 가로 크기
$img_h = 550; // 이미지($img) 세로 크기
?>

<!-- <script type="text/javascript" src="<?=$latest_skin_url?>/js/superslide.2.1.js"></script> -->

<style type="text/css">

.fullSlide{width:100%;position:relative;height:<?=$img_h?>px;background:#000;}
.fullSlide .bd{margin:0 auto;position:relative;z-index:0;overflow:hidden;}
.fullSlide .bd ul{width:100% !important;}
.fullSlide .bd li{width:100% !important;height:<?=$img_h?>px;overflow:hidden;text-align:center; background-repeat:no-repeat;}
.fullSlide .bd li a{display:block;height:<?=$img_h?>px;}
.fullSlide .hd{width:100%;position:absolute;z-index:1;bottom:0;left:0;height:30px;line-height:30px;}
.fullSlide .hd ul{text-align:center;}
.fullSlide .hd ul li{cursor:pointer;display:inline-block;*display:inline;zoom:1;width:42px;height:11px;margin:1px;overflow:hidden;background:#000;filter:alpha(opacity=50);opacity:0.5;line-height:999px;}
.fullSlide .hd ul .on{background:#ffff00;}
.fullSlide .prev,.fullSlide .next{display:block;position:absolute;z-index:1;top:50%;margin-top:-30px;left:15%;z-index:1;width:40px;height:60px;background:url(<?=$latest_skin_url?>/img/slider-arrow.png) -126px -137px #000 no-repeat;cursor:pointer;filter:alpha(opacity=50);opacity:0.5;display:none;}
.fullSlide .next{left:auto;right:15%;background-position:-6px -137px;}

</style>

<div class="fullSlide">
	<div class="bd">
		<ul>
		<?php
		for($i=0; $i<count($list); $i++){
			$thumbs = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $img_w, $img_h);
		if($thumbs['src']) {
			$img = $thumbs['src'];
			}?>
			<li><a title="<?=$list[$i]['subject']?>" href="<?php echo $list[$i]['href'];?>" target="_self"><img width="100%" height="<?=$img_h?>" src="<?=$img?>" /> </a></li>
		<?}?>
		</ul>
	</div>
	<div class="hd"><ul></ul></div>
	<span class="prev"></span>
	<span class="next"></span>
</div>

<script type="text/javascript">
$(".fullSlide").hover(function(){
    $(this).find(".prev,.next").stop(true, true).fadeTo("show", 0.5)
},
function(){
    $(this).find(".prev,.next").fadeOut()
});
$(".fullSlide").slide({
    titCell: ".hd ul",
    mainCell: ".bd ul",
    effect: "fold",
    autoPlay: true,
    autoPage: true,
    trigger: "mouseover",
    startFun: function(i) {
        var curLi = jQuery(".fullSlide .bd li").eq(i);
        if ( !! curLi.attr("_src")) {
            curLi.css("background-image", curLi.attr("_src")).removeAttr("_src")
        }
    }
});
</script>
