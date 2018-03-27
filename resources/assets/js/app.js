
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./variables');
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//vue Components
Vue.component('example', require('./components/Example.vue'));
Vue.component('registform', require('./components/Registform.vue'));
Vue.component('musicplayground', require('./components/Musicplayground.vue'));
Vue.component('sceneexplore', require('./components/Sceneexplore.vue'));
Vue.component('soundsplit', require('./components/Soundsplit.vue'));

//start page vue
const app = new Vue({
    el: '#app',
    data: {
    	is_in_playground: false
    },
    methods: {
    }
});



if ($(window).width()>768){
	jQuery.fn.reverse = [].reverse,
    function(t) {
        t.magneticScroll = function(o) {
            var e = {
                    selector: ".magnetic",
                    easing: "swing",
                    speed: 500,
                    timeout: 200,
                    beforeScroll: t.noop,
                    afterScroll: t.noop
                },
                a = t.extend(e, o),
                r = {
                    animateScroll: function(o, e, r) {
                        a.beforeScroll(), t("html, body").stop().animate({
                            scrollTop: e + "px"
                        }, a.speed, a.easing, function() {
                            setTimeout(function() {
                                t("html,body").stop().removeClass("scrolling"), a.afterScroll(o, r)
                            }, a.timeout)
                        })
                    }
                };
            t(document).ready(function() {
                t(a.selector).each(function() {
                    t(this).attr("data-offset", t(this).offset().top)
                });
                var o = /Firefox/i.test(navigator.userAgent) ? "DOMMouseScroll" : "mousewheel";
                t("body:not(.scrolling)").bind(o, function(o) {
                    if (o.preventDefault(), t(this).hasClass("scrolling")) o.preventDefault();
                    else {
                        t(this).addClass("scrolling");
                        var e = t(window).scrollTop(),
                            s = window.event || o;
                        s = s.originalEvent ? s.originalEvent : s;
                        var l = s.detail ? -40 * s.detail : s.wheelDelta;
                        if (l > 0) t(window).scrollTop() > 0 ? t(a.selector).reverse().each(function() {
                            var o = 0;
                            return Math.round(t(this).attr("data-offset")) < Math.round(e-1) ? (r.animateScroll(t(this), t(this).attr("data-offset"), "up"), o = 1, !1) : void(0 === o && r.animateScroll(t(this), 0, "up"))
                        }) : t("html,body").stop().removeClass("scrolling");
                        else {
                            var n = !0;
                            t(a.selector).each(function() {
                                return Math.round(t(this).attr("data-offset")) > Math.round(e+1) ? (n = !1, r.animateScroll(t(this), t(this).attr("data-offset"), "down"), !1) : void 0
                            }), n && t("html,body").stop().removeClass("scrolling")
                        }
                    }
                    o.stopPropagation()
                })
            }).keydown(function(o) {
                var e = t(window).scrollTop(),
                    s = o.which;
                if (38 == s) o.preventDefault(), t("body").hasClass("scrolling") || (t("body").addClass("scrolling"), t(a.selector).reverse().each(function() {
                    return Math.round(t(this).attr("data-offset")) < Math.round(e-1) ? (r.animateScroll(t(this), t(this).attr("data-offset"), "up"), !1) : void 0
                }));
                else if (40 == s && (o.preventDefault(), !t("body").hasClass("scrolling"))) {
                    t("body").addClass("scrolling");
                    var l = !0;
                    t(a.selector).each(function() {
                    	// console.log(t(this).attr("data-offset"));
                    	// console.log(this);
                        return Math.round(t(this).attr("data-offset")) > Math.round(e+1) ? (l = !1, r.animateScroll(t(this), t(this).attr("data-offset"), "down"), !1) : void 0
                    }), l && t("html,body").stop().removeClass("scrolling")
                }
            })
        }
    }(jQuery);

	// $.magneticScroll({
	// 	// "selector": "section",
	// 	"easing": "swing",
	// 	"speed": 1000,
	// 	"timeout": 100
	// });
}

//global variables
var global_nowtime=0;
var nav_showing=false;
var element_cover_video = document.getElementById('cover_video');
var element_page_index = $(".page_index");



//設定頁面時間
setInterval(function(){
	global_nowtime++;
},1000);

//導覽列
$(".expandbtn").click(function(){
	$("nav").toggleClass("showing");
	$(".expandbtn").toggleClass("showing");
	nav_showing=$("nav").hasClass("showing");
	if (nav_showing){
		ga('send', 'event', 'Menu', 'Open',global_nowtime);
	}
	update_flag=true;
});


//投影影片到nav 超神奇XDDD
var canvas = document.getElementById('nav_video');
  var context = canvas.getContext('2d');
  var cw = Math.floor(canvas.clientWidth);
  var ch = Math.floor(canvas.clientHeight);
  canvas.width = cw;
  canvas.height = ch;
  element_cover_video.addEventListener('play', function(){
  	console.log("play");
      updateBigVideo(this,context,cw,ch);
  },false);

function updateBigVideo(v,c,w,h) {
    if(v.paused || v.ended) return false;
    c.drawImage(v,0,0,w,h);
    setTimeout(updateBigVideo,20,v,c,w,h);
}



//載入進度設定
var last_loadedPercentage=0;
var ltt=0;
var loadedPercentage=0;
var real_loading;
var loading_text_element = document.getElementsByClassName("loading");

var loading_timer=setInterval(function(){
  try{
  	real_loading =parseInt(100*( element_cover_video.buffered.end(0) / element_cover_video.duration));
  }catch(err){

  }
  
  if (real_loading)
    loadedPercentage = loadedPercentage < real_loading ? real_loading : loadedPercentage;

   loading_text_element[0].innerHTML=(parseInt(loadedPercentage)+"%");

   // 如果卡住了就加一點點
   if (last_loadedPercentage==loadedPercentage && (ltt++)%7==0){
    loadedPercentage+=Math.random()*4;
   }

   //完成載入
   if (loadedPercentage>=90){
      end_loading();
   }
   last_loadedPercentage=loadedPercentage;
},50);


//降低背景影片音量
element_cover_video.volume=0.2;
if ($(window).width()<768){
	element_cover_video.src="";
	loadedPercentage+=40;
}


// window.scrollTo(0, 0);
function end_loading(){
  // window.scrollTo(0, 0);
  $(".loading_page").css("opacity","0");
  element_page_index.addClass("start_animation");
  element_cover_video.play();
  $(".loading").text("100%");
  clearInterval(loading_timer);
  
  // $("html").removeClass("loading");
  
  setTimeout(function(){
    $(".loading_page").css("display","none");

  },500);
}

//如果超過6秒就顯示100%
setTimeout(function(){
  end_loading();
},6000);

//分享紐
$(".sharebtn").click(function(){
	ga('send', 'event', 'Menu', 'Share');
	window.open("https://www.facebook.com/sharer/sharer.php?u=http://taipeisoundscape.com/");
});

//中英
$(".change_lang_btn").click(function(evt){
  var target=$(this).attr("data-target");
  ga('send', 'event', 'Menu', 'Lang_'+target);
  window.open("http://taipeisoundscape.com/"+((target=="en")?"en":""), "_self");
});

//導覽列
$('li[href]').on('click', function(event){ 
	ga('send', 'event', 'Menu', 'Select', $(this).attr("href"));
    event.preventDefault();
    $('html,body').animate({scrollTop:$($(this).attr("href")).offset().top}, 500);
    $("nav").toggleClass("showing");
	$(".expandbtn").toggleClass("showing");
});

$(window).scroll(function(evt){
	var scroll = $(window).scrollTop()+60;
  var result_red=false;

  //判斷是否是紅色
	if (scroll>=element_page_index.offset().top){
		result_red=false;
	}
	if (scroll>=$(".page_explore").offset().top){
		result_red=true;
	}
	if (scroll>=$(".page_plan").offset().top){
		result_red=false;
	}
	if (scroll>=$(".page_impromptu").offset().top){
		result_red=true;
	}
	if (scroll>=$(".page_accuirement").offset().top){
		result_red=true;
	}
	if (scroll>=$(".page_register").offset().top){
		result_red=false;
	}
  if (result_red){
    $(".expandbtn").addClass("red");
  }else{
    $(".expandbtn").removeClass("red");
  }
  
  //  如果在即興區域內，就設定變數，會影響playground vue元件的播放狀態
	if (scroll>=$(".page_impromptu").offset().top-$(".page_plan").outerHeight() && 
			scroll<=$(".page_impromptu").offset().top+$(".page_impromptu").outerHeight()
	   ){

		app.is_in_playground=true;
	}else{
		app.is_in_playground=false;
	}
	// console.log(app.is_in_playground);
});

//處理數值對應到區域問題
function map(min,max,value){
	if (value<min) return 0.001;
	else if (value>max) return 1;
	else return 1.0*(value-min)/(max-min);
}

//背景音樂靜音按鈕
var bg_mute=false;
$(".soundbtn").click(function(){

	$(this).toggleClass("mute");

	if ($(this).hasClass("mute")){
		bg_mute=true;
		ga('send', 'event', 'Menu', 'Mute');
	}else{
		bg_mute=false;
		ga('send', 'event', 'Menu', 'unMute');
	}
	console.log(bg_mute);
	update_position_sound();
});

//處理滑動事件 更新所在位置音量
var last_scroll=-1;
var update_flag=false;
setInterval(function(){
	var scroll = $(window).scrollTop();
	if (bg_mute){
		$("#bgsound")[0].volume=0;
	}
	if (scroll != last_scroll || nav_showing || update_flag){
		update_position_sound();
	}
},30);

//更新位置的音量
var element_audio_bg=document.getElementById("bgsound");
element_audio_bg.play();
function update_position_sound(){
  //更新距離上方位置
	var scroll = $(window).scrollTop();
  //判斷最新音量
	if (bg_mute){
		element_audio_bg.volume=0;
	}else if (nav_showing){
		element_audio_bg.volume=0.6;
	}else{
		element_audio_bg.volume=0.6*(1-map(0,element_page_index.outerHeight()*3,scroll));
			+0.3*(map($(".page_impromptu").offset().top,$("footer").offset().top,scroll));
	}
	element_cover_video.volume=0.4*(1-map(0,element_page_index.outerHeight()*1.3,scroll));
	// console.log(element_audio_bg.volume);
	last_scroll=scroll;
	if (update_flag){
		update_flag=false;
	}
}


//觸動音效
function trigger_sound(name,file){
	var player=new Audio("http://taipeisoundscape.com/audio/網頁音效素材/"+file);
	$( "nav" ).on( "mouseenter", name, function() {
	  player.pause();
	  player.currentTime=0;
	  player.play();
	});
	$( "nav" ).on( "touch", name, function() {
	  player.pause();
	  player.currentTime=0;
	  player.play();
	});
}

trigger_sound("[href='.page_explore']","音效＿選單.mp3");
trigger_sound("[href='.page_plan']","音效＿選單2.mp3");
trigger_sound("[href='.page_impromptu']","音效＿選單3.mp3");
trigger_sound("[href='.page_accuirement']","音效＿選單4.mp3");

//Google 分析
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-52977512-15', 'auto');
ga('send', 'pageview');