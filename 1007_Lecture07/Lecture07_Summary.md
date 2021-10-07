# Lecture07 크로스 도메인을 통한 rss 피드 받기
Key Word : 

<hr/>

 ## 1. 크로스 도메인 차단 : rss
 
 rss를 통해 원하는 블로그 혹은 신문사 등의 웹 페이지에서 새로올라오는 기사, 아티클 등을 받아 볼 수 있다.   
 
 개인적으로 자주 읽어보는 기술 블로그가 주로 티스토리에 많은지라 티스토리의 rss 주소를 받아와 보았다.   
   
 티스토리 rss 사이트 주소 : https://아이디.tistory.com/rss

<br>

### 예제

```html
<script>
$(function() {
    // 향로님 기술블로그 예시
	$.ajax({
		url:"https://jojoldu.tistory.com/rss",
		dataType:"xml",
		success:function(data) {
			console.log(data);
		}
	});
});
</script>
</head>
<body>
  <div class="wrap"></div>
</body>
```

<br>

### 결과 화면 - 차단

![image](https://user-images.githubusercontent.com/84966961/136302940-b9ce8bf2-ceb3-4adf-b5df-810ab935f1a4.png)


<br><br><hr/>

 ## 2. 크로스 도메인 기능 구현 : rss의 데이터를 php로 받아오기
 
 php를 활용하여 정보를 받아 올 수 있다. (닷홈 도메인 서버는 php 기반이기 때문에 php를 활용하였다.)    
    
 기존 jQuery의 ajax를 활용하면 막히지만 php로 젇보를 가공한 후 처리를 한다면 가능하다.

<br>

### 예제

```php
<?
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_URL, 
    "https://jojoldu.tistory.com/rss");
    $url_source = curl_exec($ch);
    curl_close($ch);

    echo $url_source; 
?>
```

<br>

### 결과 화면

![image](https://user-images.githubusercontent.com/84966961/136303384-533d1cce-a1f0-49cc-b1be-a7d6ba8da007.png)



<br><br><hr/>

 ## 3. php로 정리된 xml 파일 받기
 
 xml파일을 정리하여 출력해보자

<br>

### 예제

```html
<script>
$(function() {
	$.ajax({
		url:"news.php",
		dataType:"xml",
		success: function(data) {
            // 배열로 item들을 받아와서 items에 넣음
			var $items = $(data).find("item");

            // 아이템이 있으면
			if($items.length > 0) {
				$items = $items.slice(0,10);
				var $ulTag = $("<ul />");
                // 각각 뿌려줌
				$.each($items, function(i, o) {
					var $title = $(o).find("title").text();
					var $link = $(o).find("link").text();
					
                    // 링크 속성 넣음
					var $aTag = $("<a />")
					.attr({
						"href":$link,
						"target":"_blank"
						})
					.text($title);

                    // a태그 넣음
					var $liTag = $("<li />")
					.append($aTag);

					$ulTag.append($liTag);
				});
				$(".wrap").append($ulTag);
			}
		}
	});
});
</script>
</head>
<body>
	<div class="wrap"></div>
</body>
```

<br>

### 결과 화면

![image](https://user-images.githubusercontent.com/84966961/136306096-ef661b25-9cad-444f-b945-51205a76216d.png)



<br><br><hr/>

 ## 4. Ajax를 이용한 로그인 과정 : 
 
 먼저 login html 파일에서 id와 pwd를 보내고 php(닷홈에서는 무료로 php만을 해주기 때문)파일에서 받아서 처리를 한다.
 
 예시로 db에서 다른 정보들을 보내고 정보들을 다시 리턴하면서 클라이언트 페이지에서 출력하도록 해준다.
 
 이런 방식의 장점은 Ajax를 사용하기 때문에 로그인 후 새로고침을 통하여 데이터를 받아오는 것이 아니라 비동기 처리로 깜박임없이 데이터가 들어오게 된다.

<br>

### 예제

```html
<script>
$(function() {
    // 로그인 폼을 변수에 초기화하여 사용함.
  var $frm = $(".login_f");
  
  // submit : 폼에 대한 이벤트 처리
  $frm.on("submit", function(e) {
    // ajax로 비동기 처리 할 것이기 때문에 submit 클릭시 바로 넘어가면 안됨.
    // 그렇기 때문에 form과 input의 기본 기능을 제거함
    e.preventDefault();

    // 쿼리 스트링 형식으로 만들어 초기화함.
    var myData = $frm.serialize();

    // ajax를 통한 데이터 처리
    $.ajax({
      type: "POST", // post 방식으로 데이터를 php로 보내며
      url: $frm.attr("action"), // action의 주소값으로 보냄
      data: myData, // form 내부의 데이터를 serialize 하였고 그것을 보냄
      success:function(res) {   // 만약 성공하면(success:) response를 받아서 익명함수 실행
        if(res) {   
         var jsonData = JSON.parse(res);    // json 형식으로 파싱하여 변수에 초기화
         var message = jsonData.user_name +     // 데이터 중 이름값 가져와서 "반갑습니다" 메세지 출력
         "( " + jsonData.user_id + " )" 
         + "님 반갑습니다";
         $(".login_wrap").html(message);
        }
      }
    });
  });
});
</script>
</head>
<body>
<div class="login_wrap">
  <h1>로그인</h1>
  <form class="login_f" method='post' action='member_login_ok.php'>
    <p>
    <label for="user_id">아이디</label>
    <input type="text" name="user_id" id="user_id" value="korean" />
    </p>
    <p>
    <label for="user_pw">비밀번호</label>
    <input type="password" name="user_pw" id="user_pw" value="12345" />
    </p>
    <p><input type="submit" value="로그인" class="login_btn" /></p>
  </form>
</div>
</body>
```

```php
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
```

<br>

### 결과 화면

![image](https://user-images.githubusercontent.com/84966961/136312066-ebdc43c9-6ca1-498c-824f-2d796fc1f479.png)

![image](https://user-images.githubusercontent.com/84966961/136312048-5480468b-3070-432f-b2c3-a6abfb8ea311.png)


### 특이점

```html
        if(res) {   
         var jsonData = JSON.parse(res);    // json 형식으로 파싱하여 변수에 초기화
         var message = jsonData.user_name +     // 데이터 중 이름값 가져와서 "반갑습니다" 메세지 출력
         "( " + jsonData.user_id + " )" 
         + "님 반갑습니다";
         $(".login_wrap").html(message);
```

스크립트 마지막 부분에서 로그인시 html로 메세지를 넣어서 모든 화면이 초기화되며 메세지가 뜨는듯 하다.


<br><br><hr/>
