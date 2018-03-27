<template lang='pug'>
.row
  .col-sm-4
    h2.explore_decoration_text MRT STATION SOUND IMAGE
    .top_part

      .btn_pre(@click="delta(-1)")
      .scene_title
        h4.scene_title_eng(v-text='lang=="zh"?stations[viewing].name_eng:stations[viewing].name_cht')
        h1 {{lang=="zh"?stations[viewing].name_cht:stations[viewing].name_eng}}
        .surfing_dots
          .dot(v-for='i in 5' v-bind:class="(viewing==i-1)?'red':''" @click="delta(-viewing+i-1)" v-bind:title="'探索'+stations[i-1].name_cht")
      .btn_next(@click="delta(1)")

    p.scene_desciption(v-html='(lang=="en")?stations[viewing].description_eng:(stations[viewing].description_cht.replace(/&lt;br&gt;/g,"<br>"))+"<br><br>Keyword: "+stations[viewing].tag')
  .col-sm-8
    .scene(v-html="svgdata[0]" data-scene="airport" v-bind:class="(viewing==0)?'showing':''" )
    .scene(v-html="svgdata[1]" data-scene="egg" v-bind:class="(viewing==1)?'showing':''" )
    .scene(v-html="svgdata[2]" data-scene="temple" v-bind:class="(viewing==2)?'showing':''" )
    .scene(v-html="svgdata[3]" data-scene="mountain" v-bind:class="(viewing==3)?'showing':''" )
    .scene(v-html="svgdata[4]" data-scene="door" v-bind:class="(viewing==4)?'showing':''" )
</template>

<script>
    export default {
      data: function(){
        return {
          stations: window.data_storage.stations,
          viewing: 0,
          img:[
            "img/scene_airport.svg",
            "img/scene_egg.svg",
            "img/scene_temple.svg",
            "img/scene_mountain.svg",
            "img/scene_door.svg"
          ],
          svgdata: ["11","22","33","44","55"],
          lang: window.data_storage.lang.name,
          no_change_time: 0,
          playind_sound: false
        }
      },
      methods: {
        delta: function(del){
          this.no_change_time=0;
          this.viewing= (this.viewing+del+this.stations.length) % (this.stations.length);
        }
      },
      mounted: function(){
        var vobj=this;
        vobj.delta(parseInt(Math.random()*50));

        //如果超過5秒動作自動切換
        setInterval(function(){
          if (!vobj.playind_sound){
            vobj.no_change_time++;
          }else{
            vobj.no_change_time=0;
          }
          if ((vobj.no_change_time)>5){
            vobj.delta(1);
          }
        },1000);

        

        //按左右鍵切換
        $(document).keydown(function(e){
            if (e.keyCode == 37) { 
               vobj.delta(-1);
               return false;
            }
            if (e.keyCode == 39) { 
               vobj.delta(1);
               return false;
            }
        });
        for(var i=0;i<this.img.length;i++){
          (function(temp){
            $.get(vobj.img[temp], function(res){
                Vue.set(vobj.svgdata,temp,res);
                // console.log(res);
                // window.test=res;
            }, 'text');

          })(i);
        }

        var play_list = {
          trigger_radio: "松山機場/登機廣播＿32s.mp3",
          trigger_package: "松山機場/行李推車2_13s.mp3",
          trigger_package_2: "松山機場/行李手推車＿17s_693.mp3",
          trigger_airplane: "松山機場/飛機飛越天空＿15s.mp3",
          trigger_man_goodbye: "松山機場/親子賞飛機＿17s.mp3",

          trigger_women_lucky: "龍山寺/此起彼落擲筊聲_5s.mp3",
          trigger_temple_fire: "龍山寺/誦經聲1_18s.mp3",
          trigger_man_lucky: "龍山寺/抽籤_6s.mp3",
          trigger_watching_poem: "龍山寺/解籤_9s.mp3",

          trigger_icecream: "東門/地下人行道吧哺聲_7s.mp3",
          trigger_cookie: "東門/蔥抓餅_20s.mp3",
          trigger_door_man: "東門/東門市場內米粉湯_23s.mp3",
          trigger_man_watching_door: "東門/鼎泰豐廣播_23s.mp3",

          trigger_tree_child: "象山/踩踏樹葉_10s.mp3",
          trigger_man_stone: "象山/外國人爬山嬉笑_23s.mp3",
          trigger_mountain_building: "象山/韓國人爬山腳步聲_30s.mp3",
          trigger_insect: "象山/蟲鳴2_12s.mp3",
          trigger_road: "象山/多人腳步聲_8s.mp3",

          trigger_peoples: "台北小巨蛋/六點半進場_7s.mp3",
          trigger_sell_light: "台北小巨蛋/螢光燈販賣_11s.mp3",
          trigger_sell: "台北小巨蛋/商品販賣部_14s.mp3",
          trigger_egg_bus: "台北小巨蛋/交通指揮與車聲_19s.mp3 "

        };

        var player=new Audio();
        player.loop=true;
        var last_source=";"
        var fadetime=100;
        var target_volume=1.00;

        setInterval(function(){
          if (player.volume>target_volume && player.volume>0.1){
            player.volume-=Math.abs(0.05);
          }else if (player.volume<target_volume && player.volume<1){
            player.volume+=Math.abs(0.05);
          }
        },10);


        function trigger_sound(evt) {
          vobj.no_change_time=0;
          vobj.playind_sound=true;
          var new_source="";
          console.log(evt);

          if (play_list[$(this).attr("data-name")]){
            new_source="http://taipeisoundscape.com/audio/"+play_list[$(this).attr("data-name")];
            ga('send', 'event', 'SceneExplore', 'Trigger', $(this).attr("data-name") );


          }else{
            new_source='';
          }
          
          console.log( "---------\nAudio_Trigger: "+$(this).attr("data-name") );
          // console.log( $( this ) );
          console.log("Playing: "+ play_list[$(this).attr("data-name")]);


          if (new_source!=last_source){
            player.src=new_source;
            
            player.currentTime=0;
            last_source=player.src;
            target_volume=1;
            player.volume=1;
          }
          if (player.paused){
            player.play();
            target_volume=1;
            player.volume=1;
          }
        }

        function pause_sound(){
          if (!player.paused){
            player.pause();
            vobj.playind_sound=false;
          }
        }


        // var ga_global=ga;
        $( ".scene" ).on( "mouseenter", "g[data-name*=trigger]",trigger_sound);
        $( ".scene" ).on( "mouseleave", "g[data-name*=trigger]",pause_sound);

        $( ".scene" ).on( "tap", "g[data-name*=trigger]",trigger_sound);
        $( ".scene" ).on( "click", "g[data-name*=trigger]",trigger_sound);

      }
    }
</script>
