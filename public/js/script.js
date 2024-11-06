
//アコーディオンメニューの開閉
$(function () {

  jQuery(".menu_btn").click(function () {
    $(this).toggleClass('is_open');
    $(this).siblings('.accordion_menu').toggleClass('is_open');
  });
});

//ログアウトのクリックイベント
document.getElementById('logout-link').addEventListener('click', function (event) {
  event.

    // デフォルトのリンク動作を防ぐ
    preventDefault();

  // フォームを送信する
  document.getElementById('logout-form').submit();
});
