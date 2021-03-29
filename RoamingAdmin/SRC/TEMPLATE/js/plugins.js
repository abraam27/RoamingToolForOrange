$(document).ready(function(){
   $("select").change(function(){
       // get data from select
       var name = $(this).val();
       // load ajax
       $.ajax({
            url:"data.php?name="+name,
            success:function(data){
                $("#info").html(data);
            },
            error:function(data){
                $("#info").html("data");
            }
        });
   });
});
