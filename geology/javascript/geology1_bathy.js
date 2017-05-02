$(document).ready(function () {
  
  $(function(){
  	$('#imgslider').beforeAfter({
    	animateIntro : true,
    	introDelay : 1000,
    	introDuration : 1500,
    	introPosition : .5,
    	showFullLinks : true,
  /*
    	beforeLinkText: 'Show only left image',
    	afterLinkText: 'Show only right image',
  */
    	imagePath : '/js/beforeafter/',
    	cursor: 'pointer',
    	clickSpeed: 600,
    	linkDisplaySpeed: 400,
    	dividerColor: '#949494',
    	onReady: function(){}  
  	});
  });
  
});
