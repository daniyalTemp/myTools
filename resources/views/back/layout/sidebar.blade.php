<aside class="sidebar" data-sidebar>

    <div class="sidebar-info">

        <figure class="avatar-box">
            <img style="  border-radius:30%" src="{{asset('assets/images/my-avatar.png')}}"  width="80">
        </figure>

        <div class="info-content">

            <h1 class="name" title="Richard hanrick">{{auth()->user()->name}}</h1>

            <div style="display: grid;grid-template-columns: 1fr 1fr">
            <a href="{{route('Home')}}" class="title">See Websit</a>
            <a href="{{route('logOut')}}" class="title">Log Out</a>
            </div>
        </div>

        <button class="info_more-btn" data-sidebar-btn>
            <span>Show more</span>

            <ion-icon name="chevron-down"></ion-icon>
        </button>

    </div>

    <div class="sidebar-info_more">

        <div class="separator"></div>

        <ul class="contacts-list">

            <li class="contact-item">

                <div class="icon-box">
                    <ion-icon name="home-outline"></ion-icon>
                </div>

                <div class="contact-info">

                    <a href="{{route('dashboard.index')}}" class="contact-link">Home</a>
                </div>

            </li>
            <li class="contact-item">

                <div class="icon-box">
                    <ion-icon name="bug-outline"></ion-icon>
                </div>

                <div class="contact-info">

                    <a href="{{route('tools.index')}}" class="contact-link">tools</a>
                </div>

            </li>
            <li class="contact-item" >

                <div class="icon-box ">
                    <ion-icon name="code-outline"></ion-icon>
                </div>

                <div class="contact-info">

                    <a href="{{route('dashboard.projects')}}" class="contact-link">Projects</a>
                </div>

            </li>
            <li class="contact-item">

                <div class="icon-box">
                    <ion-icon name="people"></ion-icon>
                </div>

                <div class="contact-info">

                    <a href="{{route('dashboard.contact')}}" class="contact-link">Contacts</a>
                </div>

            </li>
{{--
            <li class="contact-item">

                <div class="icon-box">
                    <ion-icon name="pricetags"></ion-icon>
                </div>

                <div class="contact-info">

                    <a href="#" class="contact-link">Commen ts</a>
                </div>

            </li>
--}}
            <li class="contact-item">

                <div class="icon-box">
                    <ion-icon name="logo-wordpress"></ion-icon>
                </div>

                <div class="contact-info">

                    <a href="{{route('dashboard.blogs')}}" class="contact-link">Blog</a>
                </div>

            </li>
            <li class="contact-item">

                <div class="icon-box">
                    <ion-icon name="copy"></ion-icon>
                </div>

                <div class="contact-info">

                    <a href="{{route('dashboard.resumes')}}" class="contact-link">Resume</a>
                </div>

            </li>
            <li class="contact-item">

                <div class="icon-box">
                    <ion-icon name="settings"></ion-icon>
                </div>

                <div class="contact-info">

                    <a href="{{route('dashboard.config')}}" class="contact-link">Configs</a>
                </div>

            </li>

        </ul>

        <div class="separator"></div>



    </div>

</aside>
