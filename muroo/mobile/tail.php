<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>
			</div>
			<!-- 왼쪽 사이드 -->
			<div class="conri">
				<?php echo outlogin("theme/basic_side"); ?>
				
				<?php echo popular("theme/basic"); // 인기검색어, 테마의 스킨을 사용하려면 스킨을 theme/basic 과 같이 지정  ?>
				
				<!--  공지사항 최신글 { -->
			    <?php
			    // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
			    // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
			    // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
			    echo latest('theme/notice', 'notice', 4, 23);

			    ?>
			    
			    <?php echo poll("theme/basic"); // 설문조사 ?>
			    <!-- } 공지사항 최신글 끝 -->
    
			</div>
		</div>
		<!-- } container 끝 -->
	
		
		<footer id="footer">
  		<button type="button" id="top_btn"><i class="fa fa-arrow-up" aria-hidden="true"></i><span class="sound_only">상단으로</span></button>
			<script>
            $(function() {
                // 폰트 리사이즈 쿠키있으면 실행
                font_resize("html_wrap", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));

                // '상단으로' 버튼
                $("#top_btn").on("click", function() {
                    $("html, body").animate({scrollTop:0}, '500');
                    return false;
                });
            });
            </script>
			<?php
		    if ($config['cf_analytics']) {
		        echo $config['cf_analytics'];
		    }
		    ?>
		</footer>
	</div>
	<!-- } wrapper 끝 -->
</div>
<!-- } 컨텐츠 끝 -->

<?php
include_once(G5_THEME_PATH."/tail.sub.php");
?>