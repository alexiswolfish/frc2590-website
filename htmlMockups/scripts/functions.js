
/*CSS Background
 *
 *takes url stored in html of div and makes it the background image
 */
function cssBackground(divName){
	var images = document.getElementsByName(divName);
	for( var i=0; i<images.length; i++){
		var url = "url('";
		url = url.concat(images[i].innerHTML);
		url = url.concat("')");
		images[i].style.backgroundImage = url;
		images[i].innerHTML="";
	}
}

/* Get Background size
 * get the size of like, a background image.
 *
 */
 
 function getBackgroundSize(selector, callback) {
 }
/*Is Overflowed
 *
 * takes a DOM element and returns a boolean if the element has an overflow value
 * element must have a fixed height for this to work.
 */
 
function isOverflowed(element){
    return element.scrollHeight > element.clientHeight || element.scrollWidth > element.clientWidth;
}

/*Scroll to top
 *
 * If you the user scrolls down past navigation, appear arrow that will scrollToTop
 */
 
/*Smooth Scrolling
 *
 * Scroll to internal link
 * http://www.itnewb.com/tutorial/Creating-the-Smooth-Scroll-Effect-with-JavaScript
 */
 function smoothScroll(eID) {
    var startY = curYPosition();
    var stopY = destYPosition(eID);
    var distance = stopY > startY ? stopY - startY : startY - stopY;
    if (distance < 100) {
        scrollTo(0, stopY); return;
    }
    var speed = Math.round(distance / 100);
    if (speed >= 20) speed = 20;
    var step = Math.round(distance / 25);
    var leapY = stopY > startY ? startY + step : startY - step;
    var timer = 0;
    if (stopY > startY) {
        for ( var i=startY; i<stopY; i+=step ) {
            setTimeout("window.scrollTo(0, "+leapY+")", timer * speed);
            leapY += step; if (leapY > stopY) leapY = stopY; timer++;
        } return;
    }
    for ( var j=startY; j>stopY; j-=step ) {
        setTimeout("window.scrollTo(0, "+leapY+")", timer * speed);
        leapY -= step; if (leapY < stopY) leapY = stopY; timer++;
    }
    return false;
}

/* Helper function to return current postition */
 function curYPosition() {
    // Firefox, Chrome, Opera, Safari
    if (self.pageYOffset) return self.pageYOffset;
    // Internet Explorer 6 - standards mode
    if (document.documentElement && document.documentElement.scrollTop)
        return document.documentElement.scrollTop;
    // Internet Explorer 6, 7 and 8
    if (document.body.scrollTop) return document.body.scrollTop;
    return 0;
}

/* return destination element postition*/
function destYPosition(eID) {
    var dest = document.getElementById(eID);
    var y = dest.offsetTop;
    var node = dest;
    while (node.offsetParent && node.offsetParent != document.body) {
        node = node.offsetParent;
        y += node.offsetTop;
    } return y;
}

function smooth_scroll_2(dst) {
    $('html,body').animate({ scrollTop: $("#"+dst).offset().top}, 'slow');
}

function smooth_scroll_3() {
    $('html,body').animate({ scrollTop: 500}, {duration:1000});
    $('html,body').animate({ scrollTop: 0}, {duration:1000});
}