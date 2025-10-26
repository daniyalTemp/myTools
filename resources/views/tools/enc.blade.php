<!--
          - #ABOUT
        -->

<article class="about  active" data-page="encryption">

    <header>
        <h2 class="h2 article-title"> Encryption Tool</h2>
    </header>


    <!--
      - service
    -->

    <section class="service">


        <h3 class="h3 service-title"> Enter Data </h3>

        <form action="{{route('tools.encrypt')}}" method="post" class="form" data-form>
            {{csrf_field()}}


            <div class="input-wrapper">
                <input type="text" name="key" class="form-input" placeholder="key" required
                       data-form-input>

                <input type="text" name="iv" class="form-input" placeholder="iv"  value="1234567890000000" required
                       data-form-input>
            </div>

            <textarea name="data" class="form-input" placeholder="Your Data" required
                      data-form-input></textarea>

            <button class="form-btn " style="width: 100%;" type="submit"  data-form-btn>
                <ion-icon name="paper-plane"></ion-icon>
                <span>Encrypt</span>
            </button>

        </form>



    </section>







</article>

