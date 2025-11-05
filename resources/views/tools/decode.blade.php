
<!--
          - #BLOG
        -->

<article class="blog" data-page="decode">

    <header>
        <h2 class="h2 article-title">Decode Base64</h2>
    </header>

    <section class="blog-posts">
        <form action="{{route('tools.decodeBase64')}}" method="post" class="form" enctype="multipart/form-data" data-form>
            {{csrf_field()}}


            <textarea name="data" class="form-input" placeholder="Your Data" required
                      data-form-input></textarea>

            <button class="form-btn" type="submit" >
                <ion-icon name="paper-plane"></ion-icon>
                <span>Decode</span>
            </button>

        </form>


    </section>

</article>
