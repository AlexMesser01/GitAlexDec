$(document).ready(function(){
    var searchDrop = $("#searchDrop");
    $("#srch_data").on("input", function(event){
        searchDrop.empty();
        event.preventDefault();
        let srch_value = $("#srch_data").val();
        let token = $("input[name='_token']").val();
        if (srch_value != "") {
            $.ajax({
                url: "/request",
                type: "POST",
                data: {
                    "_token": token,
                    "srch_data" : srch_value,
                },
                success: function(response){
                    console.log(response["news_info"]);
                    for (let index = 0; index < response[0]["news_info"].length; index++) {
                        
                        console.log(response[0]["category"][0][index]);
                        let url = "/news/"+response[0]["category"][0][index]+"/"+response[0]["news_info"][index]["id_news"];
                        //console.log(url);
                        let newLi = $("<li class='list-group-item'><a class='link-dark text-decoration-none' href="+url+">"+response[0]["news_info"][index]["Tittle"]+"</a></li>");
                        searchDrop.append(newLi);
                    }
                }
            });
        }
    });
});