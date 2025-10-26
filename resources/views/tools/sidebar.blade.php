<!--
      - #SIDEBAR
    -->

<aside class="sidebar" data-sidebar>

    <div class="sidebar-info">

        <figure class="avatar-box">
            <img style="  border-radius:30%" src="{{asset('./assets/images/my-avatar.png')}}" alt="{{$config->firstName.' '.$config->lastName}}"  width="80">
        </figure>

        <div class="info-content">
            <h1 class="name" title="{{$config->firstName . ' '.$config->lastName}}">{{$config->firstName . ' '.$config->lastName}}</h1>

            <p class="title">Developer</p>
        </div>

        <button class="info_more-btn" data-sidebar-btn>
            <span>Show Contacts</span>

            <ion-icon name="chevron-down"></ion-icon>
        </button>

    </div>

    <div class="sidebar-info_more">

        <div class="separator"></div>

        <ul class="contacts-list">

            <li class="contact-item">

                <div class="icon-box">
                    <ion-icon name="mail-outline"></ion-icon>
                </div>

                <div class="contact-info">
                    <p class="contact-title">Email</p>

                    <a href="mailto:{{$config->email}}" class="contact-link">{{$config->email}}</a>
                </div>

            </li>

            <li class="contact-item">

                <div class="icon-box">
                    <ion-icon name="phone-portrait-outline"></ion-icon>
                </div>

                <div class="contact-info">
                    <p class="contact-title">Phone</p>

                    <a href="tel:{{$config->phone}}" class="contact-link">{{$config->phone}}</a>
                </div>

            </li>

            <li class="contact-item">

                <div class="icon-box">
                    <ion-icon name="calendar-outline"></ion-icon>
                </div>

                <div class="contact-info">
                    <p class="contact-title">Birthday</p>

                    <time datetime="1982-06-23">{{$config->birthday}}</time>
                </div>

            </li>

            <li class="contact-item">

                <div class="icon-box">
                    <ion-icon name="location-outline"></ion-icon>
                </div>

                <div class="contact-info">
                    <p class="contact-title">Location</p>

                    <address>{{$config->address}}</address>
                </div>

            </li>

        </ul>

        <div class="separator"></div>

        <ul class="social-list">





            <li class="social-item">
                <a href="//www.github.com/{{$config->github}}" target="_blank" class="social-link">
                    <ion-icon name="logo-github"></ion-icon>
                </a>
            </li>

            <li class="social-item">
                <a href="//{{$config->linkedin}}"  target="_blank" class="social-link">
                    <ion-icon name="logo-linkedin"></ion-icon>
                </a>
            </li>

            <li class="social-item">
                <a href="https://t.me/{{$config->telegram}}"target="_blank" class="social-link">
                    <ion-icon name="paper-plane"></ion-icon>
                </a>
            </li>
            <li class="social-item">
                <a href="//www.instagram.com/{{$config->instagram}}/" target="_blank" class="social-link">
                    <ion-icon name="logo-instagram"></ion-icon>
                </a>
            </li>
        </ul>

    </div>

</aside>
