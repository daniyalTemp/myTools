<!--
          - #PORTFOLIO
        -->

<article class="portfolio" data-page="encode">

    <header>
        <h2 class="h2 article-title">Encode  base64</h2>
    </header>

    <section class="projects">

        <form action="{{route('contactMe')}}" method="post" class="form" data-form>
            {{csrf_field()}}


            <textarea name="data" class="form-input" placeholder="Your Data" required
                      data-form-input></textarea>

            <button class="form-btn" type="submit" disabled data-form-btn>
                <ion-icon name="paper-plane"></ion-icon>
                <span>Encrypt</span>
            </button>

        </form>

    </section>

</article>
