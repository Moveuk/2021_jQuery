# Lecture03 객체 조작 및 생성
Key Word : height, width, offset, position, scrollTop, childeren, clone, remove, empty, append, appendTo, prepend, replaceWith, replaceAll, unwrap, wrap, wrapAll, wrapInner

<hr/>

 ## 1. 크기값 조정 : height, width
 
 객체의 크기를 받아오고 수정하는 기능을 사용할 수 있다. 객체에 대한 요소의 부위를 정할 수 있는 메소드의 이름은 다음 그림과 같다.
 
![image](https://user-images.githubusercontent.com/84966961/135183560-c22c4f48-8321-46dd-9229-7f2b86db67bd.png)
 
| 메소드 |	반환값 |
|-|-|
| .width() |	요소의 너비 |
| .height() |	요소의 높이 |
| .innerWidth() |	요소의 너비 + 패딩(padding)의 너비 |
| .innerHeight() |	요소의 크기 + 패딩(padding)의 높이 |
| .outerWidth() |	요소의 너비 + 패딩의 너비 + 테두리(border)의 크기 |
| .outerHeight() |	요소의 높이 + 패딩의 높이 + 테두리(border)의 높이 |
| .outerWidth(true) |	요소의 너비 + 패딩의 너비 + 테두리의 너비 + 마진(margin)의 너비 |
| .outerHeight(true) |	요소의 높이 + 패딩의 높이 + 테두리의 높이 + 마진(margin)의 높이 |
 

출처 : http://www.devkuma.com/books/pages/225

<br>

### 예제

```html
<script>
	$(function( ){
        // height() : 객체의 크기 정보를 얻어옴
		var w1 = $("#p1").height();
		console.log(w1);

		var w2 = $("#p1").innerHeight();
		console.log(w2);

		var w3 = $("#p1").outerHeight();
		console.log(w3);

        // height(크기값) : 객체의 크기 정보를 수정함.
		$("#p2")
		.outerWidth(100)
		.outerHeight(100);
	});
</script>
```

<br>

### 결과 화면 (전 -> 후)

![image](https://user-images.githubusercontent.com/84966961/135183907-5c018bf9-66bc-4c60-b826-36d4d41b969f.png)
![image](https://user-images.githubusercontent.com/84966961/135184114-28561273-4f18-477d-966d-6e916d5ff6c0.png)
![image](https://user-images.githubusercontent.com/84966961/135183920-491b86cd-4319-4064-ba45-c70701518ee9.png)



<br><br><hr/>

## 2. 위치값 조정 : offset, position
 
 다음 예제처럼 위치를 조정할 수 있다.     
 
<br>

### 예제

```html
<script>
	$(function( ){
        // 객체를 변수에 초기화
		var $txt1 = $(".txt_1 span"),
			$txt2 = $(".txt_2 span"),
			$box = $(".box");

        // 객체의 위치 값을 변수에 초기화
		var off_t = $box.offset().top; //100 document기준
		var pos_t = $box.position().top; //50 기준을 잡는 부모태그 기준

        // 위치값을 출력
		$txt1.text(off_t);
		$txt2.text(pos_t);   
	});
</script>
```


<br>

### 결과 화면

![image](https://user-images.githubusercontent.com/84966961/135184524-55773269-2e63-473a-bb44-d2c2daabbfcf.png)



<br><br><hr/>

## 3. 최초 스크롤 위치 지정 : scrollTop
 
 브라우저가 켜졌을 때 최초 스크롤의 위치를 지정할 수 있는 메소드이다.
 
<br>

### 예제

```html
<script>
	$(function( ){
        // 브라우저 맨위부터 오프셋 값 받아옴.
		var topNum = $("h1").offset().top;
        // 윈도우의 스크롤 탑을 정함.
		$(window).scrollTop(topNum);

        // 스크롤 탑의 위치를 받아서 콘솔에 출력함
		var sct = $(window).scrollTop();
		console.log(sct);
	});
</script>
```


<br>

### 결과 화면

위에서부터 2000인 위치에 스크롤이 멈춰있다.

![image](https://user-images.githubusercontent.com/84966961/135189332-82e1f0f4-3d44-462f-abe4-5ae67af1bb70.png)


<br><br><hr/>

## 4. 중간 삽입 기능 : after, insertAfter, before. insertBefore
 
 기준을 두고 앞뒤에 넣을 수 있다.
 
<br>

### 예제

```html
<script>
	$(function( ){
        // after("내용") : 기준이 되는 요소 다음에 "내용" 추가
		$("#wrap p:eq(2)").after("<p>After</p>");
        // insertAfter("기준") : "기준"이 되는 요소 다음에 내용 추가
		$("<p>insertAfter</p>").insertAfter("#wrap p:eq(1)");

        // before("내용") : 기준이 되는 요소 다음에 "내용" 추가
		$("#wrap p:eq(1)").before("<p>Before</p>");
        // insertBefore("기준") : "기준"이 되는 요소 전에 내용 추가
		$("<p>insertBefore</p>").insertBefore("#wrap p:eq(0)");
	});
</script>
</head>
<body>
	<div id="wrap">
		<p>내용1</p>
		<p>내용2</p>
		<p>내용3</p>
	</div>
</body>
```


<br>

### 결과 화면 (전 -> 후)

![image](https://user-images.githubusercontent.com/84966961/135191358-50eb71ff-bc21-47b3-9e1d-9a88fd39a19a.png)
![image](https://user-images.githubusercontent.com/84966961/135184114-28561273-4f18-477d-966d-6e916d5ff6c0.png)
![image](https://user-images.githubusercontent.com/84966961/135191389-ebbb7e18-5321-4347-9a29-fe1495bbf79f.png)




<br><br><hr/>

## 5. 요소 내부에 처음과 끝 요소 추가 : appendTo, prepend
 
 요소 내부에 처음 혹은 마지막 요소로 태그를 추가할 수 있다.
 
<br>

### 예제

```html
<script>
	$(function( ){
        // appendTo("기준") : "기준"의 하위 마지막 요소로 내용 추가
		$("<li>appendTo</li>").appendTo("#listZone");
        // prepend("내용") : 기준의 하위요소에 처음 요소로 "내용" 추가
  		$("#listZone").prepend("<li>prepend</li>");
	});
</script>
</head>
<body>
	<ul id="listZone">
		<li>리스트</li>
	</ul>
</body>
```


<br>

### 결과 화면

![image](https://user-images.githubusercontent.com/84966961/135192077-60747e47-a23c-4000-83af-2723f4265152.png)
![image](https://user-images.githubusercontent.com/84966961/135184114-28561273-4f18-477d-966d-6e916d5ff6c0.png)
![image](https://user-images.githubusercontent.com/84966961/135192082-4a583583-e958-4830-a82d-e7105e68a28b.png)


<br><br><hr/>

## 6. 요소 삭제, 추가, 공백화, 복제, 자식요소 선택 : childeren, clone, remove, empty, append
 
 지정한 요소를 삭제, 추가, 수정이 가능하다.
 
<br>

### 예제

```html
<script>
	$(function( ){
		// childeren() : 지정 요소의 자식들 선택
		// clone() : 지정 요소의 복제
		var copyObj = $(".box1").children().clone();

		// remove() : 지정요소의 삭제
		$(".box2").remove( );

		// empty() : 지정 요소 하위 공백화
		$(".box3").empty( );
		// append("내용") : 지정 요소 내부에 "내용" 추가
		$(".box3").append(copyObj);
	});
</script>
</head>
<body>
	<div class="box1">
		<p>내용1</p>
		<p>내용2</p>
	</div>
	<div class="box2">
		<p>내용3</p>
		<p>내용4</p>
	</div>
	<div class="box3">
		<p>내용5</p>
		<p>내용6</p>
	</div>
</body>
```


<br>

### 결과 화면

![image](https://user-images.githubusercontent.com/84966961/135197128-d4369532-304c-4d2c-9b7f-772359cae8eb.png)
![image](https://user-images.githubusercontent.com/84966961/135184114-28561273-4f18-477d-966d-6e916d5ff6c0.png)
![image](https://user-images.githubusercontent.com/84966961/135197139-acbebdcf-12bc-4b8d-9963-4fdbe71bc6be.png)


<br><br><hr/>

## 7. 내용 수정(교체) : replaceWith, replaceAll
 
 지정한 내용을 원하는 내용으로 교체 가능하다.
 
<br>

### 예제

```html
<script>
	$(function( ){
        // replaceWith("수정할 내용") : 지정한 요소를 "수정할 내용"으로 바꿈
		$("h2").replaceWith("<h3>replace method</h3>");
        // replaceAll("요소") : "요소"를 원하는 내용으로 바꿈.
		$("<p>Change</p>").replaceAll("div"); 
	});
</script>
</head>
<body>
	<section class="box1">
		<h2>제목1</h2>
		<div>내용1</div>
		<div>내용2</div>
	</section>
	<section class="box2">
		<h2>제목2</h2>    
		<div>내용3</div>
		<div>내용4</div>
	</section>
```


<br>

### 결과 화면

![image](https://user-images.githubusercontent.com/84966961/135194184-1b78d72f-e06e-409a-8062-78224e6d2dcc.png)
![image](https://user-images.githubusercontent.com/84966961/135184114-28561273-4f18-477d-966d-6e916d5ff6c0.png)
![image](https://user-images.githubusercontent.com/84966961/135194215-a7e92e7b-7d0c-46a2-ae4e-cd7e648fc98c.png)


<br><br><hr/>

## 8. 감싸서 수정 unwrap, wrap, wrapAll, wrapInner
 
 지정한 내용을 부모 요소로 감싸 수정할 수 있다.
 
<br>

### 예제

```html
<script>
	$(function( ){
        // unwrap() : 지정한 태그를 벗김
		$("strong").unwrap( );
        // wrap("태그") : 지정한 요소를 "태그"로 감쌈 
		$(".ct1").wrap("<div />");
        // wrapAll("태그") : 지정한 요소를 전부 "태그"로 감쌈
		$(".ct2").wrapAll("<div />");
        // wrapInner("태그") : 지정한 요소의 자식들을 "태그"로 감쌈
		$("li").wrapInner("<h3 />");
	});
</script>
<style>
	div{background-color:aqua;}
</style>
</head>
<body>
	<h1 id="tit_1">
	<strong>객체 조작 및 생성</strong>
	</h1>
	<p class="ct1">내용1</p>
	<p class="ct1">내용2</p>
	<p class="ct2">내용3</p>
	<p class="ct2">내용4</p>
	<ul>
		<li>내용3</li>
		<li>내용4</li>
	</ul>
</body>
```

<br>

### 결과 화면

![image](https://user-images.githubusercontent.com/84966961/135194628-78ceffbe-f366-4a59-a8bc-907c2263d220.png)
![image](https://user-images.githubusercontent.com/84966961/135184114-28561273-4f18-477d-966d-6e916d5ff6c0.png)
![image](https://user-images.githubusercontent.com/84966961/135194649-823255e3-54e8-4e04-b794-84fd8a8464a1.png)



<br>

### 예외사항

만약 다음 코드와 같이 같은 클래스가 갈라져 있다면 결과화면 처럼 앞으로 당겨져서 div가 씌여지게 된다.

```html
<body>
	<h1 id="tit_1">
	<strong>객체 조작 및 생성</strong>
	</h1>
	<p class="ct1">내용1</p>
	<p class="ct1">내용2</p>
	<p class="ct2">내용3</p>
	<p class="ct2">내용4</p>
	<ul>
		<li>내용3</li>
		<li>내용4</li>
	</ul>
	<p class="ct2">내용3</p>
	<p class="ct2">내용3</p>
</body>
```


<br>

### 결과 화면

![image](https://user-images.githubusercontent.com/84966961/135196955-09010ba0-7b02-4af3-a48e-94da21db071f.png)


<br><br><hr/>

## 9. 활용 TEST
 
 지금까지의 선택자를 활용하여 수정해보자.
 
<br>

### 예제 (전 -> 후)

```html
    <body>
        <div class="wrap_1">
            <p>텍스트1</p>
            <p class="active">내용2</p>
            <p><a href="#">네이버</a></p>
            <p>
                    <input type="text" value="Hello">
            </p>
        </div>
        <div class="wrap_2"> 
            <p>내용5</p>
            <p>내용6</p>
        </div>
        <div class="wrap_3">
            <div>
                            <p>내용7</p>
                            <p>내용8</p>
            </div>
        </div>
    </body>
```

```html
        <script>
            $(function(){ 
                // 텍스트 1 -> 내용 1로 변경
                $(".wrap_1 p:first").text("내용1");
                // 클래스 active -> on 으로 변경
                $(".wrap_1 p.active").removeClass("active").addClass("on");
                // href 속성 값 변경
                $(".wrap_1 p.eq(2) a").attr("href","https://www.naver.com");
                // value 속성 hello -> Korea 으로 변경
                $(".wrap_1 p.eq(3) input").val("Korea");
                // p 기준 이후에 태그 추가
                $(".wrap_2 p:first").after("<p>After(추가1)</p>");
                // p 기준 이전에 태그 추가
                $(".wrap_2 p:first").before("<p>Before(추가1)</p>");
                // div를 제거후 p 내부에 strong태그 씌우기
                $(".wrap_3 p").unwrap().wrapInner("<strong>");
            });
        </script>
    </head>
    <body>
        <div class="wrap_1">
            <p>텍스트1</p>
            <p class="active">내용2</p>
            <p><a href="#">네이버</a></p>
            <p>
                    <input type="text" value="Hello">
            </p>
        </div>
        <div class="wrap_2"> 
            <p>내용5</p>
            <p>내용6</p>
        </div>
        <div class="wrap_3">
            <div>
                <p>내용7</p>
                <p>내용8</p>
            </div>
        </div>
    </body>
```

<br>

### 결과 화면
   
![image](https://user-images.githubusercontent.com/84966961/135206889-0f426dde-5c28-4e69-8ca0-172db265cccc.png)
![image](https://user-images.githubusercontent.com/84966961/135184114-28561273-4f18-477d-966d-6e916d5ff6c0.png)
![image](https://user-images.githubusercontent.com/84966961/135206861-e2492749-6f4c-45b4-9258-c2e6a19020c9.png)



<br><br><hr/>


