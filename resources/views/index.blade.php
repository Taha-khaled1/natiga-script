<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <style>
        * {
            text-decoration: none;
        }

        .con,
        .mid,
        .codes,
        .info,
        img {
            width: 100%
        }

        .con {
            width: 80%;
            margin-left: auto;
            margin-right: auto;
        }

        .top {
            margin-top: 40px;
            max-height: 40vh;
        }

        h3 {
            text-align: center;
            width: 100%;
            font-weight: 700;
            font-size: 22px
        }

        .codes {
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            margin-bottom: 50px;
        }

        .logo,
        .parcode,
        .zfta {
            width: 300px
        }

        .parcode {
            width: 140px
        }

        .info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap
        }

        .inner,
        .alot {
            width: 250px;
            height: 150px
        }

        .one,
        .two,
        .inner {
            display: flex;
            justify-content: space-between;
            align-items: center
        }

        .orange {
            border-radius: 8px;
            font-weight: 700;
            font-size: 18px;
            text-align: center;
            width: 120px;
            height: 40px;
            border: 1px solid #0f0f0f;
            color: #ffa500;
            background-color: #0f0f0f;
            display: flex;
            justify-content: center;
            align-items: center
        }

        .kashf {
            font-weight: 700;
            font-size: 30px;
            text-align: center;
            width: 100%;
            color: #ffa500;
            display: flex;
            justify-content: center;
            align-items: center
        }

        .regular {
            border-radius: 8px;
            font-weight: 700;
            font-size: 18px;
            text-align: center;
            width: 120px;
            height: 40px;
            border: 1px solid #0f0f0f;
            display: flex;
            justify-content: center;
            align-items: center
        }

        .table {
            width: 100%
        }

        table {
            margin-left: auto;
            margin-right: auto;
            border-collapse: collapse;
            width: 100%;
            border: 3px solid #c5c2c2;
            text-decoration: none;
            color: black;
            cursor: default;
        }

        tr,
        td {
            border: 3px solid #c5c2c2;
            text-align: center;
            padding: 8px 12px;
            font-weight: 700;
            font-size: 18px;
            text-decoration: none;
            color: black;
            cursor: default;
        }

        .table_last {
            width: 60%
        }

        .zft {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 90px;
            gap: 90px
        }

        .text,
        .text h4,
        .text p {
            font-weight: 900;
            font-size: 20px;
            text-align: center
        }

        .download_btn {
            width: 40px;
            height: 40px;
            position: fixed;
            bottom: 150px;
            left: 190px;
        }

        .btn {
            cursor: pointer;
            width: 100%;
            color: #2020d4;
            font-size: 22px;
            font-weight: bold;
        }

        @media (max-width:600px) {
            .logo {
                width: 180px
            }

            .parcode {
                width: 85px
            }

            .top {
                max-height: 33vh
            }

            .inner,
            .alot,
            .one,
            .two {
                height: 42px
            }

            .inner,
            .alot {
                width: 209px
            }

            tr,
            td {
                padding: 8px 3px;
                font-weight: 600;
                font-size: 12px
            }

            h3 {
                font-size: 18px
            }

            .orange,
            .regular {
                font-size: 16px;
                width: 100px;
                height: 32px
            }

            .table_last {
                width: 65%
            }

            .zft {
                display: flex;
                align-items: center;
                gap: 10px;
                margin: 0;
                justify-content: space-between;
            }

            .text {
                width: 75%
            }

            .zfta {
                width: 150px
            }

            .download_btn {
                bottom: 75px;
                left: 60px;
            }
        }
    </style>
    <title>Sherif Task</title>
</head>

<body dir="rtl">
    <div class="con">
        <div class="top">
            <div class="codes">

                <div class="parcode">
                    {!! $qrQode !!}
                </div>
                <div class="logo">
                    <img src="{{ URL::asset('logo_l.png') }}" alt="">
                </div>
            </div>
            <div class="info">
                <div class="inner">
                    <p class="orange">رقم الحجز</p>
                    <p class="regular">{{ $data['clientData']['reservationNumber'] }}</p>
                </div>
                <div class="inner">
                    <p class="orange">كشف الركاب</p>
                    {{-- <p class="kashf">كشف الركاب</p> --}}
                </div>
                <div class="alot">
                    <div class="one">
                        <p class="orange">اليوم</p>
                        <p class="regular">{{ \Carbon\Carbon::now()->locale('ar')->dayName }}</p>
                    </div>
                    <div class="two">
                        <p class="orange">التاريخ</p>
                        <p class="regular">
                            {{ now()->format('d/m/Y') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="mid">
            <div class="table">
                <table>
                    <h3>بيانات السائق</h3>
                    <tbody>
                        <tr>
                            <td>اسم السائق</td>
                            <td>رقم الهوية</td>
                            <td>رقم الجوال</td>
                            <td>نوع السيارة</td>
                            <td>رقم اللوحة</td>
                        </tr>
                        <tr>
                            <td>{{ $data['userData']['driversName'] }}</td>
                            <td>{{ $data['userData']['driversID'] }}</td>
                            <td>{{ $data['userData']['driversCellPhone'] }}</td>
                            <td>{{ $data['userData']['typeOfCar'] }}</td>
                            <td>{{ $data['userData']['carNumber'] }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="table">
                <h3>بيانات العميل</h3>
                <div>
                    <table class="table table-bordered main-table text-center customer-details">
                        <tbody>
                            <tr>
                                <th style="background-color: rgba(192,192,192,255);">اسم العميل</th>
                                <td style="background-color: rgba(192,192,192,255);" colspan="5">
                                    sdfdsf</td>
                            </tr>
                            <tr>
                                <td>جهة القدوم</td>
                                <td>جهة الوصول</td>
                                <td>رقم العميل</td>
                                <td colspan="1">الرحلة</td>
                                <td colspan="1" class="">ملاحظات</td>
                            </tr>
                            <tr>
                                <td>{{ $data['clientData']['destinationArrival'] }}</td>
                                <td>{{ $data['clientData']['destination'] }}</td>
                                <td>{{ $data['clientData']['customerMobileNumber'] }}</td>
                                <td>{{ $data['clientData']['flight'] }}</td>
                                <td>{{ $data['clientData']['note'] }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="last">
            <div class="table_last">
                <h3>بيانات المرافقين</h3>
                <table>
                    <tbody>
                        <tr>
                            <th style="background-color: rgb(177, 172, 172); width: 5%;">#</th>
                            <td style="background-color: rgba(192,192,192,255); width: 32%;">اسم
                                المرافق</td>
                            <td style="background-color: rgba(192,192,192,255); width: 30%;">الجنسية
                            </td>
                            <td style="background-color: rgba(192,192,192,255); width: 30%;">الجواز /
                                الهويه
                            </td>
                        </tr>
                        @foreach ($data['morafksData'] as $index => $morafk)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td style="white-space: nowrap;">{{ $morafk['passengerName'] }}</td>
                                <td>{{ $morafk['nationality'] }}</td>
                                <td>{{ $morafk['identity'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="zft">
                <div class="text">
                    <h4>*** ملاحظة هامة ***</h4>
                    <p>في حالة عدم تطابق بيانات الضيف مع الاثبات تكن عرضة للجزاء وهذاء تعهد منا بذلك</p>
                    <p>شاكرين لكم حسن تعاونكم معنا</p>
                </div>
                <div class="zfta">
                    <a alt="logo(wasal)">
                        <img src="{{ URL::asset('ll.png') }}">
                    </a>
                </div>
            </div>
        </div>
        <div class="download_btn">
            <a class="btn">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                </svg>
            </a>
        </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
    integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    let bodyElement = document.querySelector("body");
    let download_btn = document.querySelector(".btn");
    let downloadPDF = function() {
        let opt = {
            margin: 0.3,
            filename: "Test",
            image: {
                type: 'jpeg',
                quality: 0.98
            },
            html2canvas: {
                scale: 2
            },
            jsPDF: {
                unit: 'in',
                format: 'A3',
                orientation: 'portrait'
            }
        };
        html2pdf().from(bodyElement).set(opt).save().then(() => {});
    }

    download_btn.addEventListener("click", downloadPDF)
    window.onload = downloadPDF()
    if (window.flutter_inappwebview) {
        // Send a message to the Flutter side
        window.flutter_inappwebview.callHandler('printPage');
    }
    if (window.flutter_inappwebview) {
        window.flutter_inappwebview.callHandler('printPage', 'your arguments here').then(function(result) {
            // You can optionally handle a response back from Flutter here
        });
    }
</script>

</html>
