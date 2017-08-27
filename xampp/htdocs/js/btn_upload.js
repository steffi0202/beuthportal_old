$(document).on("click", ".browse", function() {
  var file = $(this).parent().parent().parent().find(".click");
  file.trigger("click");
});
$(document).on("change", ".click", function() {
  $(this)
    .parent()
    .find(".form-control")
    .val($(this).val().replace(/C:\\fakepath\\/i, ""));
});