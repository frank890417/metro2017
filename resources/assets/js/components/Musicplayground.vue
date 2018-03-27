<template lang='pug'>
.row
  .col-sm-3
      .page_title
          h3 Impromptu
          h1 {{lang.title}}
      p(v-html="lang.description")

      hr

      div.volume_sliders.container-fluid
        .row
          .col-xs-2
            <!-- h4 {{volume_melody}} -->
            img.pg_icon(src="http://taipeisoundscape.com/img/icon_pg_melody.svg")
          .col-xs-10
            input(type="range" v-model="volume_melody" min="0" max="100")
        .row
          .col-xs-2
            <!-- h4 {{volume_beat}} -->
            img.pg_icon(src="http://taipeisoundscape.com/img/icon_pg_beats.svg")
          .col-xs-10
            input(type="range" v-model="volume_beat" min="0" max="100")
        .row
          .col-xs-2
            <!-- h4 {{volume_env}} -->
            img.pg_icon(src="http://taipeisoundscape.com/img/icon_pg_env.svg")
          .col-xs-10
            input(type="range" v-model="volume_env" min="0" max="100")
      .row
        .btn_container.col-xs-4(v-if='!playing')
          h5 {{lang.btn_play}}
          .pg_btn(@click='play')
            img(src="img/icon_btn_play.svg")

        .btn_container.col-xs-4(v-if='playing')
          h5 {{lang.btn_pause}}
          .pg_btn(@click='stop')
            img(src="img/icon_btn_pause.svg")


        .btn_container.col-xs-4
          h5 {{lang.btn_random}}
          .pg_btn(@click="shuffle")
            img(src="img/icon_btn_shuffle.svg")

        .btn_container.col-xs-4
          h5 {{lang.btn_share}}
          .pg_btn(@click="share_work")
            img(src="img/icon_btn_share.svg")

  .col-sm-9
    .row
      //隱藏的選單
      .col-xs-4
        h4.col_title 
          .vc {{lang.melody}}
          .reddot(:style="getball(volume_melody)")
        h3 {{ (locale=="en")?music.melody[select.melody].name_eng:music.melody[select.melody].name_cht }}
          img.pg_icon(src="http://taipeisoundscape.com/img/icon_pg_melody_red.svg")
           
        select.pg_select.form-control(v-model='select.melody')
          option(v-for='(m,id) in music.melody' v-bind:value='id') {{(locale=="en")?m.name_eng:m.name_cht}} 
      .col-xs-4
        h4.col_title 
          .vc {{lang.rhythm}}
          .reddot(:style="getball(volume_beat)")
        h3 {{ (locale=="en")?music.beat[select.beat].name_eng:music.beat[select.beat].name_cht }}
          img.pg_icon(src="http://taipeisoundscape.com/img/icon_pg_beats_red.svg")
          
        select.pg_select.form-control(v-model='select.beat')
          option(v-for='(m,id) in music.beat' v-bind:value='id') {{(locale=="en")?m.name_eng:m.name_cht}} 
      .col-xs-4
        h4.col_title 
          .vc {{lang.sound}}
          .reddot(:style="getball(volume_env)")
        h3 {{ (locale=="en")?music.env[select.env].name_eng:music.env[select.env].name_cht }}
          img.pg_icon(src="http://taipeisoundscape.com/img/icon_pg_env_red.svg")
          
        select.pg_select.form-control(v-model='select.env')
          option(v-for='(m,id) in music.env' v-bind:value='id') {{(locale=="en")?m.name_eng:m.name_cht}} 
    .row
      .col-xs-12.visible-xs.xs_switcher
        .col-xs-4.xs_switch(:class="xs_part==1?'red':''" @click="xs_part=1") {{lang.melody}}
        .col-xs-4.xs_switch(:class="xs_part==2?'red':''" @click="xs_part=2") {{lang.rhythm}}
        .col-xs-4.xs_switch(:class="xs_part==3?'red':''" @click="xs_part=3") {{lang.sound}}
    
    .row
      //項目清單
      .col-sm-4.col-xs-12(v-show="!xs_mode || (xs_mode && xs_part==1)")
        ul
          li(v-for='(m,id) in music.melody' v-bind:value='id' @click='set("melody",id)' v-bind:class="(select.melody==id)?'red':''") {{(locale=="en")?m.name_eng:m.name_cht}} 
      .col-sm-4.col-xs-12(v-show="!xs_mode || (xs_mode && xs_part==2)")
        ul
          li(v-for='(m,id) in music.beat' v-bind:value='id' @click='set("beat",id)' v-bind:class="(select.beat==id)?'red':''") {{(locale=="en")?m.name_eng:m.name_cht}} 
      .col-sm-4.col-xs-12(v-show="!xs_mode || (xs_mode && xs_part==3)")
        ul
          li(v-for='(m,id) in music.env' v-bind:value='id' @click='set("env",id)' v-bind:class="(select.env==id)?'red':''") {{(locale=="en")?m.name_eng:m.name_cht}} 

    .row.pg_audio_player
      .col-sm-12
        h3 聲音播放
      .col-sm-4
        audio.pg1.form-control(controls loop)
          source(v-bind:src='res_url+"1旋律/旋律中/"+music.melody[select.melody].file')
      .col-sm-4
        audio.pg2.form-control(controls loop)
          source(v-bind:src='res_url+"2節奏/節奏中/"+music.beat[select.beat].file')
      .col-sm-4
        audio.pg3.form-control(controls loop)
          source(v-bind:src='res_url+"3環境/環境中/"+music.env[select.env].file')
</template>

<script>
    export default {
      props: ['is_in_playground'],
      data: function(){
        return {
          locale: window.data_storage.lang.name,
          lang: window.data_storage.lang.page_impromptu,
          music: {
            melody: [
              {name_cht: "中國風的" , name_eng: "Chinese style" , file: "傳統的.mp3"},
              {name_cht: "穩重的" , name_eng: "Steadily" , file: "穩重的.mp3"},
              {name_cht: "輕快的" , name_eng: "Lively" , file: "輕快的.mp3"},
              {name_cht: "蠢蠢欲動的" , name_eng: "Ready to start wriggling" , file: "蠢蠢欲動的.mp3"},
              {name_cht: "迷幻的" , name_eng: "Psychedelicly" , file: "迷幻的.mp3"},
              {name_cht: "小心翼翼的" , name_eng: "Carefully" , file: "小心翼翼的.mp3"},
              {name_cht: "愜意的" , name_eng: "Relaxingly" , file: "愜意的.mp3"},
              {name_cht: "輕巧的" , name_eng: "Lightly" , file: "輕巧的.mp3"},
              {name_cht: "宇宙的" , name_eng: "Vastly" , file: "宇宙的.mp3"},
              {name_cht: "未知的" , name_eng: "Unknownly" , file: "未知的.mp3"},
            ],
            beat: [
              {name_cht: "奔跑在" , name_eng: "unknownly" , file: "奔跑在.mp3"},
              {name_cht: "跳舞在" , name_eng: "dance at" , file: "跳舞在.mp3"},
              {name_cht: "步行在" , name_eng: "walk at" , file: "步行在.mp3"},
              {name_cht: "大步走在" , name_eng: "stride at" , file: "大步走在.mp3"},
              {name_cht: "搖擺在" , name_eng: "shake at" , file: "搖擺在.mp3"},
              {name_cht: "玩樂在" , name_eng: "have fun at" , file: "玩樂在.mp3"},
              {name_cht: "練習在" , name_eng: "practice at" , file: "練習在.mp3"},
              {name_cht: "踏步在" , name_eng: "step at" , file: "踏步在.mp3"},
              {name_cht: "加速在" , name_eng: "accelerate at" , file: "加速在.mp3"},
              {name_cht: "散步在" , name_eng: "stroll at" , file: "散步在.mp3"}
            ],
            env: [
              {name_cht: "小巨蛋販售螢光棒" , name_eng: "Taipei Arena selling fluorescent lights" , file: "小巨蛋站賣螢光燈.mp3"},
              {name_cht: "小巨蛋入場處" , name_eng: "entrance of Taipei Arena" , file: "小巨蛋站六點半進場.mp3"},
              {name_cht: "松山機場拉行李" , name_eng: "Songshan Airport pulling the luggage" , file: "松山機場站推行李.mp3"},
              {name_cht: "松山機場廣播" , name_eng: "Songshan Airport listening to the broadcast" , file: "松山機場站廣播.mp3"},
              {name_cht: "松山機場看飛機起飛" , name_eng: "Songshan Airport watching planes" , file: "松山機場站搭飛機.mp3"},
              {name_cht: "龍山寺擲筊" , name_eng: "Longshan Temple casting moon blocks" , file: "龍山寺站擲筊.mp3"},
              {name_cht: "龍山寺抽籤" , name_eng: "Longshan Temple drawing lots" , file: "龍山寺站抽籤.mp3"},
              {name_cht: "龍山寺叫賣" , name_eng: "Longshan Temple selling" , file: "龍山寺站叫賣.mp3"},
              {name_cht: "東門站吃蔥抓餅" , name_eng: "Dongmen station to eat Flaky scallion pancake" , file: "東門站吃蔥抓餅.mp3"},
              {name_cht: "東門站吃把哺冰" , name_eng: "Dongmen station to have ice cream" , file: "東門站地下人行道賣冰.mp3"},
              {name_cht: "象山踩踏樹葉" , name_eng: "Xiangshan steping on the fallen leaves" , file: "象山站踩踏樹葉.mp3"},
              {name_cht: "象山爬山與喘息" , name_eng: "Xiangshan going hiking and breathing" , file: "象山站爬山與喘息.mp3"},
              {name_cht: "象山結伴爬山" , name_eng: "Xiangshan going hiking with friends" , file: "象山站結伴爬山.mp3"}
            ]
          },
          share_text: [
            "小巨蛋螢光燈便宜賣 他用「我想跟你講秘密」的模樣，親切純樸地聲聲叫賣，一點一點建構出舞台下方那片閃爍搖曳的星空。",
            "小巨蛋六點半進場 好不容易找到自己的座位，你環視小巨蛋內嗡嗡嚷嚷的人群，知道你們都為了支持那個對象而聚集在一起，人與人之間的緊密其實也很簡單。",
            "松山機場站行李推車 推車上的行李隨著你前進的腳步一跳一跳的，好像你開始旅程或踏上歸途時，心臟總會撲通撲通隱隱悸動。",
            "松山機場站廣播 突然之間你被廣播的聲音拉回現實，有點手忙腳亂地找出登機證，一字一句地對著票面上旅行的起始。",
            "松山機場站飛機起飛 你在路上望著飛機逐漸沒入雲端，或在機窗邊凝視城市緩緩沉落，遠行的聲音在那刻讓空氣都顯得濃郁。",
            "龍山寺站此起彼落擲茭  你將祈願不重不輕落到地上，寄託在神明的一顰一笑之間，工作、愛情、學業，你與你的願望一起越摔越堅實。",
            "龍山寺站抽籤  你學他們在籤筒上摸了一圈又一圈，但你知道你想抽出的不是未來的方向，而是掌握自己人生的勇氣與力量。",
            "龍山寺站小販叫賣  一貫穿梭於香腸、金紙、水果、糖葫蘆攤之間的縫隙，正暗讚自己身手矯健心思堅定，結果還是多帶了一張刮刮樂才離開。",
            "東門站蔥抓餅  煎脆的鬆軟麵皮、逐漸聚實的蛋液、一圈提味的醬油、一片消軟的起士，怎麼每次經過這裡都好餓。",
            "東門站地下人行道把哺  你想起那一台機車兩個保麗龍箱就能讓你追著跑的夏日午後，老闆問「汽水還是梅子？」，史上最簡單的人生難題。",
            "象山站踩踏樹葉 腳起腳落之間，似乎也踩碎了蓄積在柏油與水泥路面的挫折和煩惱，你感受到陽光暫留於鼻頭的溫度，以及樹葉在耳畔的溫柔窸窣。",
            "象山站爬山腳步與喘息  每次都想著「為什麼要來爬山累死自己」，但每次站上巨石眺望台北市容，還是會心滿意足地想要再來一次。",
            "象山站多人腳步聲  好像大家都有這個默契，有空時就來這邊走走，遠眺這座城市的高低起伏，想想自己在這裡生根打拼的初衷。",
          ],
          select: {
            melody: 0,
            beat: 0,
            env: 0
          },
          res_url: "http://taipeisoundscape.com/audio/互動音樂/",
          status: {
            melody: false,
            beat: false,
            env: false
          },
          volume_melody: 100,
          volume_beat: 75,
          volume_env: 100,
          timer: null,
          playing: false,
          xs_part: 1,
          xs_mode: $(window).width()<768,
          sync_interval: null,

        };
      },
      watch:{
        select: function(){
          this.reload();
          ga('send', 'event', 'MusicPlayground', 'Select',  this.select.melody+"," +this.select.beat+"," +this.select.env);
        },
        volume_melody: function(){
          $("audio.pg1")[0].volume=1.0*this.volume_melody/100.0;
          console.log($("audio.pg1")[0]);
        },
        volume_beat: function(){
          $("audio.pg2")[0].volume=1.0*this.volume_beat/100.0;
        },
        volume_env: function(){
          $("audio.pg3")[0].volume=1.0*this.volume_env/100.0;
        },
        is_in_playground: function(){
          if (!this.is_in_playground){
            this.stop();
          }
        }
      },
      methods: {
        sync: function(){

          $("audio.pg1")[0].currentTime
          =$("audio.pg2")[0].currentTime
          =$("audio.pg3")[0].currentTime;

          console.log("sync");
        },
        play: function(){
          ga('send', 'event', 'MusicPlayground', 'Play', '');

          this.stop();
          this.playing=true;
          var vobj=this;
          
          $("audio.pg1")[0].addEventListener('canplaythrough', function(){
            vobj.status.melody=true;
            // console.log("1 ok");
          }, false);
          $("audio.pg2")[0].addEventListener('canplaythrough', function(){
            vobj.status.beat=true;
            // console.log("2 ok");
          }, false);
          $("audio.pg3")[0].addEventListener('canplaythrough', function(){
            vobj.status.env=true;
            // console.log("3 ok");
          }, false);
          
          this.timer=setInterval(function(){
            if (vobj.status.melody && vobj.status.beat && vobj.status.env){
               $("audio.pg1")[0].play();
               $("audio.pg2")[0].play();
               $("audio.pg3")[0].play();
               this.playing=true;
               clearInterval(vobj.timer);
               // this.sync_interval= setInterval(function(){
               //    vobj.sync();
               // },8000);

            }
          },100);

        },stop: function(){
          $("audio.pg1")[0].pause();
          $("audio.pg2")[0].pause();
          $("audio.pg3")[0].pause();
          
          $("audio.pg1")[0].currentTime=0;
          $("audio.pg2")[0].currentTime=0;
          $("audio.pg3")[0].currentTime=0;
          this.playing=false;
          // clearInterval(this.sync_interval);
        },
        shuffle: function(){
          this.select.melody= parseInt(Math.random()*this.music.melody.length);
          this.select.beat= parseInt(Math.random()*this.music.beat.length);
          this.select.env= parseInt(Math.random()*this.music.env.length);
          this.reload();
          ga('send', 'event', 'MusicPlayground', 'Shuffle', '');
        },
        reload: function(){
          this.stop();

          this.status.melody=false;
          this.status.beat=false;
          this.status.env=false;
          
          $("audio.pg1")[0].load();
          $("audio.pg2")[0].load();
          $("audio.pg3")[0].load();
          
          this.play();
          
        },set: function(name,id){
          this.select[name]=id;
          this.reload();
        },getball: function(size){
          return {
            width: 2*Math.sqrt(size)+'px',
            height: 2*Math.sqrt(size)+'px'
          };
        },share_work: function(){
          var share_url= 'https://www.facebook.com/dialog/feed?'+
              'app_id=267788137005626'+
              '&display=popup'+
              '&title=在捷運地景音樂，我用'+this.music.env[this.select.env].name_cht+'的聲音創作'+
              '&caption=臺北聲音地景計畫 「捷運站體環境音樂」徵選活動'+
              '&picture='+"http://taipeisoundscape.com/img/og.jpg"+
              '&description='+ this.share_text[this.select.env] +
              '&link='+"http://taipeisoundscape.com"+
              '&redirect_uri=http://taipeisoundscape.com';
          window.open(share_url);
          ga('send', 'event', 'MusicPlayground', 'Share', 'Share by FB');
        }
      },
      mounted: function(){
         // this.shuffle();
         var vobj=this;
         $("audio.pg1")[0].load();
         $("audio.pg2")[0].load();
         $("audio.pg3")[0].load();


          $(".pg_select").change(function(){
            vobj.reload();
          });
          $("audio.pg1").on("ended", vobj.sync);
          
      }
    }
</script>
