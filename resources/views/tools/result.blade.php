@extends('tools.layout.layout')

@section('content')

    <article class="about  active" data-page="about">


        <!--
          - service
        -->

        <section class="service">

            <h3 class="h3 service-title">Result {{$action}}</h3>

            <ul class="service-list">

@if($action == "Encryption" || $action == "Decryption")
                <li class="service-item">

                    <div class="service-icon-box">
                        <img src="{{asset('assets/images/key.png')}}" alt="design icon" width="40">
                    </div>

                    <div class="service-content-box">
                        <h4 class="h4 service-item-title">key</h4>

                        <h5 class="service-item-text h5">
                            {{$myKey}} </h5>
                    </div>

                </li>
                <li class="service-item">

                    <div class="service-icon-box">
                        <img src="{{asset('assets/images/iv.png')}}" alt="design icon" width="40">
                    </div>

                    <div class="service-content-box">
                        <h4 class="h4 service-item-title">IV</h4>

                        <h5 class="service-item-text h5">
                            {{$iv}} </h5>
                    </div>

                </li>
                @endif
                <li class="service-item" style="grid-column: 1 / -1; width:100%;">

                    <div class="service-icon-box" style="margin-bottom: 10px;">
                        <img src="{{asset('assets/images/result.png')}}" alt="result icon" width="40">
                    </div>

                    <div class="service-content-box" style="width:100%;">
                        <h4 class="h4 service-item-title">Result</h4>

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
                    </div>

                </li>


            </ul>

        </section>


    </article>

@endsection
