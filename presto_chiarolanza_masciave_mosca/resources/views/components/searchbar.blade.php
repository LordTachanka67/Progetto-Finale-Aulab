<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<div class="middle">
    <form action="{{ route('articles.searched') }}" class="search-box">
        <input class="input" type="text" name="query" value="">
        <button type="button" class="btn-search" name="button"></button>
    </form>
</div>

<script type="text/javascript">
    $(".btn-search").on("click", function() {
        $(".input").toggleClass("inclicked");
        $(".btn-search").toggleClass("close");
    });
</script>
