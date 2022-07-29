$(function () {
    $(".ticker1, .ticker2").easyTicker({
        direction: "up",
        easing: "swing",
        speed: "slow",
        interval: 2000,
        height: "auto",
        visible: 1,
        mousePause: 1,
        controls: {
            up: "",
            down: "",
            toggle: "",
            playText: "Play",
            stopText: "Stop",
        },
    });
});
