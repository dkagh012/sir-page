<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (!defined('_INDEX_')) define('_INDEX_', true);

include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');

?>


<!-- 상단 시작 { -->
<header id="header">
    <h1 id="hd_h1"><?php echo $g5['title'] ?></h1>

    <!-- <div class="to_content"><a href="#container">본문 바로가기</a></div> -->
    <!-- <div id="mobile-indicator"></div> -->
    
    <?php
    if(defined('_INDEX_')) { // index에서만 실행
        include G5_MOBILE_PATH.'/newwin.inc.php'; // 팝업레이어
    } ?>


	<div id="hd_wrapper" class="">
      	<div class="gnb_side_btn">
			<a class="sidedrawer-toggle mui--visible-xs-inline-block mui--visible-sm-inline-block js-show-sidedrawer"><i class="fa fa-bars"></i><span class="sound_only">모바일 전체메뉴</span></a>
			<!-- <a class="sidedrawer-toggle mui--hidden-xs mui--hidden-sm js-hide-sidedrawer"><i class="fa fa-bars"></i><span class="sound_only">전체메뉴</span></a> -->
        </div>
        
        <div class="header_ct">
			<div class="hd_sch_wr" id="hd_sch_wr_test">
	        	<!-- <button class="hd_sch_bt"><i class="fa fa-search"></i><span class="sound_only">검색창 열기</span></button> -->
	            <fieldset id="hd_sch">
		            <h2>사이트 내 전체검색</h2>
		            <form name="fsearchbox" action="<?php echo G5_BBS_URL ?>/search.php" onsubmit="return fsearchbox_submit(this);" method="get">
		            <input type="hidden" name="sfl" value="wr_subject||wr_content">
		            <input type="hidden" name="sop" value="and">
		            <input type="text" name="stx" id="sch_stx" placeholder="검색어를 입력해주세요" required maxlength="20">
		            <button type="submit" value="검색" id="sch_submit"><i class="fa fa-search" aria-hidden="true"></i><span class="sound_only">검색</span></button>
		            </form>
				</fieldset>
	        </div>
            

	        <script>
            function fsearchbox_submit(f)
            {
                if (f.stx.value.length < 2) {
                    alert("검색어는 두글자 이상 입력하십시오.");
                    f.stx.select();
                    f.stx.focus();
                    return false;
                }

                // 검색에 많은 부하가 걸리는 경우 이 주석을 제거하세요.
                var cnt = 0;
                for (var i=0; i<f.stx.value.length; i++) {
                    if (f.stx.value.charAt(i) == ' ')
                        cnt++;
                }

                if (cnt > 1) {
                    alert("빠른 검색을 위하여 검색어에 공백은 한개만 입력할 수 있습니다.");
                    f.stx.select();
                    f.stx.focus();
                    return false;
                }

                return true;
            }
            
            $(document).ready(function(){
		        $(document).on("click", ".hd_sch_bt", function() {
			        $("#hd_sch").toggle();
			    });
			    $(".sch_more_close").on("click", function(){
					$("#hd_sch").hide();
				});
			});
            </script>
        </div>
        
        <!-- 오른쪽 배너  -->
            <div id="tnb">
                <?php echo outlogin("theme/basic"); ?>			    
            </div>
            <!-- 왼쪽 알람 -->
            <div id="tnb-arm">         
                <?php if ($is_member) {  ?>
                    <?php include_once(G5_PATH.'/plugin/srd-pushmsg/pushmsg_view.php'); ?>
                <?php }  ?>
            </div>   
        
	</div>
    
</header>
<!-- } 상단 끝 -->
        


<aside id="sidedrawer">
        

<div id="logo">

        <a href ="http://dkagh012.dothome.co.kr" class="logo_a">R O G O</a>
</div>

    <div id="gnb">
        <div class="gnb_side">
        	<h2>메인메뉴</h2>
            <ul id="gnb_1dul">
            <?php
            $menu_datas = get_menu_db(1, true);
			$i = 0;
			foreach( $menu_datas as $row ){
				if( empty($row) ) continue;
            ?>

                <?php if($row['me_name']=="자유게시판") {?>
                    <li class="gnb_1dli <?php echo $_GET["bo_table"]=="free" ? "active":"gnb_1dli_on gnb_1dli_over2 ";?>">
                
                    <?php }else if($row['me_name']=="갤러리"){?>
                        <li class="gnb_1dli <?php echo $_GET["bo_table"]=="gallery" ? "active":"gnb_1dli_on gnb_1dli_over2 ";?>">
                
                        <?php }else if($row['me_name']=="공지사항"){?>
                        <li class="gnb_1dli <?php echo $_GET["bo_table"]=="notice" ? "active":"gnb_1dli_on gnb_1dli_over2 ";?>">
                
                        <?php }else if($row['me_name']=="질문답변"){?>
                        <li class="gnb_1dli <?php echo $_GET["bo_table"]=="qa" ? "active":"gnb_1dli_on gnb_1dli_over2 ";?>">
                
                        <?php }else if($row['me_name']=="홈"){?>
                        <li class="gnb_1dli <?php echo $_GET["bo_table"]=="" ? "active":"gnb_1dli_on gnb_1dli_over2 ";?>"> 
                
                        <!-- ==> 홈위치 확인필요 -->
                
                        <?php }?>
                
                        <a href="<?php echo $row['me_link']; ?>" target="_<?php echo $row['me_target']; ?>" class="gnb_1da"><?php echo $row['me_name'] ?></a>
                        <a class=""></a>
                    
                        
                
                <?php
                    $k = 0;
                    foreach( (array) $row['sub'] as $row2 ){
						if( empty($row2) ) continue;

                        if($k == 0)
                            echo '<button type="button" class="btn_gnb_op"><span class="sound_only">하위분류</span></button><ul class="gnb_2dul">'.PHP_EOL;
                    ?>
                        <li class="gnb_2dli"><a href="<?php echo $row2['me_link']; ?>" target="_<?php echo $row2['me_target']; ?>" class="gnb_2da"><span></span><?php echo $row2['me_name'] ?></a></li>
                    <?php
					$k++;
                    }	//end foreach $row2

                    if($k > 0)
                        echo '</ul>'.PHP_EOL;
                    ?>
                </li>
            <?php
			$i++;
            }	//end foreach $row

            if ($i == 0) {  ?>
                <li id="gnb_empty">메뉴 준비 중입니다.<?php if ($is_admin) { ?> <br><a href="<?php echo G5_ADMIN_URL; ?>/menu_list.php">관리자모드 &gt; 환경설정 &gt; 메뉴설정</a>에서 설정하세요.<?php } ?></li>
            <?php } ?>
            </ul>
		</div>
	</div>
</aside>            



<!-- 컨텐츠 시작 { -->
<div id="content-wrapper">
	<div id="wrapper">
		<!-- container 시작 { -->
		<div id="container">
			<div class="conle">
			    <?php if (!defined("_INDEX_") && !(defined("_H2_TITLE_") && _H2_TITLE_ === true)) {?>
			    	<h2 id="container_title" class="top" title="<?php echo get_text($g5['title']); ?>"><?php echo get_head_title($g5['title']); ?></h2>
			    <?php } ?>