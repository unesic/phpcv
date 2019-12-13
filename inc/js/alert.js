$("#alert").addClass("active").delay(1000).animate({
    opacity: 1,
    transform: translate(-50%, 0)
});

$("#alert.active").fadeIn("slow", function() {
    // $(this).delay(2000).fadeOut("slow");
});