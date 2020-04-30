$(document).ready(function () {
    $(".up").each(function () {
        $(this).on("click", function () {
            $.ajax({
                url: $(this).data("url")
            });
            $(this).off("click");
            $(this).addClass('text-success');
            $(this).siblings(".upNB").first().text(($(this).siblings(".upNB").first().text()) - 1 + 2)
        })
    })
    $(".down").each(function () {
        $(this).on("click", function () {
            $.ajax({
                url: $(this).data("url")
            });
            $(this).off("click");
            $(this).addClass('text-danger');
            $(this).siblings(".downNB").first().text(($(this).siblings(".downNB").first().text()) - 1 + 2)
        })
    })
    $(".sub").each(function () {
        $(this).on("click", function () {
            $.ajax({
                url: $(this).data("url")
            });
            $(this).off("click");
            $(this).addClass('text-info');
        })
    })
    $(".unup").each(function () {
        $(this).on("click", function () {
            $.ajax({
                url: $(this).data("url")
            });
            $(this).removeClass('text-success');
            $(this).off("click");
            $(this).siblings(".upNB").first().text(($(this).siblings(".upNB").first().text()) - 1)
        })
    })
    $(".undown").each(function () {
        $(this).on("click", function () {
            $.ajax({
                url: $(this).data("url")
            });
            $(this).removeClass('text-danger');
            $(this).off("click");
            $(this).siblings(".downNB").first().text(($(this).siblings(".downNB").first().text()) - 1)
        })
    })
    $(".unsub").each(function () {
        $(this).on("click", function () {
            $.ajax({url: $(this).data("url")});
            $(this).off("click");
            $(this).removeClass('text-info');
        })
    })
})