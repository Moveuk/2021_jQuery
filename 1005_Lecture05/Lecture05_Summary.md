# Lecture05 이벤트 & 애니메이션
Key Word : 기본형 이벤트, 라이브 이벤트, delegate, one, off, 폰트 변경 Test, slideUp, fadeIn, slideToggle, fadeTo, animate

<hr/>

 ## 1. 기본형 이벤트와 라이브 이벤트(동적으로 추가된 것에 적용)
 
기본형 이벤트 : 기존 html 코드에 들어있는 요소에 대하여 이벤트를 추가 가능   
라이브 이벤트 : JS를 통해 동적으로 추가되는 요소 혹은 속성(클래스)에 적용하여 사용가능      
  - 라이브 이벤트는 부모 요소를 대상으로 넣을 수 있다.(아마도 주입하는 자식은 코드에 존재하지 않을 수도 있기 때문)
    
<br>

예제를 보게 되면 기본형 이벤트를 활용한 버튼 1번은 작동하지 않는다.

<br>

### 예제

```html
<script>
$(function(){
	// 기본형 이벤트 방식
	// 동적으로 추가된(addClass로 추가된 것) 것에는 적용되지 않음.
		$(".btn_1.on").on("mouseover focus", function() {
			alert("HELLO!");
		});
		$(".btn_1").addClass("on");

	// 라이브 이벤트 방식(동적으로 추가되는 요소에도 적용 가능함)
	// 해당 요소의 상위 요소를 선택한 후 이벤트 구성
	// on("이벤트 트리거 종류","이벤트 대상","기능")
		$(document).on("mouseover focus",".btn_2.on", function() {
				alert("WELCOME!");
		});
		$(".btn_2").addClass("on");
});
</script>
</head>
<body>
	<div id="wrap">
		<p><button class="btn_1">버튼1</button></p>
		<p><button class="btn_2">버튼2</button></p>
	</div>
</body>
```

<br>

### 결과 화면 

![image](https://user-images.githubusercontent.com/84966961/136121729-885f9100-2bf1-488a-9f80-9037e7c2d741.png)


<br><br><hr/>

 ## 2. 라이브 이벤트 : delegate, one
 
 delegate() : 라이브 이벤트 등록 방식, 대상의 하위 요소에 이벤틔 적용    
 one() : 단 한번만 작용되게 하는 이벤트    
  - one은 페이지에서 단 한번만 작용되고 작동되지 않는다.(디폴트는 페이지 새로고침시 기능이 다시 돌아온다.)

<br>

### 예제

```html
<script>
$(function(){
    // delegate() : 라이브 이벤트 등록 방식, 대상의 하위 요소에 이벤틔 적용
	$(".btn_wrap").delegate(".btn_1.on", "mouseover focus", function() {
		alert("HELLO!");
	});
	$(".btn_1").addClass("on");
	
    // one() : 단 한번만 작용되게 하는 이벤트
    // 이 자체는 delegate처럼 라이브 이벤트 방식이 아니므로 기존처럼 상위요소에 이벤트를 걸어
    // 라이브 이벤트로 작동하도록 사용해야 한다.
    $(document).one("mouseover focus", ".btn_2.on", function() {
		alert("WELCOME! : 단 한번만 작동");
	});
	$(".btn_2").addClass("on");
});
</script>
</head>
<body>
    <div id="wrap">
        <p class="btn_wrap">
            <button class="btn_1">버튼1</button>
        </p>
        <p><button class="btn_2">버튼2</button></p>
    </div>
</body>
```

<br>

### 결과 화면 (버튼1, 버튼2)

![image](https://user-images.githubusercontent.com/84966961/136121986-710fd828-8b24-40e6-ae69-cedb66b3e54c.png)
![image](https://user-images.githubusercontent.com/84966961/136121962-afbfa4a5-07f9-4fbe-bd0d-35777d480cc2.png)



<br><br><hr/>

 ## 3. 이벤트 제거(기능 정지) : off 
 
  이벤트 기능을 끌 수 있다.

<br>

### 예제

```html
<script>
$(function(){
    // 이벤트 제거
    // 버튼1에 마우스 오버시 hello 창 오픈(기본형 이벤트)
	$(".btn_1").on("mouseover", function() {
		alert("HELLO!");
	});
    // 버튼 2에는 동적으로 라이브 이벤트를 추가한다.
	$(document).on("mouseover", ".btn_2", function() {
		alert("WELCOME!");
	});    
    // 버튼 2 태그 변수에 초기화
	var btn_2 = $("<p><button class=\"btn_2\">버튼2</button></p>");
    // 버튼 2 태그 하위요소에 추가(append : 마지막 자식으로 추가)
	$("#wrap").append(btn_2);

    // 버튼1 클릭시 마우스 오버 기능 제거
	$(".del_1").on("click", function(){
		$(".btn_1").off("mouseover");
	});
    // 버튼2 클릭시 마우스 오버 기능 라이브로 제거(html 코드 상에서는 없는 버튼)
    // 라이브 삭제시에는 라이브 이벤트 생성처럼 부모 요소 기준으로 삭제해야한다.
	$(".del_2").on("click", function(){
		$(document).off("mouseover",".btn_2");
	});
});
</script>
</head>
<body>
<div id="wrap">
	<p><button class="btn_1">버튼1</button></p>
</div>
<p>
	<button class="del_1">버튼1 이벤트 해지</button> 
	<button class="del_2">버튼2 이벤트 해지</button>
</p>
</body>
```

<br>

### 결과 화면 

![image](https://user-images.githubusercontent.com/84966961/136122439-9c39568b-07d2-4d85-b8c0-3c801835946c.png)


<br><br><hr/>

 ## 4. 라이브 이벤트를 통한 폰트 변경
 
 라이브 이벤트를 적용하여 테스트 겸 폰트 크기와 글꼴, 색상을 바꾸어 보자.

<br>

### 예제

```html
<script>
$(function(){
    var fontSize = 12;
    var body = $("body");

    // 글자 사이즈 바꾸기
    $(".zoom button").on("click",function(){
        var btn_index = $(".zoom button").index(this);

        if(btn_index == 0) {
            fontSize++;
            body.css("fontSize",fontSize+"px");
        } else if(btn_index == 1) {
            fontSize=12;
            body.css("fontSize",fontSize+"px");
        } else {
            fontSize++;
            body.css("fontSize",fontSize+"px");
        }
    });

    // 글꼴 바꾸기
    $(".f_style #fs").on("change",function(){
        var font = $("#fs option:selected").val();
        console.log(font);
        $("body").css({fontFamily:font});
    });

    // 글자 색상 바꾸기
    $(".f_color input").on("click",function(){
        $("body").css({color:$(this).val()});
    });
});
</script>
<style type="text/css">
    *{margin:0;padding:0;}
    body{font:12px dotum,"돋움",sans-serif;margin:20px;}
    #f_wrap dt{font-weight:bold;margin-top:10px;}
    #txt_wrap{width:90%;margin-top:20px;}
  </style>
  </head>
  <body>
   <div id="f_wrap">
      <dl>
        <dt>글자크기</dt>
        <dd class="zoom">
          <button class="sizeUp">+</button>
          <button class="size1x">0</button>
          <button class="sizeDown">-</button>
        </dd>
        <dt>글자모양</dt>
        <dd class="f_style">
            <select name="fs" id="fs">
              <option value="dotum,'돋움',sans-serif">돋움</option>
              <option value="gulim, '굴림', sans-serif">굴림</option>
              <option value="magun gothic, '맑은고딕', sans-serif">맑은고딕</option>
              <option value="magun gothic, '맑은고딕', serif">궁서</option>
            </select>
        </dd>
        <dt>글자색</dt>
        <dd class="f_color">
            <input type="radio" name="color" value="red"><span style="color: red;"> 빨강 </span>
            <input type="radio" name="color" value="green"><span style="color: green;"> 초록 </span>
            <input type="radio" name="color" value="blue"><span style="color: blue;"> 파랑 </span>
        </dd>
      </dl>
   </div>
   <p id="txt_wrap">
   키보든 접근성이란 마우스 이벤트를 등록했을 때 만일 현재 마우스가 없더라도 제이쿼리로 만든 최소한의 기능을 키보드 만으로 사용할 수 있도록 보장하는 것을 일컬어 키보드 접근성이라 합니다. 앞서 마우스 이벤트에 대응하는 대표적인 키보드 이벤트에는 focus() 와 blur()가 있었습니다. focus() 이벤트 메서드는 선택한 요소에 포커스가 이동되면 이벤트가 발생되었고, 그와 반대로 blur()  이벤트 메서드는 선택한 요소에 생성된 포커스가 다른 요소로 이동되었을 때 이벤트가 발생되었습니다. 그래서 키보드 접근성을 고려한 마우스 이벤트를 등록할 땐 포커스가 이동 가능한 요소인....
   </p>
  </body>
```

<br>

### 결과 화면 (전 -> 후)

![image](https://user-images.githubusercontent.com/84966961/136122577-41fc04ea-edb2-4a80-82f1-8eac5c45c3f8.png)
![image](https://user-images.githubusercontent.com/84966961/135184114-28561273-4f18-477d-966d-6e916d5ff6c0.png)
![image](https://user-images.githubusercontent.com/84966961/136122599-2a5855c8-f50a-4cf3-a691-161f8423b32f.png)



<br><br><hr/>

 ## 5. 효과와 애니메이션 : slideUp, fadeIn, slideToggle, fadeTo
 
  슬라이드 기능과 투명도를 통한 fade in, fade out 기능을 구현 가능하다.

<br>

### 예제

```html
<script>
$(function( ) {
    // 초기 fadeIn 버튼은 사라져 있다.
	$(".btn2").hide();

    // slideUp(효과 지속 시간, 효과 구간 속도, 익명 함수(옵션 없어도됨))
    // 효과 지속 시간 : 몇초동안 슬라이드가 될지
    // 효과 구간 속도 : 슬라이드되어 올라가는 구간 속도를 설정(가속 변화할지, 동속 변화할지)
    // 익명 함수 : 슬라이드가 된 이후 되어야할 기능 구성
	$(".btn1").on("click", function( ) {
        // linear : 등속 변화
		$(".box").slideUp(1000, "linear", function( ) {
            // 버튼이 2개이나 실제로 보이는 건 1개로 스위치 되게 된다.
			$(".btn1").hide( );
			$(".btn2").show( );
		});
	});

    // fadeIn : 투명도 0에서 서서히 드러나도록
	$(".btn2").on("click", function( ) {
        // swing : 
		$(".box").fadeIn(1000, "swing", function( ) {
			$(".btn2").hide( );
			$(".btn1").show( );
		});
	});

    // slideToggle(효과 지속 시간, 효과 구간 속도, 익명 함수(옵션 없어도됨))
    // 단순 토글 효과
	$(".btn3").on("click", function( ) {
		$(".box").slideToggle(1000, "linear");
	});

    // fadeTo(효과 발동 속도, 목적 투명도) : 
    // 상수 값 존재 : fast slow
	$(".btn4").on("click", function( ) {
		$(".box").fadeTo("fast", 0.3);
	});

    //
	$(".btn5").on("click", function( ) {
		$(".box").fadeTo("slow", 1);
	});

});
</script>
<style>
	.content{
		width:400px;
		background-color: #eee;
	}
</style>
</head>
<body>
	<p>
		<button class="btn1">slideUp</button>
		<button class="btn2">fadeIn</button>
	</p>
	<p>
		<button class="btn3">toggleSide</button>
	</p> 
	<p>
		<button class="btn4">fadeTo(0.3)</button>
		<button class="btn5">fadeTo(1)</button>
	</p>   
	<div class="box">
		<div class="content">
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas feugiat consectetur nibh, ut luctus urna placerat non. Phasellus consectetur nunc nec mi feugiat egestas. Pellentesque et consectetur mauris, sed rutrum est. Etiam odio nunc, ornare quis urna sed, fermentum fermentum augue. Nam imperdiet vestibulum ipsum quis feugiat. Nunc non pellentesque diam, nec tempor nibh. Ut consequat sem sit amet ullamcorper sodales.
		</div>
	</div>
</body>
```

<br>

### 결과 화면 (전 -> 후)

![image](https://user-images.githubusercontent.com/84966961/136122736-7bbd47b3-6737-41e4-a41c-ca8dd4c2c0ec.png)
![image](https://user-images.githubusercontent.com/84966961/135184114-28561273-4f18-477d-966d-6e916d5ff6c0.png)
![image](https://user-images.githubusercontent.com/84966961/136122754-2e412c80-058d-4e0a-ad16-1e8afe3c7fb3.png)
![image](https://user-images.githubusercontent.com/84966961/136122775-034d5a24-0b89-4ce3-b143-2a5b9ecc4a47.png)



<br><br><hr/>

 ## 6. 효과와 애니메이션 : animate
 
  animate 기능을 통해 요소에 모션을 줄 수 있다.

<br>

### 예제

```html
<script>
$(function( ) {
    // animate({효과}, 작동 시간, 효과 속도, 익명함수) : 애니메이션을 주기 위해 자주 사용하는 기능
	$(".btn1").on("click", function( ) {
        // 마진 왼쪽 500, 폰트 30인채로 2초동안 등속으로 애니메이션 준 후 alert 발동
		$(".txt1").animate({
			marginLeft:"500px",
			fontSize:"30px"
		},
		2000, "linear", function( ) {
			alert("모션 완료!"); 
		});
	});

    // 클릭할 때마다 마진값을 50씩 늘려서 오른쪽으로 이동하는 것처럼 보이게.
    $(".btn2").on("click", function( ) {
		$(".txt2").animate({
			marginLeft:"+=50px"
		},1000);
	}); 
});
</script>
<style>
	.txt1{background-color: aqua;}
	.txt2{background-color: pink;}
</style>
</head>
<body>
	<p><button class="btn1">버튼1</button></p>
	<span class="txt1">"500px" 이동</span>
	<p><button class="btn2">버튼2</button></p>
	<span class="txt2">"50px"씩 이동</span>
</body>
```

<br>

### 결과 화면 (전 -> 후)

![image](https://user-images.githubusercontent.com/84966961/136123044-b8e3f92d-d3fb-486c-bf46-78250a93d66d.png)
![image](https://user-images.githubusercontent.com/84966961/135184114-28561273-4f18-477d-966d-6e916d5ff6c0.png)
![image](https://user-images.githubusercontent.com/84966961/136123062-2b83c55b-11d5-4ed4-90e3-5c411cd31064.png)



<br><br><hr/>
