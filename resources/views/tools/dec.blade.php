<!--
          - #RESUME
        -->

<article class="resume" data-page="decryption">

    <header>
        <h2 class="h2 article-title">Decryption Tool</h2>
    </header>
    <h3 class="h3 article-title "> Enter Data </h3>

    <form action="{{route('tools.decrypt')}}" method="post" class="form" data-form>
        {{csrf_field()}}


        <div class="input-wrapper">
            <input type="text" name="key" class="form-input" placeholder="key" required
                   data-form-input>

            <input type="text" name="iv" class="form-input" placeholder="iv"  value="1234567890000000" required
                   data-form-input>
        </div>

        <textarea name="data" class="form-input" placeholder="Your Data" required
                  data-form-input></textarea>

        <button class="form-btn" type="submit"  data-form-btn>
            <ion-icon name="paper-plane"></ion-icon>
            <span>Encrypt</span>
        </button>

    </form>


</article>
