const filterprice = () =>{
    const minPrice = parseFloat(document.getElementById("input-price-min").value);
    const maxPrice = parseFloat(document.getElementById("input-price-max").value);
    const storedArticles = document.getElementById("articles-container");
    const article = document.querySelectorAll(".card");
    const article_price = storedArticles.querySelectorAll(".card-price");

    for(var i=0; i< article_price.length; i++){
        let match = article[i].getElementsByClassName("card-price")[0];
        console.log(match.innerHTML);
        if(match){
            let priceText = match.textContent || match.innerHTML;
            let pricevalue = parseFloat(priceText.replace("$", ""));
            console.log(pricevalue);
            if (!isNaN(pricevalue) && pricevalue >= minPrice && pricevalue <= maxPrice) {
                article[i].style.display = "";
            } else {
                article[i].style.display = "none";
            }
        }
        
    }
     
}
  
  