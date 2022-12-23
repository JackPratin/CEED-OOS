function changeDisplay(selected, unselected){
    selected = document.getElementById(selected);
    unselected = document.getElementById(unselected);

    let selected_style = window.getComputedStyle(selected);
    let unselected_style = window.getComputedStyle(unselected);

    if(selected_style.display == 'none'){
        selected.style.display= "flex";
        unselected.style.display= "none";
    }
    else{
        selected.style.display= "none";
        unselected.style.display= "flex";
    }

    // console.log(selected_style.display);
    // console.log(unselected_style.display);

    // document.getElementById("ageCheck").style.display=(document.getElementById("yes").checked) ? "block" : "none";
}