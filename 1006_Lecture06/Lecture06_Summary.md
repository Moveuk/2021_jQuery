# Lecture06 이벤트
Key Word : stop, delay, Ajax, JSON, jQuery Ajax 처리 방식

<hr/>

 ## 1. 애니메이션 멈춤 기능 : stop, delay
 
  delay 을 통해 지연 시작 기능을 구성할 수 있다.    
     
  stop을 통해 애니메이션을 멈추거나 애니메이션 효과를 제거한 후 사용할 수 있다.

<br>

### 예제

```html
<script>
$(function(){
    // animate(목표 지점, 실행 시간) : 1초동안 이동
	$(".txt1").animate({marginLeft:"300px"},1000);

    // delay(시간) : 지정 시간동안 대기 후 실행
	$(".txt2").delay(3000).animate({marginLeft:"300px"},1000);

    // on으로 이벤트 추가
	$(".btn1").on("click", moveElement);

    // 익명함수를 외부에 작성 가능하다.
	function moveElement( ) {
        // 버튼 클릭시 50px 0.8초 동안 이동
		$(".txt3")
		.animate({marginLeft:"+=50px"},800);

        // stop() : 멈추고 이동하지 않음(애니메이션 삭제)
		$(".txt4")
		.animate({marginLeft:"+=50px"},800);
		$(".txt4").stop()

        // stop(true, true) : 순간이동을 하며 이동함.(애니메이션 효과는 뺀상태에서 이동 가능)
		$(".txt5")
		.animate({marginLeft:"+=50px"},800);
		$(".txt5").stop(true, true)
	}
});
</script>
<style>
	p{width: 110px;text-align: center;}
	.txt1{background-color: aqua;}
	.txt2{background-color: pink;}
	.txt3{background-color: orange;}
	.txt4{background-color: green;}
	.txt5{background-color: gold;}
</style>
</head>
<body>
	<p class="txt1">효과1</p>
	<p class="txt2">효과2<br> delay(3000)</p>

	<p><button class="btn1">50px 전진</button></p>
	<p class="txt3">효과3</p>
	<p class="txt4">효과4<br>stop( )</p>
	<p class="txt5">효과5<br>stop(true, true)</p>
</body>
```

<br>

### 결과 화면 (전 -> 후)

#### 초기화면
![image](https://user-images.githubusercontent.com/84966961/136121477-2e844466-392d-43c1-a496-91b723f1e143.png)

#### 지연 시작 (3초 후)
![image](https://user-images.githubusercontent.com/84966961/136122213-226eb7ea-2863-4e3b-b11d-2026ca3af99a.png)

#### 버튼클릭시 이동 속도 차이 및 위치 차이
![image](https://user-images.githubusercontent.com/84966961/136122818-743487a3-e44e-4904-9522-067a5670c598.png)



<br><br><hr/>

## Ajax (Asynchronous JavaScript and XML) : 비동기 자바스크립트와 XML
   
비동기 처리로 실행하는 개념. html은 위에서부터 실행되기 때문에 오래걸리는 작업이 있으면 오래걸린다. 이런 문제점을 해결하기 위해 혹은 실시간으로 계속 변하게 되는(예를 들어 실시간 검색어 순위) 부분이 있다면 전체 새로고침을 할 필요가 없도록 페이지 전체적으로 비동기 처리를 한다.   
   
 비돋기 처리를 한다는 것의 의미.. 기존의 통식 방식과는 다른 방식으로 데이터 처리를 한다.    
    
홈페이지 참조 : https://araikuma.tistory.com/640

### 위키 참조
   
Ajax(Asynchronous JavaScript and XML, 에이잭스)는 비동기적인 웹 애플리케이션의 제작을 위해 아래와 같은 조합을 이용하는 웹 개발 기법이다.
   
 - 표현 정보를 위한 HTML (또는 XHTML) 과 CSS
 - 동적인 화면 출력 및 표시 정보와의 상호작용을 위한 DOM, 자바스크립트
 - 웹 서버와 비동기적으로 데이터를 교환하고 조작하기 위한 XML, XSLT, XMLHttpRequest (Ajax 애플리케이션은 XML/XSLT 대신 미리 정의된 HTML이나 일반 텍스트, JSON, JSON-RPC를 이용할 수 있다).

### XML
   
 - xml : html처럼 태그로 구성되며 사용자가 직관적으로 사용할 수 있다. 또한, 임의적인 태그를 만들어 사용할 수 있다. 하지만, 사용하기 위한 태그 작성의 양이 많은 큰 단점이 있다.
   
### JSON
   
 javascript 형태로 주고 받는 방식. xml의 불편함을 개선하기 위해서 나온 방식이다.
   
   
### 웹 컴포넌트 방식의 페이지
   
 리액트, 뷰 등이 있다. 페이지의 부하를 줄이고 효율적인 스크립트를 만들기 위한 방식이다.
    


 ## 2. jQuery Ajax 처리 방식
 
 A 파일 내용을 B 파일로 가져와서 출력하는 예제를 다루어 볼 것이다.
 
 https://mockaroo.com/ 에서 json파일 xml 파일 등으로 샘플 데이터를 받아볼 수 있다.

<br>

### 예제

```html

```

<br>

### 결과 화면 (전 -> 후)

#### 초기화면


#### 지연 시작 (3초 후)




