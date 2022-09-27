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
                    for (let index = 0; index < response.length; index++) {
                        console.log(response[index]["Tittle"]);
                        let url = "/news/"+response[index]["category_news"]+"/"+response[index]["id_news"];
                        console.log(url);
                        let newLi = $("<li class='list-group-item'><a class='link-dark text-decoration-none' href="+url+">"+response[index]["Tittle"]+"</a></li>");
                        searchDrop.append(newLi);
                    }
                }
            });
        }
    });
});