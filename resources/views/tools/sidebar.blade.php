<aside class="sidebar" data-sidebar>

    <div class="sidebar-info">

        <figure class="avatar-box">
            <img style="  border-radius:30%" src="{{asset('assets/images/my-avatar.png')}}"  width="80">
        </figure>

        <div class="info-content">

            <h1 class="name" title="Richard hanrick">my tools</h1>

           
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
                    <ion-icon name="bug-outline"></ion-icon>
                </div>

                <div class="contact-info">

                    <a href="{{route('tools.index')}}" class="contact-link">tools</a>
                </div>

            </li>



        </ul>

        <div class="separator"></div>



    </div>

</aside>
