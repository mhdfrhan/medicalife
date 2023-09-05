

$(document).ready(function () {
	var $zoomImage = $("#zoom");
	var $galleryImages = $(".gallery-image");

	function updateZoomImage(imageSrc) {
		$zoomImage.attr("src", imageSrc);
	}

	$galleryImages.mouseenter(function () {
		var newImageSrc = $(this).attr("src");
		updateZoomImage(newImageSrc);

		$galleryImages.removeClass("active");
		$(this).addClass("active");

		// Mengganti pengaturan zoom langsung berdasarkan lebar jendela saat ini
		if ($(window).width() > 1024) {
			$("#zoom").extm({
				position: 'right',
				rightPad: 20,
				zoomSize: 1200,
			});
		}
	});

	if ($(window).width() > 1024) {
		$("#zoom").extm({
			position: 'right',
			rightPad: 20,
			zoomSize: 1200,
			squareOverlay: true,
		});
	}

	
	$galleryImages.first().addClass("active");
	updateZoomImage($galleryImages.first().attr("src"));

	var swiper = new Swiper(".gallery", {
		slidesPerView: 1,
		spaceBetween: 10,
		breakpoints: {
			0: {
				slidesPerView: 3,
			},
			768: {
				slidesPerView: 3,
			},
			1024: {
				slidesPerView: 4,
			},
		},
	});

	$('#showMore').click(function () {
		$('#detailProduct').removeClass('line-clamp-3');
		$(this).hide();
		$('#showLess').removeClass('hidden').show();
	});

	$('#showLess').click(function () {
		$('#detailProduct').addClass('line-clamp-3');
		$(this).hide();
		$('#showMore').show();
	});
	
});