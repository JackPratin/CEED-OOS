function changeDisplay(source){
    document.getElementById("iframe-source").value = source;
}

function guest_source_locator(){
    let source = document.getElementById("iframe-source").value;
    
    if(source == "guest-menu.php"){
        document.getElementById("menu-selected").style.display = "flex";
        document.getElementById("menu-unselected").style.display = "none";
        document.getElementById("order-list-selected").style.display = "none";
        document.getElementById("order-list-unselected").style.display = "flex";
    }
    else if(source == "guest-order-list.php"){
        document.getElementById("menu-selected").style.display = "none";
        document.getElementById("menu-unselected").style.display = "flex";
        document.getElementById("order-list-selected").style.display = "flex";
        document.getElementById("order-list-unselected").style.display = "none";
    }
}

function source_locator(){
    let source = document.getElementById("iframe-source").value;
    
    if(source == "menu.php"){
        document.getElementById("menu-selected").style.display = "flex";
        document.getElementById("menu-unselected").style.display = "none";
        document.getElementById("order-list-selected").style.display = "none";
        document.getElementById("order-list-unselected").style.display = "flex";
        document.getElementById("history-selected").style.display = "none";
        document.getElementById("history-unselected").style.display = "flex";
    }
    else if(source == "order-list.php"){
        document.getElementById("menu-selected").style.display = "none";
        document.getElementById("menu-unselected").style.display = "flex";
        document.getElementById("order-list-selected").style.display = "flex";
        document.getElementById("order-list-unselected").style.display = "none";
        document.getElementById("history-selected").style.display = "none";
        document.getElementById("history-unselected").style.display = "flex";
    }
    else if(source == "order-history.php"){
        document.getElementById("menu-selected").style.display = "none";
        document.getElementById("menu-unselected").style.display = "flex";
        document.getElementById("order-list-selected").style.display = "none";
        document.getElementById("order-list-unselected").style.display = "flex";
        document.getElementById("history-selected").style.display = "flex";
        document.getElementById("history-unselected").style.display = "none";
    }
}

function admin_source_locator(){
    let source = document.getElementById("iframe-source").value;
    
    if(source == "admin-menu.php"){
        document.getElementById("menu-selected").style.display = "flex";
        document.getElementById("menu-unselected").style.display = "none";
        document.getElementById("order-list-selected").style.display = "none";
        document.getElementById("order-list-unselected").style.display = "flex";
        document.getElementById("history-selected").style.display = "none";
        document.getElementById("history-unselected").style.display = "flex";
        document.getElementById("admin-others-selected").style.display = "none";
        document.getElementById("admin-others-unselected").style.display = "flex";
    }
    else if(source == "admin-order-list.php"){
        document.getElementById("menu-selected").style.display = "none";
        document.getElementById("menu-unselected").style.display = "flex";
        document.getElementById("order-list-selected").style.display = "flex";
        document.getElementById("order-list-unselected").style.display = "none";
        document.getElementById("history-selected").style.display = "none";
        document.getElementById("history-unselected").style.display = "flex";
        document.getElementById("admin-others-selected").style.display = "none";
        document.getElementById("admin-others-unselected").style.display = "flex";
    }
    else if(source == "admin-order-history.php"){
        document.getElementById("menu-selected").style.display = "none";
        document.getElementById("menu-unselected").style.display = "flex";
        document.getElementById("order-list-selected").style.display = "none";
        document.getElementById("order-list-unselected").style.display = "flex";
        document.getElementById("history-selected").style.display = "flex";
        document.getElementById("history-unselected").style.display = "none";
        document.getElementById("admin-others-selected").style.display = "none";
        document.getElementById("admin-others-unselected").style.display = "flex";
    }
    else if(source == "admin-functions.php"){
        document.getElementById("menu-selected").style.display = "none";
        document.getElementById("menu-unselected").style.display = "flex";
        document.getElementById("order-list-selected").style.display = "none";
        document.getElementById("order-list-unselected").style.display = "flex";
        document.getElementById("history-selected").style.display = "none";
        document.getElementById("history-unselected").style.display = "flex";
        document.getElementById("admin-others-selected").style.display = "flex";
        document.getElementById("admin-others-unselected").style.display = "none";
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

function radio(type){
    let prefix = document.getElementById(type);
    let btn = document.getElementById(type+"btn");
    if(prefix.checked == true){
        btn.className = "clicked button";
    }
    else{
        btn.className = "upper button";
    }
}

function deliveryMode(type){
    let prefix = document.getElementById(type);
    let btn = document.getElementById(type+"btn");
    if(type == "pickup"){
        prefix.checked = true;
        btn.className = "clicked button";
        document.getElementById("deliverbtn").className = "upper button";
        document.getElementById("walkinbtn").className = "upper button";
    }
    else if(type == "deliver"){
        prefix.checked = true;
        btn.className = "clicked button";
        document.getElementById("pickupbtn").className = "upper button";
        document.getElementById("walkinbtn").className = "upper button";
    }
    else if(type == "walkin"){
        prefix.checked = true;
        btn.className = "clicked button";
        document.getElementById("pickupbtn").className = "upper button";
        document.getElementById("deliverbtn").className = "upper button";
    }
}



