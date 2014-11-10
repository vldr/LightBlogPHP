<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<link rel="stylesheet" href="//cdn.jsdelivr.net/sceditor/1.4.3/themes/default.min.css" type="text/css" media="all" />
<script type="text/javascript" src="//cdn.jsdelivr.net/sceditor/1.4.3/jquery.sceditor.bbcode.min.js"></script>
<script>
$(function() {
    // Replace all textarea's
    // with SCEditor
    $("textarea").sceditor({
        plugins: "bbcode",
        style: "minified/jquery.sceditor.default.min.css"
    });
});
</script>