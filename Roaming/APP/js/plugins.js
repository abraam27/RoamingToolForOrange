$(document).ready(function(){
   $("#country").change(function(){
        // get data from select
        var countryID = $(this).val();
        $("#default").attr("disabled","disabled");
        if(countryID){
            // load ajax
            $.ajax({
                url:"data.php?countryID="+countryID,
                success:function(data){
                    $("#data").html(data);
                },
                error:function(data){
                    $("#data").html(data);
                }
            });
        }
        
   });
});
