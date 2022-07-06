let activePage = location.href;
console.log(activePage);

$(".list-group-item").each(function() {
    let links = $(this).attr("href");

    console.log(links);

    if(activePage == links) {
        $(this).addClass("bg-pri");
        $(this).addClass("text-white");
    }
});




$(".show-navigation").click(function() {
    $(".navigation").animate({marginLeft: '0px'});
});

$(".hide-navigation").click(function() {
    $(".navigation").animate({marginLeft:"-100%"});
});

// let waypoint = new Waypoint({
//     element: document.querySelectorAll('.counter-up'),
//     handler: function() {
//         notify('Basic waypoint triggered')
//     }
// });

$('.counter-up').counterUp({
    delay: 10,
    time: 1000
});

function go(url) {
    setTimeout(function() {
        location.href = url;
    },10)
}


//scroll
let screenHeight = $(window).height();
let currentMenuHeight = $(".navigation .list-active").offset().top;

if(currentMenuHeight > screenHeight*0.8) {
    $(".navigation").animate({
        scrollTop: currentMenuHeight
    },1000)
}

//alert
function noti() {
    alert("This function will add later");
};

