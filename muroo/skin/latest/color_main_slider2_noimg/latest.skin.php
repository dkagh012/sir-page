<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

$img_w = 170; // 이미지($img) 가로 크기
$img_h = 150; // 이미지($img) 세로 크기
?>
<style type="text/css">
 
.h_tonglan {width:958px;background:#FFFFFF;padding:14px 10px;margin:0 auto;}
.h_tonglan dl {width:938px;height:32px;_height:32px;margin-left:10px;margin-right:10px;}
.h_tonglan dl dd {float:left;width:196px;height:32px;_height:32px;}
.h_tonglan dl dt {float:right;width:700px;text-align:right;line-height:25px;min-height:25px;color:#6A6A6A;}
.h_tonglan ul {overflow:hidden;}
.h190px {overflow:hidden;margin-left:10px;margin-right:10px;padding-bottom:3px;padding-top:14px;}
.h190px img {width:938px;border:0px;}

.h218px {width:938px;height:230px;_height:230px;padding-top:14px;margin:0 auto;}
.h218px th {padding-top:67px;}
.h218px td {overflow:hidden;}
#scrollbox ul {overflow:hidden;}
#scrollbox ul LI {FLOAT:left;width:150px;_width:150px;height:230px;_height:230px;vertical-align:top;font-size:12px;line-height:18px;min-height:18px;text-align:center;padding:0px;overflow:hidden;}
#scrollbox ul LI img{ width:130px;height:160px;border:0px;}
.pointer {CURSOR: pointer}
#scrollbox h3{color:#333300;font-size:14px;font-weight:700;margin:-14px 0 5px 0;}
#scrollbox h4{color:#660000;font-size:12px;font-weight:700;margin-top:10px;}

a {color:#252525;text-decoration:none;}
a:hover {color:#058F04;text-decoration:none;}
a:active {color:#058F04;text-decoration:none;}
</style>

<script type="text/javascript" src="<?=$latest_skin_url?>/js/script.js"></script>

<div class="h_tonglan">
    <ul class="h218px">
<table width="938" height="200" align="center" cellpadding="0" cellspacing="0" border="0">
	<tr><th width="19" valign="top"><img src="<?=$latest_skin_url?>/img/leftjt.gif" class="pointer" id="arrLeft" border="0" /></th>
    <td width="900" valign="top">
    	<div id="scrollbox">
        <ul>
		<?php
		for($i=0; $i<count($list); $i++){
			$thumbs = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $img_w, $img_h, false, false);
		if($thumbs['src']) {
			$img = $thumbs['src'];
		}else{
			continue;
			}?>
			<li><a href="<?php echo $list[$i]['href'];?>" title="<?=$list[$i]['subject']?>"><img src="<?=$img?>" alt="<?=$list[$i]['subject']?>" /><br /><h4><?=$list[$i]['ca_name']?></h4><br /><h3><?php echo mb_strimwidth($list[$i]['subject'], '0', '15', '', 'utf-8');?></h3></a></li>
		<?}?>
        </ul>
        </div>
    </td>
    <th width="19" valign="top"><img src="<?=$latest_skin_url?>/img/rightjt.gif" class="pointer" id="arrRight" border="0" /></th></tr>
</table>
<SCRIPT language=javascript type=text/javascript>
		var scrollPic_02 = new ScrollPic();
		scrollPic_02.scrollContId   = "scrollbox";
		scrollPic_02.arrLeftId      = "arrLeft";
		scrollPic_02.arrRightId     = "arrRight";
		scrollPic_02.frameWidth     = 900; // 출력 프레임 너비
		scrollPic_02.pageWidth      = 900; // 페이지 너비
		scrollPic_02.speed          = 20; // 이동 속도 (작을수록 빠릅니다)
		scrollPic_02.space          = 20; // 픽셀을 이동할 때마다 (픽셀 단위로, 더 빠르게)
		scrollPic_02.autoPlay       = true; // 자동 실행 true or false
		scrollPic_02.autoPlayTime   = 4; // 자동 재생 간격 (초)
		scrollPic_02.initialize(); // 초기화
</SCRIPT>
    </ul>
</div>