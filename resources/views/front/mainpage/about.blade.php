<!--
          - #ABOUT
        -->

<article class="about  active" data-page="about">

    <header>
        <h2 class="h2 article-title">About me</h2>
    </header>

    <section class="about-text">
        @include('back.config.about')
    </section>


    <!--
      - service
    -->

    <section class="service">

        <h3 class="h3 service-title">What i'm doing</h3>

        <ul class="service-list">

            @if(isset($services))
                @foreach($services as $service)
                    <li class="service-item">

                        <div class="service-icon-box">
                            <img src="/storage/images/services/{{$service->image}}
                " alt="design icon" width="40">
                        </div>

                        <div class="service-content-box">
                            <h4 class="h4 service-item-title">{{$service->title}}</h4>

                            <p class="service-item-text">
                                {{$service->text}}
                            </p>
                        </div>

                    </li>

                @endforeach
            @endif


        </ul>

    </section>


    <!--
      - testimonials
    -->

    <section class="testimonials">

        <h3 class="h3 testimonials-title">Your Comments</h3>

        <ul class="testimonials-list has-scrollbar">
            <div class="modal-container" data-modal-container>

                <div class="overlay" data-overlay></div>

                <section class="testimonials-modal">

                    <button class="modal-close-btn" data-modal-close-btn>
                        <ion-icon name="close-outline"></ion-icon>
                    </button>

                    <div class="modal-img-wrapper">
                        <figure class="modal-avatar-box">
                            <img src="./assets/images/avatar-1.png" width="80" data-modal-img>
                        </figure>

                        <img src="./assets/images/icon-quote.svg" alt="quote icon">
                    </div>

                    <div class="modal-content">

                        <h4 class="h3 modal-title" data-modal-title></h4>

                        <time datetime="2021-06-14"></time>

                        <div data-modal-text>
                            <p>
                            </p>
                        </div>

                    </div>

                </section>

            </div>
            @if(isset($comments))
                @foreach($comments as $comment)
                    <li class="testimonials-item">
                        <div class="content-card" data-testimonials-item>

                            <figure class="testimonials-avatar-box">
                                <img src="./assets/images/avatar-1.png" width="60"
                                     data-testimonials-avatar>
                            </figure>

                            <h4 class="h4 testimonials-item-title" data-testimonials-title>
                                {{$comment->fullName}}
                            </h4>

                            <div class="testimonials-text" data-testimonials-text>
                                <p>
                                    {{$comment->text}}
                                </p>
                            </div>

                        </div>
                    </li>

                    <!--
        - testimonials modal
      -->

                    <div class="modal-container" data-modal-container>

                        <div class="overlay" data-overlay></div>

                        <section class="testimonials-modal">

                            <button class="modal-close-btn" data-modal-close-btn>
                                <ion-icon name="close-outline"></ion-icon>
                            </button>

                            <div class="modal-img-wrapper">
                                <figure class="modal-avatar-box">
                                    <img src="./assets/images/avatar-1.png" width="80" data-modal-img>
                                </figure>

                                <img src="./assets/images/icon-quote.svg" alt="quote icon">
                            </div>

                            <div class="modal-content">

                                <h4 class="h3 modal-title" data-modal-title>{{$comment->fullName}}</h4>

                                <time datetime="2021-06-14">{{$comment->created_at}}</time>

                                <div data-modal-text>
                                    <p>
                                        {{$comment->text}}
                                    </p>
                                </div>

                            </div>

                        </section>

                    </div>

                @endforeach
            @endif


        </ul>

    </section>





    <!--
      - clients
    -->

    <section class="clients">

        <h3 class="h3 clients-title">Clients</h3>

        <ul class="clients-list has-scrollbar">


            @if(isset($clients))
                @foreach($clients as $client)
                    <li class="clients-item">
                        <a href="//{{$client->link}}" target="_blank" title="{{$client->name}}">
                            <img src="/storage/images/clients/{{$client->logo}}"  alt="{{$client->name}}">
                        </a>
                    </li>
                @endforeach
            @endif



        </ul>

    </section>

</article>

