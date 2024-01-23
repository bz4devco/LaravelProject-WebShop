$(document).ready(function () {
    $("#search").on("keyup", function () {
        searchProcess($(this));
    });

    $("#search-mobile").on("keyup", function () {
        searchProcess($(this));
    });
});

function searchProcess(e) {
    let value = $(e).val(),
        url = $(e).attr("data-url"),
        baseUrl = $(e).attr("data-base-url");
    if (value != "") {
        $.ajax({
            type: "GET",
            url: url,
            data: { search: value },
            success: function (data) {
                //////////////////////////////////////////////////////////////////////////////
                // products result
                $(".search-result")
                    .empty()
                    .append(
                        `<section class="search-result-title">نتایج جستجو برای  <span class="search-words">"` +
                            value +
                            `"</span><span class="search-result-type">در کالاها</span></section>`
                    );
                if (data.products.length > 0) {
                    // Create an array of element objects
                    const elements = data.products.map((product) => {
                        return {
                            section: $("<section>")
                                .addClass("search-result-item")
                                .html(
                                    '<i class="fa fa-link"></i>' + product.name
                                ),
                            a: $("<a>")
                                .attr(
                                    "href",
                                    baseUrl + "/product/" + product.slug
                                )
                                .addClass("text-decoration-none")
                                .addClass("text-dark"),
                        };
                    });

                    // Use jQuery's map() method to create an array of jQuery objects
                    const elementsRes = $(elements).map((i, obj) => {
                        $(".search-result").append(obj.a.append(obj.section));
                    });
                } else {
                    $(".search-result").append(
                        `<section class="search-result-item"><span class="search-no-result">موردی یافت نشد</span></section>`
                    );
                }

                //////////////////////////////////////////////////////////////////////////////
                // brands result

                $(".search-result").append(
                    `<section class="search-result-title">نتایج جستجو برای  <span class="search-words">"` +
                        value +
                        `"</span><span class="search-result-type">در برندها</span></section>`
                );
                if (data.brands.length > 0) {
                    // Create an array of element objects
                    const elements = data.brands.map((brand) => {
                        return {
                            section: $("<section>")
                                .addClass("search-result-item")
                                .html(
                                    '<i class="fa fa-link"></i>' +
                                        brand.persian_name
                                ),
                            a: $("<a>")
                                .attr(
                                    "href",
                                    baseUrl +
                                        "/products?brands%5B%5D=" +
                                        brand.id
                                )
                                .addClass("text-decoration-none")
                                .addClass("text-dark"),
                        };
                    });

                    // Use jQuery's map() method to create an array of jQuery objects
                    const elementsRes = $(elements).map((i, obj) => {
                        $(".search-result").append(obj.a.append(obj.section));
                    });
                } else {
                    $(".search-result").append(
                        `<section class="search-result-item"><span class="search-no-result">موردی یافت نشد</span></section>`
                    );
                }

                //////////////////////////////////////////////////////////////////////////////
                // category result

                $(".search-result").append(
                    `<section class="search-result-title">نتایج جستجو برای  <span class="search-words">"` +
                        value +
                        `"</span><span class="search-result-type">در دسته بندی</span></section>`
                );
                if (data.categorys.length > 0) {
                    // Create an array of element objects
                    const elements = data.categorys.map((category) => {
                        return {
                            section: $("<section>")
                                .addClass("search-result-item")
                                .html(
                                    '<i class="fa fa-link"></i>' + category.name
                                ),
                            a: $("<a>")
                                .attr("href",  baseUrl + "products/" + category.id)
                                .addClass("text-decoration-none")
                                .addClass("text-dark"),
                        };
                    });

                    // Use jQuery's map() method to create an array of jQuery objects
                    const elementsRes = $(elements).map((i, obj) => {
                        $(".search-result").append(obj.a.append(obj.section));
                    });
                } else {
                    $(".search-result").append(
                        `<section class="search-result-item"><span class="search-no-result">موردی یافت نشد</span></section>`
                    );
                }
            },
        });
    } else {
        $(".search-result")
            .empty()
            .append(
                `<section class="search-result-item"><span class="search-no-result">موردی یافت نشد</span></section>`
            );
    }
}
