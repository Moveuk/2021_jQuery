# Lecture04 이벤트
Key Word : click, on, mouseover, focus, mouseout, blur, trigger, off, preventDefault, dblclick, hover, mousemove, scrollTop, scrollLeft, data, overFnc, outFnc, change, keydown, $this, idxNum, 

<hr/>

 ## 1. 마우스 기능 : click, on, mouseover, focus, mouseout, blur, trigger, off
 
 브라우저 상에서 마우스를 사용한 다양한 기능을 알아보자.

<br>

### 예제

```html
    <script>
        $(function () {
            // on() : 이벤트 효과를 줄 때 사용.
            // click(function(){"효과"}) : 클릭시 해당 태그에 "효과를 줄 수 있음"
            $(".btn1").click(function () {
                $(".btn1").parent().next().css({ "color": "#f00" });
            });
            
            // click(function(){"효과"}) : 클릭시 해당 태그에 "효과를 줄 수 있음"
            // focus : 브라우저 상에서 tab을 눌러서 선택되었을 때
            $(".btn2").on({
                "mouseover focus": function () {
                    $(".btn2").parent().next().css({ "color": "#0f0" });
                },
                "mouseout blur": function () {
                    $(".btn2").parent().next().css({ "color": "#000" })
                }
            });

            // click() : 실행시 클릭 효과를 자동으로 줄 수 있음.
            //$(".btn1").click();
            // mouseover() : 실행시 마우스 오버 효과를 자동으로 줄 수 있음.
            //$(".btn2").trigger("mouseover");

            // off() : 효과 끄기
            //$(".btn1").off("click");
            //$(".btn2").off("mouseover focus");
        });
    </script>
    <style>
        * {
            padding: 0;
        }

        #p1,
        #p2 {
            width: 100px;
            height: 50px;
            padding: 20px;
            border: 5px solid #000;
            background-color: #ff0;
        }
    </style>
</head>

<body>
    <p><button class="btn1">버튼1</button></p>
    <p>내용1</p>
    <p><button class="btn2">버튼2</button></p>
    <p>내용2</p>
</body>
```

<br>

### 결과 화면 (전 -> 후)

![image](https://user-images.githubusercontent.com/84966961/135369523-11e10336-fecc-4e28-bfd7-1d5eace95ed6.png)
![image](https://user-images.githubusercontent.com/84966961/135184114-28561273-4f18-477d-966d-6e916d5ff6c0.png)
![image](https://user-images.githubusercontent.com/84966961/135369544-94e5a378-a173-4e09-8123-ba1b3aca2ce1.png)



<br><br><hr/>

 ## 2. 태그 본연 기능 제거 : on, click, preventDefault, dblclick
 
 태그의 기능을 제거하는 방법을 알아보자.

<br>

### 예제

```html
<script>
$(function( ) {
    // preventDefault() : 본연의 기능(html body에 작성되어있던 속성 내용)을 제거함.
	// a의 링크는 작동하지 않고 txt1에 배경색만 바뀜.
    $(".btn1").on("click", function(e){
		e.preventDefault( );
		$(".txt1").css({"background-color":"#ff0"});
	});
    // preventDefault를 사용하지 않아서 a태그 클릭시 페이지 이동
	$(".btn2").on("click", function(e){
		$(".txt2").css({"background-color":"#0ff"});
		$(".txt2").text("페이지 이동됨");
	});
    // dblclick : double click 이벤트 구현
	$(".btn3").on("dblclick", function(){
		$(".txt3").css({"background-color":"#0f0"});
	});   
});
</script>
</head>
<body>
	<p><a href="http://www.easyspub.co.kr/" class="btn1">링크 버튼1</a></p>
	<p class="txt1">내용1</p>
	<p><a href="http://www.easyspub.co.kr/" class="btn2">링크 버튼2</a></p>
	<p class="txt2">내용2</p>
	<p><button class="btn3">더블클릭 이벤트 버튼3</button></p>
	<p class="txt3">내용3</p>
</body>
```

<br>

### 결과 화면 (전 -> 후)

![image](https://user-images.githubusercontent.com/84966961/135373257-098d0fd3-6d1f-4284-9deb-9388a9385f37.png)
![image](https://user-images.githubusercontent.com/84966961/135184114-28561273-4f18-477d-966d-6e916d5ff6c0.png)
![image](https://user-images.githubusercontent.com/84966961/135373239-94a1ec43-8fd0-47e8-bb04-c2bafd1d1363.png)

<br><br><hr/>

 ## 3. 호버 기능 : mouseover, mouseout, hover
 
 마우스를 올렸을 때 이벤트가 일어나도록 설정해보자.


<br>

### 예제

```html
<script>
$(function( ) {
	// 마우스를 올렸을 때만 변하도록 조건
	$(".btn1").on({
		"mouseover":function(){
			$(".txt1").css({"background-color":"yellow"});
		},
		"mouseout":function(){
			$(".txt1").css({"background":"none"});
		}
	});

	// hover 기능
	$(".btn2").hover(function(){
		$(".txt2").css({"background":"blue"})
	},
	function(){
		$(".txt2").css({"background":"none"})
	});
});
</script>
</head>
<body>
	<p><button class="btn1">Mouse Over/Mouse Out</button></p>
	<p class="txt1">내용1</p>
	<p><button class="btn2">Hover</button></p>
	<p class="txt2">내용2</p>
</body>
```

<br>

### 결과 화면 (전 -> 후)

![image](https://user-images.githubusercontent.com/84966961/135370910-a4ef09ec-f1c2-4da4-8cca-87fc6c37895a.png)
![image](https://user-images.githubusercontent.com/84966961/135184114-28561273-4f18-477d-966d-6e916d5ff6c0.png)
![image](https://user-images.githubusercontent.com/84966961/135371614-7077c230-d0b3-4821-8f31-587f31ff05ae.png)



<br><br><hr/>

 ## 4. 마우스 위치값 사용하기 : mousemove

 브라우저 위의 마우스 커서 위치 값을 사용하여 다양하게 활용할 수 있다. 여기에서는 위치값 출력에 대해서 다루어 본다.

<br>

### 예제

```html
<script>
$(function( ) {
    // mousemove : 마우스 위치값 받아오기
    // e에서 X,Y값을 가져옴
    $(document).on("mousemove",function(e){
        $(".posX").text(e.pageX);
        $(".posY").text(e.pageY);
    })
});
</script>
</head>
<body>
	<h1>mousemove</h1>
	<p>X : <span class="posX">0</span>px</p>
	<p>Y : <span class="posY">0</span>px</p>
</body>
```

<br>

### 결과 화면 (전 -> 후)

![image](https://user-images.githubusercontent.com/84966961/135372308-38bd0419-7026-4ec4-a9d4-31ea50f81d4c.png)
![image](https://user-images.githubusercontent.com/84966961/135184114-28561273-4f18-477d-966d-6e916d5ff6c0.png)
![image](https://user-images.githubusercontent.com/84966961/135372567-3d1163fd-7075-45af-8ce2-5ee2cb2d2a31.png)


<br><br><hr/>



 ## 5. 스크롤 기능 활용 : scrollTop, scrollLeft

 스크롤의 위치 값을 받아 사용할 수도 있다.

<br>

### 예제

```html
$(function( ) {
    // 자바스크립트 상에서는 브라우저 자체를 'window'로 인식한다.
    // 그러므로 스크롤 이벤트를 사용할때는 선택자를 'window'로 설정한다.
    // scrollTop(), scrollLeft() : 스크롤의 위치값을 받을 수 있다.
    $(window).on("scroll",function(){
        var sc_top = $(this).scrollTop();
        var sc_left = $(this).scrollLeft();

        $(".top").text(sc_top);
        $(".left").text(sc_left);
    });
});
</script>
<style>
	body{
		height:10000px;
		width:5000px;
	}
	#wrap{
		position: fixed;
		left: 10px; top: 10px;
	}
</style>
</head>
<body>
    <div id="wrap">
        <p>scrollTop: <span class="top">0</span>px</p>
        <p>scrollLeft: <span class="left">0</span>px</p>
    </div>
</body>
```

<br>

### 결과 화면 (전 -> 후)

![image](https://user-images.githubusercontent.com/84966961/135374203-7b0aea90-e1f1-4530-adf4-a8a0fb874fc5.png)
![image](https://user-images.githubusercontent.com/84966961/135184114-28561273-4f18-477d-966d-6e916d5ff6c0.png)
![image](https://user-images.githubusercontent.com/84966961/135375190-6cbf8667-7d46-4695-a4d2-5937c84fa140.png)

<br><br><hr/>

### 예제 응용 : 스크롤에 따라서 배경색이 바뀌도록 변화

```html
<script>
$(function( ) {
    // 자바스크립트 상에서는 브라우저 자체를 'window'로 인식한다.
    // 그러므로 스크롤 이벤트를 사용할때는 선택자를 'window'로 설정한다.
    // scrollTop(), scrollLeft() : 스크롤의 위치값을 받을 수 있다.
    $(window).on("scroll",function(){
        var sc_top = $(this).scrollTop();
        var sc_left = $(this).scrollLeft();

        $(".top").text(sc_top);
        $(".left").text(sc_left);
        
        // 패럴록스 효과 : 스크롤이 내려가면서 위치값에 따라 동적인 효과를 주는 것
        if(sc_top < 100){
            $("body").css({"background":"whirw"});
        } else if (sc_top < 200) {
            $("body").css({"background":"yellow"});
        } else if (sc_top < 300) {
            $("body").css({"background":"green"});
        } else if (sc_top < 400) {
            $("body").css({"background":"blue"});
        };
    });
});
</script>
```

<br>

### 결과 화면 (전 -> 후)

![image](https://user-images.githubusercontent.com/84966961/135376470-6e53ca53-6278-48c4-96f6-8ebc415ff314.png)
![image](https://user-images.githubusercontent.com/84966961/135376156-9017e3ff-565a-48c7-88f9-e72b81cdc9c1.png)
![image](https://user-images.githubusercontent.com/84966961/135376455-b32a77b1-9223-4ebd-a916-e0011052ca08.png)
![image](https://user-images.githubusercontent.com/84966961/135376510-79de53b7-59a9-42e0-b01a-d5ba10c2e12e.png)
![image](https://user-images.githubusercontent.com/84966961/135376532-9ece085b-7f3b-4442-ba2d-cff38e3d1ca4.png)




<br><br><hr/>



 ## 6. 마우스 오버시 저장된 데이터 출력 : data, overFnc, outFnc

 마우스 오버시 data를 통해 key-value 형태로 저장해 두었던 정보를 출력하는 예제를 확인해보자

<br>

### 예제

```html
<script>
$(function( ) {
    // data 변수 형태로 -> {"":""} 객체를 담음
    // overFnc :
    // function(){}이 아닌 overFnc을 따로 저장함
    $("#btn1").data({"text":"javascript"}).on({
        "mouseover":overFnc,
        "mouseout":outFnc
    });

    $("#btn2").data({"text":"welcome!"}).on({
        "mouseover":overFnc,
        "mouseout":outFnc
    });

    function overFnc(){
        // #btn1에 저장한 값을 불러와서 출력함.
        $(".txt").text($(this).data("text"));
    }

    function outFnc(){
        $(".txt").text("");
    }
});
</script>
</head>
<body>
	<p><button id="btn1">버튼1</button></p>
	<p><button id="btn2">버튼2</button></p>
	<p class="txt"></p>
</body>
```

<br>

### 결과 화면 (전 -> 후)

![image](https://user-images.githubusercontent.com/84966961/135377291-1884b4df-7b08-48ec-b9c0-ca96aa07f719.png)
![image](https://user-images.githubusercontent.com/84966961/135184114-28561273-4f18-477d-966d-6e916d5ff6c0.png)
![image](https://user-images.githubusercontent.com/84966961/135377308-d4e8a742-a67a-48e9-b774-057c722b4e54.png)
![image](https://user-images.githubusercontent.com/84966961/135377418-b087c24e-8ef3-45da-b37e-b06bffe4fef4.png)


<br><br><hr/>



 ## 7. 지정한 요소 변경 : change

 지정한 요소의 정보 속성 등을 변경할 수 있다.

<br>

### 예제

```html

$(function( ) {
    // change : 지정한 요소에 function 내부에 정의된 기능으로 변경.
    // this : 이벤트를 발생시킨 요소 - #rel_site
	$("#rel_site").on("change", function(){
		$(".txt").text($(this).val());
	});
});
</script>
</head>
<body>
    <select id="rel_site">
            <option value="">사이트 선택</option>
            <option value="www.google.com">구글</option>
            <option value="www.naver.com">네이버</option>
            <option value="www.daum.net">다음</option>
    </select>
    <p class="txt"></p>
</body>
```

<br>

### 결과 화면 (전 -> 후)

![image](https://user-images.githubusercontent.com/84966961/135379907-1a357e7e-a775-427b-8bbd-97b498d6f44f.png)
![image](https://user-images.githubusercontent.com/84966961/135184114-28561273-4f18-477d-966d-6e916d5ff6c0.png)
![image](https://user-images.githubusercontent.com/84966961/135380822-aabe9578-9c7a-4da3-ab71-4060877e617b.png)


<br><br><hr/>



 ## 8. 특정 키를 입력받아 기능 활용 : keydown

 웹 게임을 만들 때 주요 사용했던 기능이다. 다양한 키값들을 브라우저가 인식하여 사용할 수 있도록 해준다.

<br>

### 예제

```html
$(function(){
    // keydown : 특정키가 눌리게 되면 기능이 구현됨.
    // 예전 웹 게임같은 것들을 만들 때 동적으로 사용하기 위한 용도
	$(document).on("keydown", keyEventFnc);
	function keyEventFnc(e) {
	var direct = "";

	switch(e.keyCode){
		case 37: direct = "LEFT";
		break;
		case 38: direct = "TOP";
		break;
		case 39: direct = "RIGHT";
		break;
		case 40: direct = "BOTTOM";
		break;
	}
	
	if(direct) $("#user_id").val(direct);
	}
});
</script>
</head>
<body>
	<p><input type="text" name="user_id" id="user_id"></p>
</body>

```

<br>

### 결과 화면 (전 -> 후(오른쪽 방향 버튼 클릭시))

![image](https://user-images.githubusercontent.com/84966961/135382409-b0bd18af-ddbf-467f-b37c-cf1b543c7f51.png)
![image](https://user-images.githubusercontent.com/84966961/135184114-28561273-4f18-477d-966d-6e916d5ff6c0.png)
![image](https://user-images.githubusercontent.com/84966961/135382417-f9e5fc97-0a80-44e0-9004-5bf44c1665c9.png)


<br><br><hr/>



 ## 9. 지정한 요소의 수정 및 index 번호 사용 : $this, idxNum

  this를 사용하게 되면 이벤트를 발생시킨 요소에 대하여 수정이 가능하다.   
    
  idxNum을 통해서 이벤트가 일어난 요소의 index 번호를 알 수 있다.

<br>

### 예제

```html
<script>
$(function(){
    // 첫번째 리스트 기능 추가
	  $(".menuWrap_1 a").on("click", function(e) {
        // preventDefault : a태그 기능 제거
		    e.preventDefault();
        // 클릭시 모든 a태그 배경색 노란색으로 변경
		    $(".menuWrap_1 a").css({"background-color":"#ff0"});
        // this : 이벤트를 부른 요소의 css(배경)만 변경
		    $(this).css({"background-color":"#0f0"});
	});
    
    // 두번째 리스트 기능 추가
	  $(".menuWrap_2 a").on("click", function(e) {
        // preventDefault : a태그 기능 제거
		    e.preventDefault();
        // 클릭시 모든 a태그 배경색 노란색으로 변경
		    $(".menuWrap_2 a").css({"background-color":"#ff0"});
        // this : 이벤트가 구현된 것의 인덱스 번호를 idx에 저장
		    var idx = $(".menuWrap_2 a").index(this);
        // eq("번호") : 자식 요소들 중 인덱스 번호로 뽑아옴
        $(".menuWrap_2 a").eq(idx).css({"background-color":"#0f0"});    
        // 마지막 p태그에 누른 a 태그 인덱스 번호 출력
        $(".idxNum").text(idx);
	});
});
</script>
</head>
<body>
    <h2>$(this)</h2>
    <ul class="menuWrap_1">
                    <li><a href="#">메뉴1</a></li>
                    <li><a href="#">메뉴2</a></li>
                    <li><a href="#">메뉴3</a></li>
    </ul>
    <h2>Index( )</h2>   
    <ul class="menuWrap_2">
                    <li><a href="#">메뉴4</a></li>
                    <li><a href="#">메뉴5</a></li>
                    <li><a href="#">메뉴6</a></li>
    </ul>
    <p class="idxNum"></p>
</body>
```

<br>

### 결과 화면 (전 -> 후)

![image](https://user-images.githubusercontent.com/84966961/135383980-d6af4896-f4bb-4e46-b11c-98c50697eb79.png)
![image](https://user-images.githubusercontent.com/84966961/135184114-28561273-4f18-477d-966d-6e916d5ff6c0.png)
![image](https://user-images.githubusercontent.com/84966961/135383972-eaa7d1f5-22a7-4175-b252-3c110bed0171.png)


<br><br><hr/>


 ## 10. 

 

<br>

### 예제

```html

```

<br>

### 결과 화면 (전 -> 후)

![image](https://user-images.githubusercontent.com/84966961/135184114-28561273-4f18-477d-966d-6e916d5ff6c0.png)


<br><br><hr/>


 ## 11. 

 

<br>

### 예제

```html

```

<br>

### 결과 화면 (전 -> 후)

![image](https://user-images.githubusercontent.com/84966961/135184114-28561273-4f18-477d-966d-6e916d5ff6c0.png)


<br><br><hr/>
