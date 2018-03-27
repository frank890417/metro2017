<template lang='pug'>
div.sound_split_container(v-html="svgdata")

</template>

<script>
    export default {
        data: function(){
          return {
            svgdata: ""
          };
        },
        mounted: function(){
          var vobj=this;
          vobj.svgdata="";
          $.get("/img/sound_split-01.svg", function(res){
              vobj.svgdata=res.replace("<svg","<svg class='soundsplit'");
              Vue.set(vobj,"svgdata",res.replace("<svg","<svg class='soundsplit'"));
          }, 'text');

          function trigger_sound(name,file){
            var player=new Audio();
            player.src="http://taipeisoundscape.com/audio/網頁音效素材/"+file;
            player.preload=false;
            $( ".sound_split_container" ).on( "mouseenter", name, function() {
              player.pause();
              player.currentTime=0;
              player.play();
            });
          }

          trigger_sound("[data-name=sound_split1]","音效＿聲1.mp3");
          trigger_sound("[data-name=sound_split2]","音效＿聲2.mp3");
          trigger_sound("[data-name=sound_split3]","音效＿聲3.mp3");
          trigger_sound("[data-name=sound_split4]","音效＿聲4.mp3");
          trigger_sound("[data-name=sound_split5]","音效＿聲5.mp3");
          
        }
    }
</script>
