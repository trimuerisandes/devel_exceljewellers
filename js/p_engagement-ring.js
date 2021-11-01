$(document).ready(function () {
    $(".main-carousel").flickity({ cellAlign: "left", contain: !0, pageDots: !1, imagesLoaded: !0, asNavFor: ".carousel-main" }),
        $(".other-img").on("error", function () {
            $(this).parent().remove();
        }),
        $(".size-btn").click(function (e) {
            $(this).css({ border: "solid 1px #7df048" }).addClass("selected_size"), $(".size-btn").not(this).css({ border: "solid 1px #e6e6e6" }).removeClass("selected_size");
        }),
        $(".favourite").click(function () {
            $.ajax({
                url: "../favourite",
                headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },
                method: "POST",
                data: { sku: $("span.item_sku").text(), link: $(location).attr("href"), img: $(".main-image-session").attr("src") },
                success: function (e) {
                    popup("green", "Added To Wish List");
                },
                error: function (e, t, n) {
                    popup("error");
                },
            });
        }),
        $(".select-setting-pop").click(function () {
            null != $("select").val() ? $(".setting-popup").css({ display: "block" }) : popup("green", "Please Select Ring Size");
        }),
        $(".setting-background").click(function () {
            $(".setting-popup").css({ display: "none" });
        }),
        $(".select-setting,.buy-setting").click(function () {
            $(".setting-popup").css({ display: "none" });
        }),
        $(".select-setting").click(function () {
            null != $("select").val()
                ? $.ajax({
                      url: "../add-setting",
                      headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },
                      method: "POST",
                      data: {
                          sku: $("span.item_sku").text(),
                          size: $("select[name=ring-size]").val(),
                          url: window.location.href,
                          img: $(".main-image-session").attr("src"),
                          engraving: $("input[name=engraving]").val() || null,
                          type: "setting",
                      },
                      success: function (e) {
                          // popup("green", "Setting Selected"), (window.location.href = "diamond" == e ? window.location.origin + "/diamonds" : window.location.origin + "/complete-ring");
                          console.log(e);
                      },
                      error: function (e, t, n) {
                          popup("error");
                          console.log(e);
                      },
                  })
                : popup("green", "Please Select Ring Size");
        }),
        $(".buy-setting").click(function () {
            null != $("select").val()
                ? $.ajax({
                      url: "../add-cart",
                      headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },
                      method: "POST",
                      data: {
                          sku: $("span.item_sku").text(),
                          engraving: $("input[name=engraving]").val() || null,
                          img: $(".main-image-session").attr("src") || null,
                          size: $("select").val() || null,
                          url: window.location.href,
                          type: "engagement",
                      },
                      success: function (e) {
                          var t, n;
                          popup("green", "Added To Cart"),
                              (t = $(".main-image-session").attr("src")),
                              (n = $(".buy-eng-name").text() + "(Free CZ Included)"),
                              $(".add-cart-notification").fadeIn().delay(3e3).fadeOut("fast"),
                              $(".img-notification").attr("src", t),
                              $(".add-cart-name").text(n),
                              console.log(e),
                              $.ajax({
                                  url: "../shop-cart-num",
                                  headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },
                                  method: "POST",
                                  success: function (e) {
                                      $(".cart-text").empty().append(e);
                                  },
                                  error: function (e, t, n) {},
                              });
                      },
                      error: function (e, t, n) {
                          popup("error"), console.log(e);
                      },
                  })
                : popup("green", "Please Select Ring Size");
        }),
        $(document).on("click", ".notification-close", function () {
            $(".add-cart-notification").remove();
        });
});
