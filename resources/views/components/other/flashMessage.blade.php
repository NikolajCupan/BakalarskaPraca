<script>
    $(document).ready(function() {
        setTimeout(function() {
            $("#flashMessage").fadeOut("slow");
        }, 2500);
    });
</script>

<style>
    .flashMessage {
        width: 20%;
        min-width: 150px;
        opacity: 0.7;
        text-align: center;
        z-index: 9999;
        position: absolute;
        left: 0;
        right: 0;
        margin-left: auto;
        margin-right: auto;
    }
</style>

@if (session()->has('message'))
    <div class="flashMessage alert alert-success" id="flashMessage" role="alert">
        {{ session()->get('message') }}
    </div>
@elseif (session()->has('errorMessage'))
    <div class="flashMessage alert alert-danger" id="flashMessage" role="alert">
        {{ session()->get('errorMessage') }}
    </div>
@endif
