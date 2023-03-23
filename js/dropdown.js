var a, al, i, lfs, lfsl, b, c, p, g;
// looking for custom select div in html code
a = document.getElementsByClassName("custom-select");
al = a.length;

for (i = 0; i < al; i++) {

    // looking for select tag and counting it
    lfs = a[i].getElementsByTagName("select")[0];
    lfsl = lfs.length;

    // for the select tag that counted created a div
    b = document.createElement("div");
    b.setAttribute("class", "selected-item");
    a[i].appendChild(b);

    // created a span in the selected-item div
    p = document.createElement("span");
    p.setAttribute("class", "text");

    // set the what you have written in the options to the new span that we have created
    p.innerHTML = lfs.options[lfs.selectedIndex].innerHTML;

    // created a span in selected-item div for arrow down
    g = document.createElement("span");
    g.setAttribute("class", "arrow-down");



    // created a div that works as option list to hold options and placed it under selected-item div
    d = document.createElement("div");
    d.setAttribute("class", "option-list");
    a[i].appendChild(d);

    // created div for each option 
    for (j = 0; j < lfsl; j++) {
        c = document.createElement("div");
        c.setAttribute("class", "option");
        c.innerHTML = lfs.options[j].innerHTML;
        d.appendChild(c);
        b.appendChild(g);
        b.prepend(p);

        // this changes the clected item on click to options
        c.addEventListener("click", function() {
            var s, sl, h, i;
            s = this.parentNode.parentNode.getElementsByTagName("select")[0];
            sl = s.length;
            h = this.parentNode.previousSibling.firstChild;

            // as you click on the options selected-item will update
            h.innerHTML = this.innerHTML;

            // this loop is for the refresh of tha page to keep the option as selected
            for (i = 0; i < sl; i++) {
                if (s.options[i].innerHTML == this.innerHTML) {

                    s.selectedIndex = i;

                    h.innerHTML = this.innerHTML;
                    break;
                }
            }

            // if any option selected this will close the option list (jquery)
            $('.option-list').slideUp();

        });
    }
}

// by clicking on the selected item the option list will toggle (jquery)
$('.selected-item').on("click", function(e) {
    $(this).next().slideToggle();
    $(this).parent().siblings().find('.option-list').slideUp();
    e.stopPropagation();
    $(this).children(".arrow-down").toggleClass("arrow-up");
    $(this).parent().siblings().find('.arrow-down').removeClass("arrow-up");
});

// click anywhere else to close all selec boxes
$('html , body').click(function(e) {
    $(".option-list").slideUp();
    $(".arrow-down").removeClass("arrow-up");
});