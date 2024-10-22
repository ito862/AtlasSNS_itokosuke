$(function () {

  jQuery(".menu_btn").click(function () {
    $(this).toggleClass('is_open');
    $(this).siblings('.accordion_menu').toggleClass('is_open');
  });
});
