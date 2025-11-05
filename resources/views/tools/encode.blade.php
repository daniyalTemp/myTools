<!--
          - #PORTFOLIO
        -->

<article class="portfolio" data-page="encode">

    <header>
        <h2 class="h2 article-title">Encode  base64</h2>
    </header>

    <section class="projects">

        <form action="{{route('tools.encodeBase64')}}" method="post" class="form" enctype="multipart/form-data" data-form>
            {{csrf_field()}}
            <h2 class="h2 article-title">upload a File</h2>


            <input type="file" name="file" class="form-input" placeholder="file"
                   data-form-input>

            <br>

<p>
            <h2 class="h2 article-title">Or Use text</h2>



            <br>

            <textarea name="data" class="form-input" placeholder="Your Data"
                      data-form-input></textarea>

            <button class="form-btn" type="submit"  data-form-btn>
                <ion-icon name="paper-plane"></ion-icon>
                <span>Encode</span>
            </button>

        </form>

    </section>

</article>
