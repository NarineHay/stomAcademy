<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=400" />
    <title>Открыт доступ</title><!-- og:meta -->
    <meta property="og:url" content="http://project3081274.tilda.ws/page48163123.html" />
    <meta property="og:title" content="Открыт доступ" />
    <meta property="og:description" content="" /><!-- /og:meta -->
    <link rel="shortcut icon" href="https://tilda.ws/img/tildafavicon.ico" />
    <style type="text/css">
        .ExternalClass {
            width: 100%;
        }

        img {
            border: 0 none;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
            -ms-interpolation-mode: bicubic;
        }

        a img {
            border: 0 none;
        }

        #outlook a {
            padding: 0;
        }

        #allrecords {
            height: 100% !important;
            margin: 0;
            padding: 0;
            width: 100% !important;
            -webkit-font-smoothing: antialiased;
            line-height: 1.45;
        }

        #allrecords td {
            margin: 0;
            padding: 0;
        }

        #allrecords ul {
            -webkit-padding-start: 30px;
        }

        .t-records ol,
        .t-records ul {
            padding-left: 20px;
            margin-top: 0px;
            margin-bottom: 10px;
        }

        @media only screen and (max-width: 600px) {
            .r {
                width: 100% !important;
                min-width: 400px !important;
                margin-top: -1px !important;
            }
        }

        @media only screen and (max-width: 480px) {
            .t-emailBlock {
                display: block !important;
                padding-left: 0 !important;
                padding-right: 0 !important;
                width: 100% !important;
            }

            .t-emailBlockPadding {
                padding-top: 15px !important;
            }

            .t-emailBlockPadding30 {
                padding-top: 30px !important;
            }

            .t-emailAlignLeft {
                text-align: left !important;
                margin-left: 0 !important;
            }

            .t-emailAlignCenter {
                text-align: center !important;
                margin-left: auto !important;
                margin-right: auto !important;
            }
        }

    </style>
</head>

<body cellpadding="0" cellspacing="0" style="padding: 0; margin: 0; border: 0; width:100%; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; background-color: #ffffff;">
    <!--allrecords-->
    <table id="allrecords" class="t-records" data-tilda-email="yes" data-tilda-project-id="3081274" data-tilda-page-id="48163123" data-tilda-page-alias="" cellpadding="0" cellspacing="0" style="width:100%; border-collapse:collapse; border-spacing:0; padding:0; margin:0; border:0;">
        <tr>
            <td style="background-color: #ffffff; ">
                <!--record_mail-->
                <table id="rec742252698" style="width:100%; border-collapse:collapse; border-spacing:0; margin:0; border:0;" cellpadding="0" cellspacing="0" data-record-type="324">
                    <tr>
                        <td style="padding-left:15px; padding-right:15px; ">
                            <table id="recin742252698" class="r" style="margin: 0 auto;border-spacing: 0;width:600px;" align="center">
                                <tr>
                                    <td style="padding-top:15px;padding-bottom:15px;padding-left:0;padding-right:0;">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tr>
                                                <td style=""> <img width="600" style="display: block; width: 100%;" src="https://static.tildacdn.biz/tild3262-6333-4630-a339-333533363530/6rko3xH75iw.jpg"> </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <!--/record-->
                <!--record_mail-->
                <table id="rec742252699" style="width:100%; border-collapse:collapse; border-spacing:0; margin:0; border:0;" cellpadding="0" cellspacing="0" data-record-type="329">
                    <tr>
                        <td style="padding-left:15px; padding-right:15px; ">
                            <table id="recin742252699" class="r" style="margin: 0 auto;background-color:#ffffff;border-spacing: 0;width:600px;" align="center">
                                <tr>
                                    <td style="padding-top:15px;padding-bottom:0px;padding-left:30px;padding-right:30px;">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="width: 100%;">
                                            <tr>
                                                <td style="text-align: left; padding: 0 0 0;">
                                                    <div style="margin-right: auto; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; color:#333333;font-size:20px;line-height:1.4;">
                                                        {{__('mail.access.hello')}} <strong></strong>{{$data['name'] ?? ''}}<br /><br />{{__('mail.access.added_access')}}<br /><br />
                                                        @if(isset($data['type']))

                                                            @if($data['type'] =='course')
                                                                <p>{{__('mail.access.access_course')}} {{$data['course']->info->title}}</p>
                                                            @elseif($data['type'] =='webinar')
                                                                <p>{{__('mail.access.access_webinar')}} {{$data['webinar']->info->title}}</p>
                                                            @endif

                                                            @if($data['access_time'])
                                                                <p>{{__('mail.access.access')}} {{$data['duration']}} {{__('mail.access.day')}}</p>
                                                            @else
                                                                <p>{{__('mail.access.all_access')}}</p>
                                                            @endif
                                                        @endif
                                                        @if(isset($data['password']))

                                                            <strong>{{__('mail.access.your_details')}}</strong>
                                                            <strong>:</strong><br />
                                                            {{__('mail.access.login')}} {{$data['email']}}<br />
                                                            {{__('mail.access.password')}} {{$data['password']}}<br /><br />
                                                        @endif

                                                        {{__('mail.access.text')}}
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <!--/record-->
                <!--record_mail-->
                <table id="rec742252700" style="width:100%; border-collapse:collapse; border-spacing:0; margin:0; border:0;" cellpadding="0" cellspacing="0" data-record-type="618">
                    <tr>
                        <td style="padding-left:15px; padding-right:15px; ">
                            <table id="recin742252700" class="r" style="margin: 0 auto;background-color:#ffffff;border-spacing: 0;width:600px;" align="center">
                                <tr>
                                    <td style="padding-top:30px;padding-bottom:30px;padding-left:30px;padding-right:30px;">
                                        <!-- Workaround: Calculate border radius for Outlook-->
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="width:100%;" style="margin: 0 auto;table-layout: fixed;">
                                            <tr>
                                                <td>
                                                    <table border="0" cellpadding="0" cellspacing="0" style="margin: 0 auto;" align="center">
                                                        <tr>
                                                            <td>
                                                                <!--[if mso]> <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="" style="height:52px;v-text-anchor:middle;mso-wrap-style:none;mso-position-horizontal:center;" arcsize="9%" stroke="f" fillcolor="#0082c3"> <w:anchorlock/> <center style="text-decoration: none; padding: 15px 30px; font-size: 15px; text-align: center; font-weight: bold; font-family:Helvetica Neue, Helvetica, Arial, sans-serif; width: 100%;color:#ffffff;"> Войти в профиль </center> </v:roundrect> <![endif]-->
                                                                <!--[if !mso]--> <a style="display: table-cell; text-decoration: none; padding: 15px 30px; font-size: 15px; text-align: center; font-weight: bold; font-family:Helvetica Neue, Helvetica, Arial, sans-serif; width: 100%;color:#ffffff; border:0px solid ; background-color:#0082c3; border-radius: 3px;" href="{{ url(''). "/"}}"> {{__('mail.access.log_in')}} </a>
                                                                <!--[endif]-->
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <!--/record-->
                <!--record_mail-->
                <table id="rec742252701" style="width:100%; border-collapse:collapse; border-spacing:0; margin:0; border:0;" cellpadding="0" cellspacing="0" data-record-type="617">
                    <tr>
                        <td style="padding-left:15px; padding-right:15px; ">
                            <table id="recin742252701" class="r" style="margin: 0 auto;background-color:#ffffff;border-spacing: 0;width:600px;" align="center">
                                <tr>
                                    <td style="padding-top:0px;padding-bottom:0px;padding-left:30px;padding-right:30px;">
                                        <table valign="top" border="0" cellpadding="0" cellspacing="0" width="100%" style="width: 100%;">
                                            <tr>
                                                <td style="text-align: center; padding: 0 0 0;">
                                                    <div style="margin: 0 auto; font-weight: normal; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; color:#8c8c8c;font-size:14px;line-height:1.4;max-width:350px;">{{__('mail.info_text')}}</div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <!--/record-->
                <!--record_mail-->
                <table id="rec742252702" style="width:100%; border-collapse:collapse; border-spacing:0; margin:0; border:0;" cellpadding="0" cellspacing="0" data-record-type="637">
                    <tr>
                        <td style="padding-left:15px; padding-right:15px; ">
                            <table id="recin742252702" class="r" style="margin: 0 auto;border-spacing: 0;width:600px;" align="center">
                                <tr>
                                    <td style="padding-top:0px;padding-bottom:0px;padding-left:30px;padding-right:30px;">
                                        <table valign="top" border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tr>
                                                <td style="height:15px;" height="15px"></td>
                                            </tr>
                                            <tr>
                                                <td style="height:1px; background-color:#dedede;" height="1px"></td>
                                            </tr>
                                            <tr>
                                                <td style="height:15px;" height="15px"></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <!--/record-->
                <!--record_mail-->
                <table id="rec742252703" style="width:100%; border-collapse:collapse; border-spacing:0; margin:0; border:0;" cellpadding="0" cellspacing="0" data-record-type="323">
                    <tr>
                        <td style="padding-left:15px; padding-right:15px; ">
                            <table id="recin742252703" class="r" style="margin: 0 auto;background-color:#ffffff;border-spacing: 0;width:600px;" align="center">
                                <tr>
                                    <td style="padding-top:0px;padding-bottom:0px;padding-left:30px;padding-right:30px;">
                                        <table valign="top" border="0" cellpadding="0" cellspacing="0" width="100%" style="width: 100%;">
                                            <tr>
                                                <td style="text-align: center; padding: 0 0 0;">
                                                    <div style="margin: 0 auto; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; color:#333333;font-size:26px;line-height:1.3;"><strong>{{__('mail.contacts')}}</strong></div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <!--/record-->
                <!--record_mail-->
                <table id="rec742252704" style="width:100%; border-collapse:collapse; border-spacing:0; margin:0; border:0;" cellpadding="0" cellspacing="0" data-record-type="637">
                    <tr>
                        <td style="padding-left:15px; padding-right:15px; ">
                            <table id="recin742252704" class="r" style="margin: 0 auto;border-spacing: 0;width:600px;" align="center">
                                <tr>
                                    <td style="padding-top:0px;padding-bottom:0px;padding-left:30px;padding-right:30px;">
                                        <table valign="top" border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tr>
                                                <td style="height:15px;" height="15px"></td>
                                            </tr>
                                            <tr>
                                                <td style="height:1px; background-color:#dedede;" height="1px"></td>
                                            </tr>
                                            <tr>
                                                <td style="height:15px;" height="15px"></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <!--/record-->
                <!--record_mail-->
                <table id="rec742252705" style="width:100%; border-collapse:collapse; border-spacing:0; margin:0; border:0;" cellpadding="0" cellspacing="0" data-record-type="329">
                    <tr>
                        <td style="padding-left:15px; padding-right:15px; ">
                            <table id="recin742252705" class="r" style="margin: 0 auto;background-color:#ffffff;border-spacing: 0;width:600px;" align="center">
                                <tr>
                                    <td style="padding-top:15px;padding-bottom:30px;padding-left:30px;padding-right:30px;">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="width: 100%;">
                                            <tr>
                                                <td style="text-align: left; padding: 0 0 0;">
                                                    <div style="margin-right: auto; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; color:#333333;font-size:14px;line-height:1.4;"><span style="color: rgb(7, 0, 0);">{{__('mail.reset_passwoed.manager_text1')}} <br /> {{__('mail.reset_passwoed.manager_text2')}}<br /><br /> <strong>{{__('mail.mail')}}</strong> <br />info@stom-academy.com<br /><br /><strong>{{__('mail.phone')}}</strong><br /> {{__('mail.belarus')}} +375 (29) 503-32-47 (Viber, WhatsApp, Telegram)! <br /> {{__('mail.russia')}} +7(499)113-19-28 <br /> {{__('mail.ukraine')}} +380 (94) 711-41-28 <br /> {{__('mail.lithuania')}} +370 (5) 208-09-69</span> <br /></div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <!--/record-->
                <!--record_mail-->
                <table id="rec742252706" style="width:100%; border-collapse:collapse; border-spacing:0; margin:0; border:0;" cellpadding="0" cellspacing="0" data-record-type="628">
                    <tr>
                        <td style="padding-left:15px; padding-right:15px; ">
                            <table id="recin742252706" class="r" style="margin: 0 auto;background-color:#ffffff;border-spacing: 0;width:600px;" align="center">
                                <tr>
                                    <td style="padding-top:30px;padding-bottom:15px;padding-left:30px;padding-right:30px;">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="width:100%; margin: 0 auto;table-layout: fixed;">
                                            <tr>
                                                <td>
                                                    <table border="0" cellpadding="0" cellspacing="0" style="margin: 0 auto;table-layout: fixed;" align="center">
                                                        <tr>
                                                            <td align="center" style="width: 34px; height: 34px; padding: 0 9px;"> <a style="text-decoration: none;" href="https://www.facebook.com/stomacademy"> <img width="34" style="display: block; width: 34px; max-width: 34px;" src="https://static.tildacdn.biz/img/soc/t_ico_fb3.png"> </a> </td>
                                                            <td align="center" style="width: 34px; height: 34px; padding: 0 9px;"> <a style="text-decoration: none;" href="https://vk.com/stomacademy"> <img width="34" style="display: block; width: 34px; max-width: 34px;" src="https://static.tildacdn.biz/img/soc/t_ico_vk3.png"> </a> </td>
                                                            <td align="center" style="width: 34px; height: 34px; padding: 0 9px;"> <a style="text-decoration: none;" href="https://www.instagram.com/stom.academy/"> <img width="34" style="display: block; width: 34px; max-width: 34px;" src="https://static.tildacdn.biz/img/soc/t_ico_instagram3.png"> </a> </td>
                                                            <td align="center" style="width: 34px; height: 34px; padding: 0 9px;"> <a style="text-decoration: none;" href="https://www.youtube.com/channel/UCRMzwWVv13t7YEOcpcNn1MA"> <img width="34" style="display: block; width: 34px; max-width: 34px;" src="https://static.tildacdn.biz/img/soc/t_ico_youtube2.png"> </a> </td>
                                                            <td align="center" style="width: 34px; height: 34px; padding: 0 9px;"> <a style="text-decoration: none;" href="https://t.me/stomacademy"> <img width="34" style="display: block; width: 34px; max-width: 34px;" src="https://static.tildacdn.biz/img/soc/t_ico_telegram3.png"> </a> </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center; padding-top: 38px;">
                                                    <div style="margin: 0 auto; font-weight: normal; font-family: Helvetica Neue, Helvetica, Arial, sans-serif; color:#222222;font-size:15px;line-height:1.5;max-width:450px;">
                                                        <div style="color:#080000;" data-customstyle="yes"><strong>▲{{__('mail.join_us')}}▲</strong></div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <!--/record-->
                <!--record_mail-->
                <table id="rec742252707" style="width:100%; border-collapse:collapse; border-spacing:0; margin:0; border:0;" cellpadding="0" cellspacing="0" data-record-type="637">
                    <tr>
                        <td style="padding-left:15px; padding-right:15px; ">
                            <table id="recin742252707" class="r" style="margin: 0 auto;border-spacing: 0;width:600px;" align="center">
                                <tr>
                                    <td style="padding-top:0px;padding-bottom:0px;padding-left:30px;padding-right:30px;">
                                        <table valign="top" border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tr>
                                                <td style="height:15px;" height="15px"></td>
                                            </tr>
                                            <tr>
                                                <td style="height:1px; background-color:#dedede;" height="1px"></td>
                                            </tr>
                                            <tr>
                                                <td style="height:15px;" height="15px"></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <!--/record-->
                <!--record_mail-->
                <table id="rec742252708" style="width:100%; border-collapse:collapse; border-spacing:0; margin:0; border:0;" cellpadding="0" cellspacing="0" data-record-type="620">
                    <tr>
                        <td style="padding-left:15px; padding-right:15px; ">
                            <table id="recin742252708" class="r" style="margin: 0 auto;border-spacing: 0;width:600px;" align="center">
                                <tr>
                                    <td style="padding-top:0px;padding-bottom:0px;padding-left:0;padding-right:0;">
                                        <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tr>
                                                <td align="center"> <img width="580" style="display:block; width:580px;" src="https://static.tildacdn.biz/tild3362-3938-4461-b136-393361326264/6rko3xH75iw.jpg"> </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <!--/record-->
            </td>
        </tr>
    </table>
    <!--/allrecords-->
</body>

</html>
