const search = () => {
    const searchContent = document.getElementById("search_bar").value.toUpperCase();
    const storedArticles = document.getElementById("articles-container");
    const article = document.querySelectorAll(".card");
    const article_name = storedArticles.querySelectorAll(".card-title");
    
    for(var i = 0; i < article_name.length; i++){
        let match = article[i].getElementsByClassName("card-title")[0];
        
        if(match){
             let textvalue = match.textContent || match.innerHTML;
            if(textvalue.toUpperCase().indexOf(searchContent) > -1){
                    unfade(article[i]);  
            
            }else{
                    fade(article[i]);
        }
    }
    }
}

function fade(element) {
    var op = 1;  // initial opacity
    var timer = setInterval(function () {
        if (op <= 0.1){
            clearInterval(timer);
            element.style.display = 'none';
        }
        element.style.opacity = op;
        element.style.filter = 'alpha(opacity=' + op * 100 + ")";
        op -= op * 0.1;
    }, 7);
}

function unfade(element) {
    var op = 0.1;  // initial opacity
    element.style.display = 'flex';
    var timer = setInterval(function () {
        if (op >= 1){
            clearInterval(timer);
        }
        element.style.opacity = op;
        element.style.filter = 'alpha(opacity=' + op * 100 + ")";
        op += op * 0.1;
    }, 7);
}