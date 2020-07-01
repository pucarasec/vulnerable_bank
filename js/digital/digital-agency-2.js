/*
Name: 			digital-agency-2
Written by: 	Okler Themes - (http://www.okler.net)
Theme Version:	8.0.0
*/

(function( $ ) {

	'use strict';
	
    $('#revolutionSlider').revolution({
        sliderType: 'standard',
        sliderLayout: 'auto',
		delay: 9000,
        responsiveLevels: [4096,1200,992,768],
        gridwidth: [1220,920,680,500],
		gridheight: 991,
        disableProgressBar: 'on',
        spinner: 'spinner3',
        parallax:{
            type:"on",
            levels:[20,40,60,80,100],
            origo:"enterpoint",
            speed:400,
            bgparallax:"on",
            disable_onmobile:"off"
        },
        navigation: { 
            arrows: {
                enable: false
            },
            bullets: { 
                enable: false
            }
        }
    })
	
}).apply( this, [ jQuery ]);