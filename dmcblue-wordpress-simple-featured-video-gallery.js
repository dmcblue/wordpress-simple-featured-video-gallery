window.onload = function(){
	var showcaseGalleries = document.querySelectorAll('.dmcblue-video-gallery');
	
	showcaseGalleries.forEach(function(element, index, list){
		element.addEventListener('click', function(event){
			event.preventDefault();
			event.stopPropagation();
			
			var showcase = element.querySelector(".dmcblue-video-showcase");
			showcase.src = "https://www.youtube.com/embed/" + event.target.parentNode.dataset.id;
			
			return false;
		});
	});
};