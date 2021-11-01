$(document).ready(function() {
    function e() {
        $.ajax({
            url: "refresh",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            method: "POST",
            success: function(e) {
                $(".cart-container").empty().append(e), $.ajax({
                    url: "shop-cart-num",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                    },
                    method: "POST",
                    success: function(e) {
                        $(".cart-text").empty().append(e)
                    },
                    error: function(e, t, r) {
                        popup("red", "Error With Number")
                    }
                })
            },
            error: function(e, t, r) {
                console.log(e), popup("error")
            }
        })
    }
    e(), $(document).on("click", ".remove-btn", function() {
        $.ajax({
            url: "remove-item",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            method: "POST",
            data: {
                id: $(this).attr("id")
            },
            success: function(t) {
                popup("red", "Removed From Cart"), e()
            },
            error: function(e, t, r) {
                popup("error")
            }
        })
    })
});