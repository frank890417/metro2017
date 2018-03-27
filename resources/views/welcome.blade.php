<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @if (Lang::locale()=="zh")
            <title>2017捷運站體環境音樂徵選官網</title>
            <meta name="description" content="「臺北聲音地景計畫」旨以「聲音」作為媒介連結城市生活空間，描繪出臺北城市的景觀與歷史，讓大眾能夠從不同的角度「聽」待環境，進而對環境有更深的認同。">

            <meta property="og:title" content="2017捷運站體環境音樂徵選官網" />
            <meta property="og:type" content="website" />
            <meta property="og:url" content="http://taipeisoundscape.com/" />
            <meta property="og:image" content="http://taipeisoundscape.com/img/og.jpg" />
            <meta property="og:description" content="「臺北聲音地景計畫」旨以「聲音」作為媒介連結城市生活空間，描繪出臺北城市的景觀與歷史，讓大眾能夠從不同的角度「聽」待環境，進而對環境有更深的認同。" />
        @else
            <title>2017 Taipei MRT Station Ambient Music Competition</title>
            <meta name="description" content="Taipei Soundscape Program initiated jointly by Taipei City Government and Metro Taipei have brought melodies to MRT stations. Beep sound at the gates of Taipei Metro Railway System were replaced by two pleasant piano notes and the alert sound reminding passengers on board to get off at the transfer and terminal stations were replaced by pre-recorded music.">

            <meta property="og:title" content="2017 Taipei MRT Station Ambient Music Competition" />
            <meta property="og:type" content="website" />
            <meta property="og:url" content="http://taipeisoundscape.com/en" />
            <meta property="og:image" content="http://taipeisoundscape.com/img/og.jpg" />
            <meta property="og:description" content="Taipei Soundscape Program initiated jointly by Taipei City Government and Metro Taipei have brought melodies to MRT stations. Beep sound at the gates of Taipei Metro Railway System were replaced by two pleasant piano notes and the alert sound reminding passengers on board to get off at the transfer and terminal stations were replaced by pre-recorded music." />
        @endif


        <meta name="google-site-verification" content="htCe_NJPCFgPivTZ9thyXeeIBfnCkb_fBam9Qxz21yI" />
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Scripts -->
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
        </script>

        <!-- jsonld card -->
        <script type='application/ld+json'> 
        {
          "@context": "http://www.schema.org",
          "@type": "MusicEvent",
          "name": "臺北聲音地景計畫 -「捷運站體環境音樂」徵選活動",
          "url": "http://taipeisoundscape.com/",
          "description": "「臺北聲音地景計畫」旨以「聲音」作為媒介連結城市生活空間，描繪出臺北城市的景觀與歷史，讓大眾能夠從不同的角度「聽」待環境，進而對環境有更深的認同。",
          "startDate": "2017-03-15T01:00",
          "endDate": "2017-03-05T17:00",
          "location": {
            "@type": "Place",
            "name": "台北市文化局",
            "sameAs": "https://www.culture.gov.taipei/",
            "address": {
              "@type": "PostalAddress",
              "streetAddress": "市府路一號四樓東北區 ",
              "addressLocality": "臺北市",
              "addressRegion": "信義區",
              "postalCode": "11008 ",
              "addressCountry": "台灣"
            }
          },
          "image": "http://taipeisoundscape.com/img/og.jpg"
        }
         </script>

        <!-- Fonts -->

        <link rel="stylesheet" href="{{ asset('css/app.css') }}" async>
    </head>
    <body>
        <div class="expandbtn"></div>

        <!-- <div class="fixed_video">
            <video id="cover_video" src="{{ asset('video/indexbgv.mp4') }}" autoplay loop currentTime=25></video>
        </div> -->
        <div class="loading_page">
            <div class="loading">LOADING</div> 
            @include("loading")
            <div class="headphone_text">
            <img src="{{ asset('img/icon_headphone.svg') }}" width="42px" alt="">
            <br>Use headphones for the best experience.</div>
        </div>

        <nav class="index">
            <div class="soundbtn">
                <svg id="d3a621d1-e16c-4773-9b8b-2e0ef0970dea" data-name="圖層 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 92.77 91"><defs><style>.e591e75b-befd-4807-ac42-16467bd3893a{fill:#f6f6f6;}</style></defs><title>icon</title><rect class="e591e75b-befd-4807-ac42-16467bd3893a" x="62.53" y="45.8" width="17.47" height="4.25"/><rect class="e591e75b-befd-4807-ac42-16467bd3893a" x="58.98" y="25.77" width="17.73" height="4.08" transform="translate(-4.82 37.65) rotate(-30)"/><polygon class="e591e75b-befd-4807-ac42-16467bd3893a" points="18.77 36.02 6.69 37.5 6.69 47.93 6.69 58.35 18.77 59.84 50.5 80.62 50.5 47.93 50.5 15.23 18.77 36.02"/><rect class="e591e75b-befd-4807-ac42-16467bd3893a" x="58.96" y="65.92" width="17.73" height="3.99" transform="translate(43.04 -24.81) rotate(30)"/></svg>
            </div>

            <div class="sharebtn">
                <svg id="21a785d9-bf66-4c03-90ee-8e6e14991cb8" data-name="圖層 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 92.77 91"><defs><style>.b6cb98f5-2898-43ec-8def-d7c703fc2322,.c97aed03-ff9f-4c10-b572-03e2d4918a35{fill:#f6f6f6;}.\32 7698931-19d1-414b-9231-12679fc4d440,.b6cb98f5-2898-43ec-8def-d7c703fc2322{stroke:#f6f6f6;stroke-miterlimit:10;stroke-width:4px;}.\32 7698931-19d1-414b-9231-12679fc4d440{fill:none;}</style></defs><title>icon</title><circle class="c97aed03-ff9f-4c10-b572-03e2d4918a35" cx="27.17" cy="45.61" r="12.83"/><circle class="c97aed03-ff9f-4c10-b572-03e2d4918a35" cx="66.67" cy="74.91" r="8.08"/><circle class="c97aed03-ff9f-4c10-b572-03e2d4918a35" cx="66.67" cy="19.73" r="8.08"/><line class="b6cb98f5-2898-43ec-8def-d7c703fc2322" x1="27.17" y1="45.61" x2="66.67" y2="19.11"/><line class="27698931-19d1-414b-9231-12679fc4d440" x1="27.17" y1="45.61" x2="66.67" y2="74.91"/></svg>
            </div>

            <div class="enbtn change_lang_btn" data-target='{!! Lang::locale()=="zh"?"en":"zh" !!}' >
                {!!  Lang::locale()=="zh"?"EN":"中"  !!}
            </div>

            <canvas id="nav_video"></canvas>
            <div class="black_cover"></div>                
                <div class="container nav_contanier">
                  <div class="row">
                    <div class="col-sm-5 hidden-xs">
                      <img class="map" src="{{ asset('img/map-01.svg') }}" alt="">
                      <img class="coverword" src="{{ asset('img/icon_coverword.svg') }}" alt="">
                    </div>
                    <div class="col-sm-7">
                      <h1>{!! __("nav.title") !!}</h1>
                      <h6>{!! __("nav.subtitle") !!}</h6>
                      <hr/>
                      <ul>
                        <li href=".page_explore">
                          <h5>{!! __("nav.item1_title") !!}</h5>
                          <p>{!! __("nav.item1_description") !!}</p>
                        </li>
                        <li href=".page_plan">
                          <h5>{!! __("nav.item2_title") !!}</h5>
                          <p>{!! __("nav.item2_description") !!}</p>
                        </li>
                        <li href=".page_impromptu">
                          <h5>{!! __("nav.item3_title") !!}</h5>
                          <p>{!! __("nav.item3_description") !!}</p>
                        </li>
                        <li href=".page_accuirement">
                          <h5>{!! __("nav.item4_title") !!}</h5>
                          <p>{!! __("nav.item4_description") !!}</p>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
        </nav>
        <div id="app">
            <section data-theme="black" class="page_index magnetic">
                <video id="cover_video" src="{{ asset('video/indexbgv_lower.mp4') }}"  loop ></video>
                <div class="titles">
                    <h4 class=eng>The sound of Taipei</h4>
                    <h1 class=title>{!! __("website.title") !!}</h1>
                    <h4 class=explain>{!! __("website.subtitle") !!}</h4>
                    <a class=change_lang_btn data-target='zh'>中文</a>&nbsp;&nbsp;&nbsp;
                    <a class=change_lang_btn data-target='en'>English</a>

                </div>
                <div class="row row_cover">
                    <!-- h1>首頁影片</h1> -->
                        <svg version="1.1"
                             xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:a="http://ns.adobe.com/AdobeSVGViewerExtensions/3.0/"
                             x="0px" y="0px" width="1950.4px" height="1227.8px" viewBox="0 0 1950.4 1227.8"
                             style="overflow:scroll;enable-background:new 0 0 1950.4 1227.8;" xml:space="preserve" class="cover_letters">
                            <defs>
                            </defs>
                            <g class='maintexts'>
                                <polyline class="st0" points="45.5,583 45.5,63.8 121.2,63.8 290.8,539.6 323.1,540 484.5,63.8 565.7,63.8 565.7,583.9     "/>
                                <polyline class="st0" points="1164.2,539.6 758.8,539.6 758.8,45.5 1164.2,45.5   "/>
                                <line class="st0" x1="1130.4" y1="283" x2="758.8" y2="283"/>
                                <line class="st0" x1="1304.5" y1="343.5" x2="1530.9" y2="343.5"/>
                                <line class="st0" x1="169.7" y1="683.7" x2="668.3" y2="683.7"/>
                                <line class="st0" x1="418.9" y1="1170.8" x2="418.9" y2="687.2"/>
                                <line class="st0" x1="839.4" y1="1170.8" x2="839.4" y2="638.8"/>
                                <path class="st0" d="M839.4,684.2h241.2c0,0,132.2-4,132.2,141s-132.2,122.9-132.2,122.9H839.4"/>
                                <line class="st0" x1="1048.7" y1="954.5" x2="1224.4" y2="1199.8"/>
                                <ellipse transform="matrix(2.944134e-02 -0.9996 0.9996 2.944134e-02 695.4683 2573.7234)" class="st0" cx="1673.1" cy="928.7" rx="253.5" ry="231.8"/>
                            </g>
                        </svg>


                </section>
                <section class="page_explore magnetic">
                    <img class='bg' src="{{ asset('img/paper-compressor.jpg') }}" alt="">
                    <div class="container">
                
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page_title">
                                    <h3>Space explore</h3>
                                    <h1>{!! __("page_explore.title") !!}</h1>
                                </div>
                                <p>
                                   {!! __("page_explore.description") !!}
                                </p>
                            </div>
                        </div>
                        <Sceneexplore> </Sceneexplore>

                    </div>
                </section>

                <section data-theme="red" class="page_plan magnetic">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="page_title">
                                    <h3>Taipei Sounds</h3>
                                    <h1>{!! __("page_plan.title") !!}</h1>
                                </div>
                                <p>{!! __("page_plan.description") !!}</p>
                                <h4>{!! __("page_plan.title1") !!}</h4>
                                <p>{!! __("page_plan.description1") !!}</p>
                                <h4>{!! __("page_plan.title2") !!}</h4>
                                <p>{!! __("page_plan.description2") !!}</p>
                                <h4>{!! __("page_plan.title3") !!}</h4>
                                <p>{!! __("page_plan.description3") !!}</p>
                            </div>
                            <div class="col-sm-8">

                                <soundsplit></soundsplit>
                                <!-- <img class="soundsplit" src="{{ asset('img/sound_split-01.svg') }}" alt=""> -->
                            </div>
                        </div>
                    </div>
                </section>

                <section class="page_impromptu magnetic">
                    <img class='bg2' src="{{ asset('img/paper-compressor.jpg') }}" alt="">
                    <img class="bg" src="{{ asset('img/icon_pg_bg.svg') }}" alt="" style="">
                    <div class="container">
                        <Musicplayground :is_in_playground=is_in_playground> </Musicplayground>    
                    </div>
                </section>

                <section class="page_accuirement magnetic">
                    <img class='bg' src="{{ asset('img/paper-compressor.jpg') }}" alt="">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page_title">
                                    <h3>Register Information</h3>
                                    <h1>{!! __("page_accuirement.title") !!}</h1>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <img src="{{ asset('img/icon_register.svg') }}" class="icon" alt="">
                                <h3>{!! __("page_accuirement.regist_title") !!}</h3>
                                <p>{!! __("page_accuirement.regist_description") !!}</p></div>
                            <div class="col-sm-4">
                                <img src="{{ asset('img/icon_work.svg') }}" class="icon" alt="">
                                <h3>{!! __("page_accuirement.work_title") !!}</h3>
                                <p>{!! __("page_accuirement.work_description") !!}</p>
                            </div>
                            <div class="col-sm-4">
                                <img src="{{ asset('img/icon_warning.svg') }}" class="icon" alt="">
                                <h3>{!! __("page_accuirement.warning_title") !!}</h3>
                                <p>{!! __("page_accuirement.warning_description") !!}</p>

                            </div>
                        </div>
                        <div class="row magnetic">
                            <div class="col-sm-6">

                                <h3>{!! __("page_accuirement.judge_title") !!}</h3>
                                <p>{!! __("page_accuirement.judge_description") !!}</p>
                                <br>
                                <br class='visible-xs'>
                            </div>
                            <div class="col-sm-6">
                                <h3>{!! __("page_accuirement.tb_title") !!}</h3>
                                <table class=table>
                                    <thead>
                                        <th>{!! __("page_accuirement.tb_head1") !!}</th>
                                        <th>{!! __("page_accuirement.tb_head2") !!}</th>
                                        <th>{!! __("page_accuirement.tb_head3") !!}</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style='min-width: 90px'>{!! __("page_accuirement.tb_station_name1") !!}</td>
                                            <td style='min-width: 90px'>{!! __("page_accuirement.tb_station_line1") !!}</td>
                                            <td>{!! __("page_accuirement.tb_station_char1") !!}</td>
                                        </tr>
                                        <tr>
                                            <td>{!! __("page_accuirement.tb_station_name2") !!}</td>
                                            <td>{!! __("page_accuirement.tb_station_line2") !!}</td>
                                            <td>{!! __("page_accuirement.tb_station_char2") !!}</td>
                                        </tr>
                                        <tr>
                                            <td>{!! __("page_accuirement.tb_station_name3") !!}</td>
                                            <td>{!! __("page_accuirement.tb_station_line3") !!}</td>
                                            <td>{!! __("page_accuirement.tb_station_char3") !!}</td>
                                        </tr>
                                        <tr>
                                            <td>{!! __("page_accuirement.tb_station_name4") !!}</td>
                                            <td>{!! __("page_accuirement.tb_station_line4") !!}</td>
                                            <td>{!! __("page_accuirement.tb_station_char4") !!}</td>
                                        </tr>
                                        <tr>
                                            <td>{!! __("page_accuirement.tb_station_name5") !!}</td>
                                            <td>{!! __("page_accuirement.tb_station_line5") !!}</td>
                                            <td>{!! __("page_accuirement.tb_station_char5") !!}</td>
                                        </tr>

                                       

                                    </tbody>
                                </table>
                                <!-- <img src="https://mail.google.com/mail/u/0/?ui=2&ik=d819e82d71&view=fimg&th=15a9fdbefdcab4b0&attid=0.1.1&disp=emb&attbid=ANGjdJ8fVB3h-aL6YzStHpltwSbAb4hY8QYdKk9BCL2jSS-bVtv2qyq8LYuuSTMaKfXpKvCBsp4zw5_8q28PZ45MyRGGRDL0SDEZwyk0kuXqMow6Z61HfEttUohCyw8&sz=s0-l75-ft&ats=1488740807119&rm=15a9fdbefdcab4b0&zw&atsh=1" alt=""> -->
                            </div>
                        </div>
                        <div class="row prize_list_row">
                            <div class="col-sm-12">
                                <div class="page_title text-left">
                                    <h3 class="text-left">Winners</h3>
                                    <h1>{!! __("page_accuirement.prize_title") !!}</h1>
                                </div>
                                <p>{!! __("page_accuirement.prize_word") !!}</p>   
                            </div>
                            <div class="col-sm-4">
                                <h4>{!! __("page_accuirement.prize_st_front") .__("page_accuirement.tb_station_name1").__("page_accuirement.prize_st_end") !!}</h4>
                                <table style="width: 100%" class="table">
                                    <thead>
                                        <th style="width: 20%">{!! __("page_accuirement.prize_type") !!}</th>
                                        <th style="width: 40%">{!! __("page_accuirement.prize_name") !!}</th>
                                        <th style="width: 40%">{!! __("page_accuirement.prize_creator") !!}</th>      
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><b>{!! __("page_accuirement.prize_1") !!}</b></td>
                                            <td>漫遊旅人</td>
                                            <td>張君慈</td>
                                        </tr>
                                        <tr>
                                            <td>{!! __("page_accuirement.prize_2") !!}</td>
                                            <td>Fly Away</td>
                                            <td>馮德明</td>
                                        </tr>
                                        <tr>
                                            <td>{!! __("page_accuirement.prize_2") !!}</td>
                                            <td>《飛船》</td>
                                            <td>A root同根生：陳淯歆、林喬、林琬婷、楊智博、鄭皓羽</td>
                                        </tr>
                                    </tbody>  
                                </table>
                            </div>
                            <div class="col-sm-4">
                                <h4>{!! __("page_accuirement.prize_st_front") .__("page_accuirement.tb_station_name2").__("page_accuirement.prize_st_end") !!}</h4>
                                <table style="width: 100%" class="table">
                                    <thead>
                                        <th style="width: 20%">{!! __("page_accuirement.prize_type") !!}</th>
                                        <th style="width: 40%">{!! __("page_accuirement.prize_name") !!}</th>
                                        <th style="width: 40%">{!! __("page_accuirement.prize_creator") !!}</th>      
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><b>{!! __("page_accuirement.prize_1") !!}</b></td>
                                            <td>都市精神</td>
                                            <td>馬一先</td>
                                        </tr>
                                        <tr>
                                            <td>{!! __("page_accuirement.prize_2") !!}</td>
                                            <td>Welcome To My World</td>
                                            <td>林品宏</td>
                                        </tr>
                                        <tr>
                                            <td>{!! __("page_accuirement.prize_2") !!}</td>
                                            <td>夢想音樂會</td>
                                            <td>陳彥百</td>
                                        </tr>
                                    </tbody>  
                                </table>
                            </div>
                            <div class="col-sm-4">
                                <h4>{!! __("page_accuirement.prize_st_front") .__("page_accuirement.tb_station_name3").__("page_accuirement.prize_st_end") !!}</h4>
                                <table style="width: 100%" class="table">
                                    <thead>
                                        <th style="width: 20%">{!! __("page_accuirement.prize_type") !!}</th>
                                        <th style="width: 40%">{!! __("page_accuirement.prize_name") !!}</th>
                                        <th style="width: 40%">{!! __("page_accuirement.prize_creator") !!}</th>      
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><b>{!! __("page_accuirement.prize_1") !!}</b></td>
                                            <td>薪火相傳</td>
                                            <td>張詠橋</td>
                                        </tr>
                                        <tr>
                                            <td>{!! __("page_accuirement.prize_2") !!}</td>
                                            <td>《鬧三仙》</td>
                                            <td>A root同根生：陳淯歆、林喬、林琬婷、楊智博、鄭皓羽</td>
                                        </tr>
                                        <tr>
                                            <td>{!! __("page_accuirement.prize_2") !!}</td>
                                            <td>眾神祈福</td>
                                            <td>劉宇軒、許啟隆</td>
                                        </tr>
                                    </tbody>  
                               </table>
                            </div>

                            <div class="col-sm-4">
                                <h4>{!! __("page_accuirement.prize_st_front") .__("page_accuirement.tb_station_name4").__("page_accuirement.prize_st_end") !!}</h4>
                                <table style="width: 100%" class="table">
                                    <thead>
                                        <th style="width: 20%">{!! __("page_accuirement.prize_type") !!}</th>
                                        <th style="width: 40%">{!! __("page_accuirement.prize_name") !!}</th>
                                        <th style="width: 40%">{!! __("page_accuirement.prize_creator") !!}</th>      
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><b>{!! __("page_accuirement.prize_1") !!}</b></td>
                                            <td>輕快的步伐</td>
                                            <td>高敏倫</td>
                                        </tr>
                                        <tr>
                                            <td>{!! __("page_accuirement.prize_2") !!}</td>
                                            <td>聲景</td>
                                            <td>鄭乃瑄</td>
                                        </tr>
                                        <tr>
                                            <td>{!! __("page_accuirement.prize_2") !!}</td>
                                            <td>石階上的歸途</td>
                                            <td>陳怡均</td>
                                        </tr>
                                    </tbody>  
                                </table>
                            </div>
                            <div class="col-sm-4">
                                <h4>{!! __("page_accuirement.prize_st_front") .__("page_accuirement.tb_station_name5").__("page_accuirement.prize_st_end") !!}</h4>
                                <table style="width: 100%" class="table">
                                    <thead>
                                        <th style="width: 20%">{!! __("page_accuirement.prize_type") !!}</th>
                                        <th style="width: 40%">{!! __("page_accuirement.prize_name") !!}</th>
                                        <th style="width: 40%">{!! __("page_accuirement.prize_creator") !!}</th>      
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><b>{!! __("page_accuirement.prize_1") !!}</b></td>
                                            <td>戲遊東門</td>
                                            <td>文尹宸、許啟隆</td>
                                        </tr>
                                        <tr>
                                            <td>{!! __("page_accuirement.prize_2") !!}</td>
                                            <td>東門隨想</td>
                                            <td>張詠橋</td>
                                        </tr>
                                        <tr>
                                            <td>{!! __("page_accuirement.prize_2") !!}</td>
                                            <td>成長的太快</td>
                                            <td>吳修銘</td>
                                        </tr>
                                    </tbody>  
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
                <section data-theme="red" class="page_register magnetic">
                    <div class="map"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="page_title">
                                    <h3>Register Form</h3>
                                    <h1>{!! __("page_regist.title") !!}</h1>
                                </div>
                                <p>{!! __("page_regist.description") !!}</p>
                                <br >
                                <br class='hidden-xs'>
                                <br class='hidden-xs'>
                                <a class="btn btn-default" target="_blank" href="{{ asset('file/台北聲音地景徵件辦法_中文版.pdf') }}" onclick="ga('send', 'event', 'Download', 'Chinese Agreement', '');">{!! __("page_regist.btn_download_agree_zh") !!}</a>
                                <br>
                                <a class="btn btn-default" target="_blank" href="{{ asset('file/台北聲音地景徵件辦法_英文版.pdf') }}" onclick="ga('send', 'event', 'Download', 'English Agreement', '');">{!! __("page_regist.btn_download_agree_en") !!}</a>
                                <br>
                                <a class="btn btn-default" target="_blank" href="{{ asset('file/TaipeiSound_Material_聲音素材.zip') }}" onclick="ga('send', 'event', 'Download', 'Sound Material package', '');">{!! __("page_regist.btn_download_music") !!}</a>

                            </div>
                            <div class="col-sm-9">
                                <form action="{{ url('/registwork') }}"  enctype="multipart/form-data" method="post" id="regist_form">
                                    <input type="hidden" name="_method" value="post">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">

                                    <Registform></Registform>

                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <footer class="magnetic">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="colname">{!! __("footer.organizer") !!}</div>
                            <br>
                            <a class="data" href="https://www.culture.gov.taipei/" target="_blank" title="前往網站"> 
                                <img src="{{ asset('img/icon_company_1.svg')}}" alt="">
                            </a>
                        </div>
                        <div class="col-sm-2">                           
                            <div class="colname">{!! __("footer.co_organizer") !!}</div>
                            <br>
                             <a class="data" href="https://www.culture.gov.taipei/" target="_blank" title="前往網站"> 
                                <img src="{{ asset('img/icon_company_1a.svg')}}" alt="">
                            </a>
                        </div>
                        <div class="col-sm-3">
                            <div class="colname">{!! __("footer.implementer") !!}</div>
                            <br>
                            <a class="data" href="http://www.harvestmusician.com/" target="_blank" title="前往網站"> <img src="{{ asset('img/icon_company_2.svg')}}" alt=""> 
                            </a>
                            <br>
                            <span> {!! __("footer.contact") !!}: +886-2-2765-2969</span> 
                            <br>
                            <span> {!! __("footer.music") !!}: <a href="https://www.facebook.com/profile.php?id=1674474496" target="_blank" style="color: black">{!! __("footer.music_name") !!}</a> </span> 
                        </div>
                        <div class="col-sm-3">
                            <div class="colname">{!! __("footer.cooperative") !!}</div>
                            <br>
                            <a class="data" href="http://www.mcu.org.tw/" target="_blank" title="前往網站"> <img src="{{ asset('img/icon_company_4.png')}}" alt=""></a>
                            {!! __("footer.mcu") !!}
                            <br>
                            <a class="data" href="http://www.megaforce.tw/" target="_blank" title="前往網站"> 
                            <img src="{{ asset('img/icon_company_3.svg')}}" alt="">
                            </a>
                            {!! __("footer.megaforce") !!}
                             
                             </a>
                             
                        </div>
                        <div class="col-sm-2">
                            <div class="colname">{!! __("footer.website") !!}</div>
                            <br>
                            <a class="data" href="http://monoame.com/" target="_blank" title="前往網站"> <img src="{{ asset('img/icon_company_5.svg')}}" alt=""></a>
                            {!! __("footer.monoame") !!}
                        </div>
                    </div>
                </div>
            </footer>
            <audio autoplay="autoplay" loop="loop" id="bgsound">
              <source src="{{ asset('audio/網頁音效素材/首頁.mp3') }}"/>
          </audio>  
        </div>

        



<script>
    window.data_storage={};
    window.data_storage.stations= {!! json_encode($stations->toArray()) !!};
    window.data_storage.lang={
        name: "{{ Lang::locale() }}",
        website: {!! json_encode(Lang::get('website')) !!},
        page_impromptu: {!! json_encode(Lang::get('page_impromptu')) !!},
        page_explore: {!! json_encode(Lang::get('page_explore')) !!},
        page_regist: {!! json_encode(Lang::get('page_regist')) !!},

    };


    // window.data_storage.countrydata = '{{ config("constants.country_list") }}';

</script>

<script src="{{ asset('js/app.js') }}"  async></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/scrollify/1.0.13/jquery.scrollify.min.js"></script> -->



    </body>
</html>

