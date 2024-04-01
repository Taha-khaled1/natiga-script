@extends('layouts.master')
@section('css')
    <!-- Internal Select2 css -->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!--Internal  Datetimepicker-slider css -->
    <link href="{{ URL::asset('assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/pickerjs/picker.min.css') }}" rel="stylesheet">
    <!-- Internal Spectrum-colorpicker css -->
    <link href="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.css') }}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <style>
        /* Optional: Adjust the label style */
        .label-for-file {
            font-size: 16px;
            font-weight: bold;
        }

        /* Style the file input */
        .file-input {
            margin-top: 10px;
            /* Adjust as needed */
            width: 100%;
            /* Make it fill the entire container */
            padding: 5px;
            /* Add some padding for better appearance */
            border: 1px solid #ced4da;
            /* Add a border */
            border-radius: 4px;
            /* Add border radius for rounded corners */
        }

        /* Style the file input when hovered */
        .file-input:hover {
            border-color: #adb5bd;
            /* Change border color on hover */
        }

        /* Style the file input when focused */
        .file-input:focus {
            border-color: #80bdff;
            /* Change border color on focus */
            outline: none;
            /* Remove default focus outline */
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
            /* Add focus shadow */
        }

        .file-upload {
            position: relative;
            display: inline-block;
        }

        color-input-group {
            display: flex;
            align-items: center;
        }

        .color-input {
            margin-right: 10px;
        }

        .price-input {
            width: 150px;
        }


        .file-upload input[type="file"] {
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        .file-upload label {
            display: inline-block;
            background-color: #3498db;
            color: #fff;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
        }

        .file-upload label span {
            margin-right: 10px;
        }

        .file-preview {
            margin-top: 10px;
            display: flex;
            flex-wrap: wrap;
        }

        .file-preview img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            margin-right: 10px;
            margin-bottom: 10px;
            border-radius: 4px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        }
    </style>
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">النتائج</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ اضافة
                    نتيجه</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Add') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif


    @if (session()->has('Edit'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Edit') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif


    @if (session()->has('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('delete') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session()->has('Error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('Error') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <!-- row -->
    <form action="{{ route('coupons.store') }}" method="post" enctype="multipart/form-data">
        {{ method_field('post') }}
        {{ csrf_field() }}
        <div class="row">

            {{-- ------------------------------------------------------------------------------------------------------------------------------------------------------------ --}}

            <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                <!--div-->
                <div class="card">






                    <br>



                    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <br>
                                <div class="row row-sm">

                                    <div class="col-lg">
                                        <p class="mg-b-10">اختار المعهد</p>
                                        <select id="college_id" name="college_id" class="form-control SlectBox"
                                            onclick="console.log($(this).val())" onchange="console.log('change is firing')">
                                            @foreach ($coupons as $item)
                                                <option value="{{ $item->id }}"> {{ $item->name }} </option>
                                            @endforeach


                                        </select>
                                    </div>

                                    <div class="col-lg">
                                        <p class="mg-b-10">اختار الصف</p>
                                        <select id="symester_id" name="symester" class="form-control SlectBox"
                                            onclick="console.log($(this).val())" onchange="console.log('change is firing')">

                                            <option value="1"> ألصف الاول </option>
                                            <option value="2"> ألصف الثاني </option>
                                            <option value="3"> ألصف الثالث </option>

                                        </select>
                                    </div>

                                    <div class="col-lg">
                                        <div class="form-group">
                                            <label for="file_id" class="label-for-file">رفع الملف</label>
                                            <input type="file" class="file-input form-control-file" id="file_id"
                                                name="file">
                                        </div>
                                    </div>



                                    <input type="text" hidden value="{{ Auth::id() }}" name="user_id">



                                </div>

                            </div>
                            <!-- حقول الوقت -->


                        </div>
                    </div>

                    <button type="submit" class="btn btn-danger"
                        style="width:200px; height:50px; background-color: blue; color:white; margin: 0 auto;">حفظ
                    </button>


                </div>
            </div>
        </div>


    </form>
    <!-- row closed -->
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('.main-toggle').on('click', function() {
                console.log('==========================');
                var isActive = $(this).hasClass('main-toggle-success');
                var couponActiveInput = $('#couponActiveInput');

                if (isActive) {
                    $(this).removeClass('main-toggle-success');
                    couponActiveInput.val('1');
                } else {
                    $(this).addClass('main-toggle-success');
                    couponActiveInput.val('0');
                }
            });
        });
    </script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!-- Internal Select2.min js -->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Ion.rangeSlider.min js -->
    <script src="{{ URL::asset('assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
    <!--Internal  jquery-simple-datetimepicker js -->
    <script src="{{ URL::asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js') }}"></script>
    <!-- Ionicons js -->
    <script src="{{ URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js') }}"></script>
    <!--Internal  pickerjs js -->
    <script src="{{ URL::asset('assets/plugins/pickerjs/picker.min.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>

    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
@endsection
