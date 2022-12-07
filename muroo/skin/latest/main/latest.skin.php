<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
$thumb_width = 1476;
$thumb_height = 440;
$list_count = (is_array($list) && $list) ? count($list) : 0;

?>

<div class="gall<?php echo $board['bo_table']?>">
	<ul class="gall_lt">
        
    <?php
    for ($i=0; $i<$list_count; $i++) {
    $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height, false, true);
        
    if($thumb['src']) {
        $img = $thumb['src'];
    }
     else {
        $img = G5_THEME_IMG_URL.'/main_no_img.png';
        $thumb['alt'] = '이미지가 없습니다.';
		//$class['no_img'] ='no_img';
        
    }

    $img_content = '<img src="'.$img.'" alt="'.$thumb['alt'].'" class="no_img">';
    ?>
        <li>
            <a href="<?php echo $list[$i]['href'] ?>" class="lt_img"><?php echo $img_content; ?></a>
            <div>테스트용어</div>
        </li>
    <?php }  ?>
    <?php if (count($list) == 0) { //게시물이 없을 때  ?>
    <li class="empty_li">게시물이 없습니다.</li>
    <?php }  ?>
    
    </ul>
</div>


<script>
$('.gall ul').each(function(){
    $(this).bxSlider({
        hideControlOnEnd: true,
        pager:false,
        nextText: '<span id="angle-right"><i class="fa fa-angle-right" aria-hidden="true"></i></span>',
        prevText: '<span id="angle-left"><i class="fa fa-angle-left" aria-hidden="true"></i></span>'


    });
});
</script>


