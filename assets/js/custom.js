jQuery(function ($) {
  $("#cc_form").on("submit", function (el) {
    el.preventDefault();

    console.log(el.target);

    $.post(
      ajaxurl, //this ajaxurl works only for admin panal for frontend we need to create our own ajaxurl;
      {
        action: "my_ajax_action",
        date: el.target.date.value,
        occasion: el.target.occasion.value,
        post_title: el.target.post_title.value,
        author: el.target.author.value,
        reviewer: el.target.reviewer.value,
      },

      function (val) {
        console.log(val);
        alert(val);
      }
    );
  });
});
