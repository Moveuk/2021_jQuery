<?php
	// id pwd 없으면(!) exit php 종료
	if(!isset($_POST['user_id']) || 
	!isset($_POST['user_pw'])) exit;

	// id가 있으니 넣어주고
	$user_id = $_POST['user_id'];
	$user_pw = $_POST['user_pw'];

	// 배열형태로 변수에 저장함
	// 실제로는 db에서 받아올 것임.
	$members = array(
		'korean'=>array('pw'=>'12345', 
		'name'=>'박부장'),
		'seoul'=>array('pw'=>'56789', 
		'name'=>'홍대리')
	);

	// 값이 있으면 다시 클라이언트로 echo 보내줌.
	if(isset($members[$user_id]) &&  
	$members[$user_id]['pw'] == $user_pw) {
		// 데이터 구조는 JSON 형식
		echo '{"user_id":"'.$user_id.'", 
		"user_name": "'.$members[$user_id]['name'].'"}';
	}
?>
