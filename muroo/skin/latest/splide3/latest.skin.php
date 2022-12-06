<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');

$thumb_width = 930;
$thumb_height = 300;
$list_count = (is_array($list) && $list) ? count($list) : 0;
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
<div id="splide3" class="splide">
	<div class="splide__track">
		<ul class="splide__list">
    <?php
    for ($i=0; $i<$list_count; $i++) {
    $thumb = get_list_thumbnail($bo_table, $list[$i]['wr_id'], $thumb_width, $thumb_height, false, true);

    if($thumb['src']) {
        $img = $thumb['src'];
    } else {
        $img = G5_IMG_URL.'/no_img.png';
        $thumb['alt'] = '이미지가 없습니다.';
    }
    $img_content = '<img src="'.$img.'" alt="'.$thumb['alt'].'" >';
    $wr_href = get_pretty_url($bo_table, $list[$i]['wr_id']);
    ?>
        <li class="splide__slide">
            <a href="<?php echo $wr_href; ?>"><?php echo run_replace('thumb_image_tag', $img_content, $thumb); ?></a>
        </li>
    <?php }  ?>
    <?php if ($list_count == 0) { //게시물이 없을 때  ?>
    <li>게시물이 없습니다.</li>
    <?php }  ?>
    </ul>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
<script>
	document.addEventListener( 'DOMContentLoaded', function () {
	//	new Splide( '#splide' ).mount();
    new Splide( '#splide3', {
			'type'   	: 'loop',
			'direction' : 'ttb',
			'height'   : '10rem',
			'autoplay' : true,
    } ).mount();
	} );

</script>
