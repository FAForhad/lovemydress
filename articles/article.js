(function ($) {
  $.fn.article = function (options) {
    let colorArr = [
      "#8dd6c1",
      "#f590bf",
      "#f7dd74",
      "#FFE7CC",
      "#F8CBA6",
      "#b6abff",
      "#b3f6ff",
      "#ffb0d0",
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
