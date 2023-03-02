function changeDisplay(source){
    document.getElementById("iframe-source").value = source;
}

function source_locator(){
    let source = document.getElementById("iframe-source").value;
    
    if(source == "menu.html"){
        document.getElementById("menu-selected").style.display = "flex";
        document.getElementById("menu-unselected").style.display = "none";
        document.getElementById("order-list-selected").style.display = "none";
        document.getElementById("order-list-unselected").style.display = "flex";
        document.getElementById("history-selected").style.display = "none";
        document.getElementById("history-unselected").style.display = "flex";
    }
    else if(source == "register.html"){
        document.getElementById("menu-selected").style.display = "none";
        document.getElementById("menu-unselected").style.display = "flex";
        document.getElementById("order-list-selected").style.display = "flex";
        document.getElementById("order-list-unselected").style.display = "none";
        document.getElementById("history-selected").style.display = "none";
        document.getElementById("history-unselected").style.display = "flex";
    }
    else if(source == "order-history.html"){
        document.getElementById("menu-selected").style.display = "none";
        document.getElementById("menu-unselected").style.display = "flex";
        document.getElementById("order-list-selected").style.display = "none";
        document.getElementById("order-list-unselected").style.display = "flex";
        document.getElementById("history-selected").style.display = "flex";
        document.getElementById("history-unselected").style.display = "none";
    }
}

function filterChanger(category){
    if(category == "category0"){
        document.getElementById("category0").classList = "category-item-active";
        document.getElementById("category1").classList = "category-item-inactive";
        document.getElementById("category2").classList = "category-item-inactive";
        document.getElementById("category3").classList = "category-item-inactive";
        document.getElementById("category5").classList = "category-item-inactive";
    }
    else if(category == "category1"){
       document.getElementById("category1").classList = "category-item-active";
        document.getElementById("category0").classList = "category-item-inactive";
        document.getElementById("category2").classList = "category-item-inactive";
        document.getElementById("category3").classList = "category-item-inactive";
        document.getElementById("category5").classList = "category-item-inactive";
    }
    else if(category == "category2"){
        document.getElementById("category2").classList = "category-item-active";
        document.getElementById("category1").classList = "category-item-inactive";
        document.getElementById("category0").classList = "category-item-inactive";
        document.getElementById("category3").classList = "category-item-inactive";
        document.getElementById("category5").classList = "category-item-inactive";
    }
    else if(category == "category3"){
        document.getElementById("category3").classList = "category-item-active";
        document.getElementById("category1").classList = "category-item-inactive";
        document.getElementById("category2").classList = "category-item-inactive";
        document.getElementById("category0").classList = "category-item-inactive";
        document.getElementById("category5").classList = "category-item-inactive";
    }
    else if(category == "category5"){
        document.getElementById("category5").classList = "category-item-active";
        document.getElementById("category1").classList = "category-item-inactive";
        document.getElementById("category2").classList = "category-item-inactive";
        document.getElementById("category3").classList = "category-item-inactive";
        document.getElementById("category0").classList = "category-item-inactive";
    }
}



