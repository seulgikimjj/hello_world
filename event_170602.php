<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<?
/*
//백운세팅으로 인한 주석처리 - 2017-07-20 진선
include_once(dirname(__FILE__)."/../../include/inc.php");
if($_POST['message'])
{
	if(is_login())
	{
		$insertq = "INSERT INTO `event_0602_comment` (`id`,`name`,`message`,`fcm`) VALUES ('".get_userid()."','".$row_member['name']."','".$_POST['message']."','".$_SESSION['rg']."')";
	}
	else
	{
		$insertq = "INSERT INTO `event_0602_comment` (`name`,`message`,`fcm`) VALUES ('".uniqid()."','".$_POST['message']."','".$_SESSION['rg']."')";
	}

	_MQ_noreturn($insertq);
}
?>
<link href="/include/bootstrap/css/jj_bootstrap.css" rel="stylesheet" type="text/css">
<link href="/skin/default_mobile/css/event_2017.css" rel="stylesheet" type="text/css">
<div class="event_box_wrap">
	<!-- 이벤트 배너 -->
	<div class="jj">
	<!--
		<div class="img_top_event_main">
			<img src="/skin/default_mobile/images/event/img_event_170602_banner.jpg" alt="넘나 사랑스러운 카톡이모티콘 무료추첨이벤트!">
		</div>
	-->
	</div>
	<!--// 이벤트 배너 -->
	<!-- 이벤트 내용 -->
	<div class="jj">
		<!-- 경품 -->
		<div class="event_gift">
			<h4 class="hide">경품</h4>
			<img src="/skin/default_mobile/images/event/img_event_170602_giveaway.jpg" alt="단 10초면 참여완료! 카톡이모티콘 무료추첨이벤트! 이모티콘 : 쥐방울은 사랑스렁 쥐방울">
		</div>
		<!--// 경품 -->
		<!-- 참여방법/유의사항 -->
		<div class="jj note_wrap">
			<div class="note_text">
				<h4>참여방법</h4>
				<dl>
				<!-- 며칠까지인지 질문 -->
					<dt><span class="glyphicon glyphicon-chevron-right"></span>
					응모방법&nbsp;&nbsp;:&nbsp;&nbsp;</dt>
					<dd>하단 <span class="em">[응모하기]</span> 완료 후 덧글 남기면 끝!</dd>
				</dl>
				<dl>
					<dt><span class="glyphicon glyphicon-chevron-right"></span>
					응모기간&nbsp;&nbsp;:&nbsp;&nbsp;</dt>
					<dd>~ 6월 8일</dd>
				</dl>
				<dl>
					<dt><span class="glyphicon glyphicon-chevron-right"></span>
					경품발표&nbsp;&nbsp;:&nbsp;&nbsp;</dt>
					<dd>6월 12일 카톡으로 알려드려요~</dd>
				</dl>
				<dl>
					<dt><span class="glyphicon glyphicon-chevron-right"></span>
					추첨방식&nbsp;&nbsp;:&nbsp;&nbsp;</dt>
					<dd>무작위 랜덤추첨</dd>
				</dl>
			</div>
			<div class="note_text">
				<h4>유의사항</h4>
				<ul>
					<li>
						<span>
						<span class="glyphicon glyphicon-chevron-right"></span>
						<span class="list_text">체크 표시된 항목은 <span class="em">필수입력</span> 입니다.</span></span>
					</li>
					<li>
						<span>
						<span class="glyphicon glyphicon-chevron-right"></span>
						<span class="list_text"><span class="em">1인당 1회만</span> 참여가 가능합니다.</span></li>
					</li>
				</ul>
			</div>
		</div>
		<!--// 참여방법/유의사항 -->
		<!-- 응모 modal 버튼 -->
		<div class="jj form_entry" id="test_box">
			<!--<button type="button" class="btn btn-default btn-lg btn-block center-block" data-toggle="modal" data-target="#myModal">응모하기</button>-->
<?php
	//$twoq = "select * from `event_0602_member` where `id` = '".get_userid()."'";
	//$twor = _MQ($twoq);
	//if(count($twor) < 1)
	//{
?>
			<!-- 응모 전 -->
			<button type="button" class="btn btn-default btn-lg btn-block center-block" onClick="pop()" id="btn_submit_run">응모하기</button>
			<button type="button" class="btn btn-default btn-lg btn-block center-block btn_suc hide" id="btn_submit_done">응모완료</button>
<?php
	//}else{
?>
			<!--응모 후-->
			<!--<button type="button" class="btn btn-default btn-lg btn-block center-block btn_suc" id="btn_submit_done">응모완료</button>-->
<?php
//	}
?>
		</div>
		<!--// 응모 modal 버튼 -->
	</div>
		<!--// 이벤트 내용 -->
		<?php

			if(isset($_GET['png']) && $png != "")
			{
				$png = $_GET['png'];
			}
			else
			{
				$png = 0;
			}
			// id, proIMG, time, message, num, like
			$dataq = "SELECT comm.`id`, mem.`proImg`, comm.`time`, comm.`message`, comm.`num`, comm.`like` FROM `event_0602_comment` AS comm LEFT OUTER JOIN `odtMember` AS mem ON comm.`id` = mem.`id` ORDER BY `time` DESC LIMIT ".$png."0,10";
			$datar = _MQ_assoc($dataq);
			$dataq2 = "SELECT * FROM `event_0602_comment`";
			$datar2 = _MQ_assoc($dataq2);
			$comment_cnt = count($datar2);
			$iioo = 0;
		?>
		<!-- 이벤트 댓글등록 -->
		<div class="jj event_box_re">
			<h5 class="re_title">
			희망 댓글을 남겨주세요~ <small>[ <?=number_format($comment_cnt)?> 개]</small>
			</h5>
			<!-- 이벤트 댓글 등록 폼 -->
			<div class="jj container-fluid">
				<div class="jj panel">
					<div class="jj">
						<form method="post" action="/?pn=event_170602">
							<div class="jj row">
								<div class="jj col-xs-9">
									<textarea name="message" class="jj form-control"></textarea>
								</div>
								<div class="jj col-xs-3 btn_submit">
									<button type="submit" class="jj btn btn-block">등록</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!--// 이벤트 댓글 등록 폼 -->
		</div>
		<!--// 이벤트 댓글등록 -->
	</div>

	<div class="jj">
		<div class="jj container-fluid">
			<div class="jj row">
				<div class="jj col-xs-12">
					<div class="jj panel">
						<div class="jj panel-footer">
							<?php
							foreach($datar as $v)
							{
								
							?>
							<!-- 이벤트 댓글 목록 -->
							<div class="jj row user_re_wrap" id="replay_div">
								<div class="user_face">
									<img src="<?=$v['proImg']?>" class="jj img-responsive" onerror="this.src='/include/images/ptalk_img/p1.png'">
								</div>
								<div class="user_re_text_wrap">
									<div class="user_re_info">
										<div class="jj alert" role="alert">
											<p>
												<?php
													if(substr($v['name'], 0, 2) == "59")
													{
														echo "".$v['name'];
													}
													else
													{
														echo "".substr($v['name'], 0, -6)."**";
													}
												?>
											</p>
											<p><?=$v['time']?></p>
										</div>
									</div>
									<div class="user_re_text">
										<?=nl2br($v['message'])?>
										<div class="jj user_re_like">
											<span onclick="like_add(<?=$v['num']?>, <?=$v['like']?>)"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;좋아요 <span id="like<?=$v['num']?>"><?=number_format($v['like'])?></span>개</span>
											<input type="hidden" value="0" id="hidden<?=$v['num']?>">
										</div>
									</div>
								</div>
							</div>
							<!--// 이벤트 댓글 목록 -->
							<?php
								}
							?>
						</div>
					</div>
				</div>
			</div>
			<div class="jj row">
				<nav class="jj col-xs-12 text-center">
					<?php
					if($png <= 1)
					{
						if($png == 0)
						{
							// png == 0
					?>
					<ul class="jj pagination">
						<li>
							<a href="#" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
							</a>
						</li>
						<li class="jj active"><a href="/?pn=event_170602&png=0">1</a></li>
						<li><a href="/?pn=event_170602&png=1">2</a></li>
						<li><a href="/?pn=event_170602&png=2">3</a></li>
						<li><a href="/?pn=event_170602&png=3">4</a></li>
						<li><a href="/?pn=event_170602&png=4">5</a></li>
						<li>
							<a href="/?pn=event_170602&png=6" aria-label="Next">
								<span aria-hidden="true">&raquo;</span>
							</a>
						</li>
					</ul>
					<?php
						}
						else
						{
							// png == 1
					?>
					<ul class="jj pagination">
						<li>
							<a href="#" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
							</a>
						</li>
						<li><a href="/?pn=event_170602&png=0">1</a></li>
						<li class="jj active"><a href="/?pn=event_170602&png=1">2</a></li>
						<li><a href="/?pn=event_170602&png=2">3</a></li>
						<li><a href="/?pn=event_170602&png=3">4</a></li>
						<li><a href="/?pn=event_170602&png=4">5</a></li>
						<li>
							<a href="/?pn=event_170602&png=6" aria-label="Next">
								<span aria-hidden="true">&raquo;</span>
							</a>
						</li>
					</ul>
					<?php
						}
					}
					else // png >= 2
					{
						$jj_temp_png = $png;
					?>
					<ul class="jj pagination">
						<li>
							<a href="/?pn=event_170602&png=<?=$jj_temp_png-3?>" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
							</a>
						</li>
						<li><a href="/?pn=event_170602&png=<?=$jj_temp_png-2?>"><?=$jj_temp_png-1?></a></li>
						<li><a href="/?pn=event_170602&png=<?=$jj_temp_png-1?>"><?=$jj_temp_png?></a></li>
						<li class="jj active"><a href="/?pn=event_170602&png=<?=$jj_temp_png?>"><?=$jj_temp_png+1?></a></li>
						<li><a href="/?pn=event_170602&png=<?=$jj_temp_png+1?>"><?=$jj_temp_png+2?></a></li>
						<li><a href="/?pn=event_170602&png=<?=$jj_temp_png+2?>"><?=$jj_temp_png+3?></a></li>
						<li>
							<a href="/?pn=event_170602&png=<?=$jj_temp_png+3?>" aria-label="Next">
								<span aria-hidden="true">&raquo;</span>
							</a>
						</li>
					</ul>
					<?php
					}

					?>
				</nav>
			</div>
			<br><br><br><br>
		</div>

		<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">정보 입력</h4>
					</div>
					<div class="modal-body">
						<!-- 응모 폼 -->
						<iframe name="comm_if" id="comm_if" style="width:0px;height:0px;border:0px"></iframe>
						<div class="jj event_box form_entry">
							<form action="/?pn=event_170602_msg" method="post" id="frm" target="comm_if">
								<div class="form-group form-group-lg">
									<label for="userName">
										<span class="glyphicon glyphicon-ok"></span>신청자 이름
									</label>
									<input type="text" class="jj form-control" id="userName" name="userName" placeholder="홍길동">
								</div>
								<div class="form-group form-group-lg">
									<label for="userPhone">
									<span class="glyphicon glyphicon-ok"></span>휴대폰 번호
									</label>
									<input type="number" class="jj form-control" id="userPhone" name="userPhone" placeholder="- 를 제외하고 입력해주세요">
									<ul>
										<li>
											<span class="em small">&bull; 입력하신 번호로 관련 안내가 진행되오니 정확하게 입력해주세요</span>
										</li>
									</ul>
								</div>
									<div class="form-group">
										<label for="infoColAgree">개인정보 수집동의</label>
										<textarea class="form-control hide" readonly="readonly" rows="3" cols="100" id="lice_text">이벤트 진행 및 경품 배송을 위해 입력된 개인정보를 수집합니다. 수집한 개인정보는 이외의 목적으로는 사용하지 않으며, 이벤트 종료 즉시 파기합니다. 개인정보의 수집 및 이용에 대한 동의를 거부할 수 있으며, 이 경우 상품 수령이 불가능합니다.
										</textarea>
										<div class="checkbox">
											<label>
												<input type="checkbox" id="userAg"><span onClick="lice()">개인정보 수집에 동의합니다</span>
											</label>
										</div>
									</div>
								<button type="button" class="btn btn-default btn-lg btn-block center-block" onClick="ok()" id="btn_sub">응모하기</button>
							</form>
						</div>
						<!--// 응모 폼 -->
					</div>
				</div>
			</div>
		</div>
		<!--// Modal -->
	</div>

<script>
	function ok()
	{
		
		var name = document.getElementById("userName");
		var phone = document.getElementById("userPhone");
		var ch = document.getElementById("userAg");
		if(name.value == "")
		{
			alert("이름을 입력해주세요");
			name.focus();
		}
		else if(phone.value == "")
		{
			alert("전화번호를 정확히 입력해주세요");
			phone.focus();
		}
		else if(!ch.checked)
		{
			alert("개인정보 수집에 동의해주세요");
			ch.focus();
		}
		else
		{
			document.getElementById("frm").submit();

			$('#myModal').modal('hide');

			$('#btn_submit_run').removeClass("show");
			$('#btn_submit_done').removeClass("hide");

			$('#btn_submit_run').addClass("hide");
			$('#btn_submit_done').addClass("show");
		}
	}
</script>
<script>
function like_add(id, like)
{
	if(document.getElementById("hidden"+id).value == "0")
	{
		var temp = (like*1)+1;
		document.getElementById("like"+id).innerHTML = temp;
		document.getElementById("hidden"+id).value = 1;
		$.ajax({
		method      : 'POST',
		url         : 'http://moongssa.kr/?pn=app_event_ajax&id='+id
		});
	}
}
function lice()
{
}
</script>
<script>
function pop()
{
	$('#myModal').appendTo("body").modal('show');
}
</script>
*/