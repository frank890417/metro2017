<template lang='pug'>
div
  .row
    .col-sm-12
      .btn.btn-default(@click='sw_stage(1)' v-bind:class='stage==1?"red":""') 1.{{lang.creator_info}}
      .btn.btn-default(@click='sw_stage(2)' v-bind:class='stage==2?"red":""') 2.{{lang.work_description}}
      .btn.btn-default(@click='sw_stage(3)' v-bind:class='stage==3?"red":""') 3.{{lang.upload_file}}
  .row(v-show='stage==1')
    .form-group.col-sm-12(style='vertical-align: middle')
      h4 {{lang.creator_count}}: 
      .btn.btn-default.btn-adj(style='display: inline-block;', @click='creator_count_change(-1)') -
      input.form-control(style='width: 100px;display: inline-block;', type='number', v-model='creator_count', name='creator_count', readonly='readonly')
      .btn.btn-default.btn-adj(style='display: inline-block;', @click='creator_count_change(1)') +
  .row
    .col-sm-12(v-show='stage==1')
      .form-group(v-for='pid in parseInt(creator_count)')
        h4(v-if='pid==1') {{lang.main_creator}}
        h4(v-else='') {{lang.co_creator}}{{pid-1}}
        .row
          .col-sm-2
            label.col-form-label(for='') {{lang.name}}
          .col-sm-8
            input.form-control(type='text', :name="'creator'+pid+'_name'", v-model='namelist[pid]' v-bind:data-require="lang.name+pid")
        .row
          .col-sm-2
            label.col-form-label(for='') {{lang.country}}
          .col-sm-8
            select.form-control(:name="'creator'+pid+'_country'", id='')
              option(v-for='con in country_list', :value='con') {{con}} 
        .row
          .col-sm-2
            label.col-form-label(for='') {{lang.is_18}}
          .col-sm-8
            label
              input(type='radio', :name="'creator'+pid+'_is_eighteen'", value='1', v-model='is_eighteen[pid]')
              | {{lang.yes_18}}
            span &nbsp;&nbsp;&nbsp;&nbsp;
            label
              input(type='radio', :name="'creator'+pid+'_is_eighteen'", value='0', v-model='is_eighteen[pid]')
              | {{lang.no_18}}
        .row
          .col-sm-2
            label.col-form-label(for='') {{lang.phone}}
          .col-sm-8
            input.form-control(type='text', :name="'creator'+pid+'_phone'" v-bind:data-require="lang.phone+pid")
        .row
          .col-sm-2
            label.col-form-label(for='') {{lang.mail}}
          .col-sm-8
            input.form-control(type='text', :name="'creator'+pid+'_mail'" v-bind:data-require="lang.mail+pid")
        hr
      .btn.btn-default.red(@click='sw_stage(stage+1)') {{lang.btn_next}}

    .col-sm-12(v-show='stage==2')
      h4 {{lang.work_description}}: 
      label(for='') {{lang.work_station}}

      select.form-control(name='station')
        option(name='', id='', v-for='station in stations', :value='station.id') {{locale=="zh"?station.name_cht:station.name_eng}}

      label(for='') {{lang.work_title}}
      input.form-control(type='text', name='workname' , :data-require="lang.work_title")
      label(for='') {{lang.work_concept}}
      textarea.form-control(name='description', cols='30', rows='10' data-require="lang.work_concept")
      hr
      .btn.btn-default.red(@click='sw_stage(stage+1)') {{lang.btn_next}}

    .col-sm-12(v-show='stage==3')
      h4 {{lang.upload_agree_file}} 
      .form-group(v-for='pid in parseInt(creator_count)')
        label(for='') {{lang.agree_file}}{{pid}}-{{namelist[pid]}}
        input.form-control(type='file', :name='"agreement_file"+pid', accept='.pdf' v-bind:data-require="lang.agree_file+pid" data-requiretype="pdf")
        br
        .form-group(v-if='is_eighteen[pid]==0')
          label(for='') {{lang.parental_consent}}{{pid}}-{{namelist[pid]}}
          input.form-control(type='file', :name='"agreement18_file"+pid', accept='.pdf' v-bind:data-require="lang.parental_consent+pid" data-requiretype="pdf")
          hr
      h4 {{lang.upload_work_file}}: 
      label(for='') {{lang.work_file}}
      input.form-control(type='file', name='work_file', accept='.mp3' data-require="lang.work_file" data-requiretype="mp3")
      hr
      h4 {{lang.submit_regist}} 
      p(v-html="error_msg")
      div.btn.btn-default.red.submit_regist_form_btn(@click="check_and_submit") {{lang.submit}} 

</template>

<script>
    export default {
        props: ['csrf'],
        data: function(){
            return {
                countrydata: window.data_storage.lang.website.countrydata,
                namelist: [],
                is_eighteen: [1,1],
                creator_count: 1,
                stage: 1,
                stations: window.data_storage.stations,
                error_msg: "",
                lang: window.data_storage.lang.page_regist,
                locale: window.data_storage.lang.name
            };
        },watch: {
          creator_count: function(){
             for(var i=1;i<=this.creator_count;i++){
              console.log(this.is_eighteen[i]);
                if (typeof this.is_eighteen[i] =="undefined"){
                    this.is_eighteen[i]=1;
                }
             }
          }
        },
        computed: {
            country_list: function(){
                var result=[];
                this.countrydata.split(',').forEach(function(obj,index){
                  result.push((""+obj).trim());
                });
                return result;
            }
        },methods:{
            creator_count_change: function(delta){
                if (this.creator_count>=1 && delta>0){
                    this.creator_count+=delta;
                }else if (this.creator_count>1 && delta<0){
                    this.creator_count+=delta;
                }
            },
            sw_stage: function(st){
                this.stage=st;
                console.log(st);
            },
            check_and_submit: function(){
              var check=true;
              this.error_msg="";
              var vobj=this;
              $("[data-require]").each(function(index,obj){
                if ($(obj).val()==""){
                  vobj.error_msg+=$(obj).attr("data-require")+" 需填寫<br>";
                  check=false;
                }
                if ($(obj).attr("type")=="file"){
                    if (($(obj).val().split(".").slice(-1)+"").toLowerCase()!= $(obj).attr("data-requiretype")){
                      vobj.error_msg+=$(obj).attr("data-require")+" 檔案格式錯誤! 需為"+$(obj).attr("data-requiretype")+"<br>";
                      check=false;
                    }
                }
              });
              

              if (this.error_msg!=""){
                this.error_msg="[資料不完整]<br>"+this.error_msg;
              }
              console.log(this.error_msg);
              if (check){
                $("#regist_form").submit();
                $(".submit_regist_form_btn").text("傳送中...");
              }else{
                $(".submit_regist_form_btn").text("請確認後重新送出");
              }
            }
        }
    }
</script>
