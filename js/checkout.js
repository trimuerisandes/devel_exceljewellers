$(document).ready(function () {
    $(".select-option").mouseup(function () {
        $(this).find("input").prop("checked", !0), $(this).addClass("selected-option"), $(".select-option").not($(this)).removeClass("selected-option");
    }),
        $(".select-address").click(function () {
            $(this).find("input").prop("checked", !0),
                $(this).addClass("selected-address"),
                $(".select-address").not($(this)).removeClass("selected-address"),
                $(this).attr("id"),
                $(this).find(".select-contact_name").text(),
                $(this).find(".select-phone_number").text(),
                $(this).find(".select-addresses").text(),
                $(this).find(".select-unit").text(),
                $(this).find(".select-country").text(),
                $(this).find(".select-spr").text(),
                $(this).find(".select-city").text(),
                $(this).find(".select-zipcode").text();
        }),
        $(".summary-tab div").click(function () {
            $(this).toggleClass("slidedown"), $(".order_summary").slideToggle();
        }),
        $(document).keyup(function () {
            $(".address-container")
                .find("input")
                .not("input[name=unit]")
                .each(function () {
                    0 !=
                    $(this)
                        .val()
                        .replace(/^\s+|\s+$/g, "").length
                        ? $(this).removeClass("red-border")
                        : $(this).addClass("red-border");
                });
        }),
        $(".select-option-ctn").click(function () {
            "delivery" == $("input[name=radio-group-option]:checked").val()
                ? ($(".deliver-address-ctn").slideDown(), $(".select-pickup-ctn").slideUp())
                : "pickup" == $("input[name=radio-group-option]:checked").val()
                ? ($(".select-pickup-ctn").slideDown(), $(".deliver-address-ctn").slideUp())
                : ($(".deliver-address-ctn").slideUp(), $(".select-pickup-ctn").slideUp());
        }),
        $(window).load(function () {
            $("input[name=radio-group-option]:checked").attr("checked", !1);
        }),
        $("select[name=country]").change(function () {
            ($val = $(this).children("option:selected").attr("id")),
                ($select = $(this).parent().next().children()),
                $.getJSON("../storage/json/country.json", function (e) {
                    var t;
                    for ($spr = e[$val].states, $select.empty().append('<select name="spr" class="spr-select"></select>'), t = 0; t < $spr.length; ++t) $(".spr-select").append('<option value="' + $spr[t] + '">' + $spr[t] + "</option>");
                });
        });
});
