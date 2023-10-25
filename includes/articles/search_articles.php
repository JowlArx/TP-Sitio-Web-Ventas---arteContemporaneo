<link href="css/articles/search_articles.css" type="text/css" rel="stylesheet">
   <div class="filter-container">
     <div class="search-container">
        <form>
            <i class='bx bx-search'></i>
            <input type="text" name="" id="search_bar" placeholder="Buscar" onkeyup="search()">
        </form>
    </div>
    <div class="filter">
        <p>Filtrar</p>
        <i class='bx bx-filter'></i>
    </div>
    
   </div>
   <div class="more-filters">
        <div class="price-input">
           <div class="field">
               <span>Min</span>
            <input type="number" class="input-price-min" id="input-price-min" value="0" onchange="filterprice()">
           </div>
            <div class="separator">-</div>
             <div class="field">
               <span>Max</span>
            <input type="number" class="input-price-max" id="input-price-max" value="10000" onchange="filterprice()">
           </div>
        </div>
    </div>
    