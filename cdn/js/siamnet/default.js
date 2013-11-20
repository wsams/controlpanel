function c(ac, cm, di) {
    $.ajax({
        type: "GET",  
        url: "index.php",  
        data: "ac=" + ac + "&cm=" + cm,
        dataType: "json",
        success: function(json) {
            if (json['status'] === "ok") {
                $('#' + di).html(json['content']);
            } else {
                alert(json['message']);
            }
            setTimeout("c('" + ac + "', '" + cm + "', '" + di + "')", 5000);
        }
    });
}
$(document).ready(function(){
    c("cm", "w", "w");
    c("cm", "la", "last");
});
