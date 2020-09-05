function loadmore() {
    "use strict";
    var o = jQuery(".woosale .products li").size(),
        e = jQuery(".woonew .products li").size(),
        s = jQuery(".woobest .products li").size(),
        x = jQuery(".woocat .category-grid .cat-outer-block").size(),
        l = jQuery(".woofeature .products li").size(),
        u = parseInt(php_var.tmpmela_loadmore),
        i = 10,
        t = 6,
        y = 8,
        r = 6,
        c = 10;
    jQuery(".woosale .products li:lt(" + i + ")").css("display", "inline-block"), jQuery(".woonew .products li:lt(" + t + ")").css("display", "inline-block"), jQuery(".woocat .category-grid .cat-outer-block:lt(" + y + ")").css("display", "inline-block"), jQuery(".woobest .products li:lt(" + r + ")").css("display", "inline-block"), jQuery(".woofeature .products li:lt(" + c + ")").css("display", "inline-block"), jQuery(".woosale .woocount").on("click", function() {
        i == o ? (jQuery(".woosale .woocount").hide(), jQuery(".woosale .tmpmela-message").show()) : (i = i + u <= o ? i + u : o, jQuery(".woosale .products li:lt(" + i + ")").css("display", "inline-block"))
    }), jQuery(".woonew .woocount").on("click", function() {
        t == e ? (jQuery(".woonew .woocount").hide(), jQuery(".woonew .tmpmela-message").show()) : (t = t + u <= e ? t + u : e, jQuery(".woonew .products li:lt(" + t + ")").css("display", "inline-block"))
    }), jQuery(".woocat .woocount").on("click", function() {
        y == x ? (jQuery(".woocat .woocount").hide(), jQuery(".woocat .tmpmela-message").show()) : (y = y + u <= x ? y + u : x, jQuery(".woocat .category-grid .cat-outer-block:lt(" + y + ")").css("display", "inline-block"))
    }), jQuery(".woobest .woocount").on("click", function() {
        r == s ? (jQuery(".woobest .woocount").hide(), jQuery(".woobest .tmpmela-message").show()) : (r = r + u <= s ? r + u : s, jQuery(".woobest .products li:lt(" + r + ")").css("display", "inline-block"))
    }), jQuery(".woofeature .woocount").on("click", function() {
        c == l ? (jQuery(".woofeature .woocount").hide(), jQuery(".woofeature .tmpmela-message").show()) : (c = c + u <= l ? c + u : l, jQuery(".woofeature .products li:lt(" + c + ")").css("display", "inline-block"))
    })
}
jQuery(document).ready(function() {
    "use strict";
    loadmore()
}), jQuery(window).resize(function() {
    "use strict";
    loadmore()
});