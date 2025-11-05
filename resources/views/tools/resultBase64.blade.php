@extends('tools.layout.layout')

@section('content')

    <article class="about  active" data-page="about">


        <!--
          - service
        -->

        <section class="service">

            <h3 class="h3 service-title">Result {{$action}}</h3>

            <ul class="service-list">

                @if($type == "file" && $action=='decodeBase64')
                    <li class="service-item">

                        <div class="service-icon-box">
                            <img src="{{asset('assets/images/file.png')}}" alt="design icon" width="40">
                        </div>

                        <div class="service-content-box">
                            <h4 class="h4 service-item-title">Type</h4>

                            <h5 class="service-item-text h5">
                                {{$mime}} </h5>
                        </div>

                    </li>
                    <li class="service-item">

                        <div class="service-icon-box">
                            <img src="{{asset('assets/images/dn.png')}}" alt="design icon" width="40">
                        </div>

                        <div class="service-content-box">
                            <h4 class="h4 service-item-title">Download</h4>

                            <h5 class="service-item-text h5">
                                <a class="form-btn" href="{{$url}}" target="_blank">
                                    <span>Download</span>
                                </a>

                            </h5>
                        </div>

                    </li>
                @endif
                <li class="service-item" style="grid-column: 1 / -1; width:100%;">

                    <div class="service-icon-box" style="margin-bottom: 10px;">
                        <img  src="{{asset('assets/images/result.png')}}" alt="result icon" width="40">
                    </div>

                    <div class="service-content-box" style="width:100%;">
                        <h4 class="h4 service-item-title">Result</h4>


                        @if($type == "file" && $action=='decodeBase64')

                            <pre style="
            background-color:#1e1e1e;
            color:#00ffae;
            padding:15px;
            border-radius:10px;
            white-space:pre-wrap;
            word-break:break-word;
            width:100%;
            overflow:auto;
            font-family: 'Courier New', monospace;
            font-size: 14px;
            line-height: 1.5;
            min-height: 200px;
        ">

                                   {{-- اگر تصویر بود، پیش‌نمایش نشون بده --}}
                                @if(Str::startsWith($mime, 'image/'))
                                    <div  style="margin-left: 25%">
                <img src="{{ $url }}" alt="Preview" style="max-width:300px; border-radius:8px;">
            </div>
                                @endif

                              </pre>

                        @else
                            @if(gettype($result) == 'object')

                                <pre style="
            background-color:#1e1e1e;
            color:#00ffae;
            padding:15px;
            border-radius:10px;
            white-space:pre-wrap;
            word-break:break-word;
            width:100%;
            overflow:auto;
            font-family: 'Courier New', monospace;
            font-size: 14px;
            line-height: 1.5;
            min-height: 200px;
        ">{{ json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) }}</pre>

                            @else
                                <pre style="
            background-color:#1e1e1e;
            color:#00ffae;
            padding:15px;
            border-radius:10px;
            white-space:pre-wrap;
            word-break:break-word;
            width:100%;
            overflow:auto;
            font-family: 'Courier New', monospace;
            font-size: 14px;
            line-height: 1.5;
            min-height: 200px;
        ">{{  $result}}</pre>
                            @endif
                        @endif


                    </div>

                </li>


            </ul>

        </section>


    </article>

@endsection
