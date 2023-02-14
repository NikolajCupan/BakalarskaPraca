<script>
    $(document).ready(function() {
        setTimeout(function() {
            $("#flashMessage").fadeOut("slow");
        }, 2500);
    });
</script>

<style>
    .flashMessage {
        width: 30%;
        margin: 0 auto;
        opacity: 0.7;
        text-align: center;
    }
</style>

@if (session()->has('message'))
    <div class="flashMessage alert alert-success" role="alert">
        {{ session()->get('message') }}
    </div>
@endif
