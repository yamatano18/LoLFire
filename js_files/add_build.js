    var selected_items = 0;
    console.log("dziala");
    $(".item_icon_small").click(function() {
        if ($(this).hasClass("item_icon_small"))
        {
            $(this).toggleClass("item_icon_small_active");
            selected_items++;
            console.log("zwiekszono selected_items");
        }
    });