// JavaScript Document

var slideActual = 1;

var slide1 = $('#banner-section1');
var slide2 = $('#games-section1');
var slide3 = $('#banner-section2');
var slide4 = $('#games-section2');
var slide5 = $('#banner-section3');
var slide6 = $('#games-section3');


$(document).ready(function() {

   // $('.games-sidebar').hide();
	//$('.banner').hide();
	//$('#banner-section1').show();

	$('#slideshow').cycle({ 
    fx:     'blindX, blindY, blindZ, cover, curtainX, curtainY, fade, fadeZoom, growX, growY, scrollUp, scrollDown, scrollLeft, scrollRight, scrollHorz, scrollVert, shuffle, slideX, slideY, toss, turnUp, turnDown, turnLeft, turnRight, uncover, wipe, zoom', 
	async: 'true',
    speed:  'slow', 
    timeout: 5000, 
	pause: 1,
    next:   '#next', 
    prev:   '#prev' 
	});


});