(function ($) {
  $.fn.article = function (options) {
    let colorArr = [
      "#8dd6c1",
      "#ECF9FF",
      "#FFFBEB",
      "#FFE7CC",
      "#F8CBA6",
      "#E3DFFD",
      "#C3F8FF",
      "FFBED8",
    ];
    let randomColor = colorArr[Math.floor(Math.random() * colorArr.length)];

    let settings = $.extend(
      {
        background: randomColor,
        smoothness: "1000ms",
      },
      options
    );
    return this.css({
      background: settings.background,
      color: settings.textColor,
      transition: settings.smoothness,
    });
  };
})(jQuery);
