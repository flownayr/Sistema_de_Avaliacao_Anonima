$(document).ready(function() {
    $("#form").submit(function(event) {
        event.preventDefault();
        var url = $("#url").val();
        $.post("index.php", {url: url}, function(data) {
            $("#content").html(data);
        });
    });
});
