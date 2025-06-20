(function () {
	"use strict";

	// Easy selector helper function
	const select = (el, all = false) => {
		el = el.trim();
		if (all) {
			return [...document.querySelectorAll(el)];
		} else {
			return document.querySelector(el);
		}
	};

	// Easy event listener function
	const on = (type, el, listener, all = false) => {
		if (all) {
			select(el, all).forEach((e) => e.addEventListener(type, listener));
		} else {
			select(el, all).addEventListener(type, listener);
		}
	};

	// Easy on scroll event listener
	const onscroll = (el, listener) => {
		el.addEventListener("scroll", listener);
	};

	// Back to top button
	let back2Top = select(".back-to-top");
	if (back2Top) {
		const toggleBack2Top = () => {
			if (window.scrollY > 100) {
				back2Top.classList.add("active");
			} else {
				back2Top.classList.remove("active");
			}
		};
		window.addEventListener("load", toggleBack2Top);
		onscroll(document, toggleBack2Top);
	}

	// Mobile nav toggle
	on("click", ".mobile-nav-toggle", function (e) {
		select("#navbar").classList.toggle("navbar-mobile");
		this.classList.toggle("bi-list");
		this.classList.toggle("bi-x");
	});

	//Mobile nav dropdowns activate
	on(
		"click",
		".navbar .dropdown > a",
		function (e) {
			if (select("#navbar").classList.contains("navbar-mobile")) {
				e.preventDefault();
				this.nextElementSibling.classList.toggle("dropdown-active");
			}
		},
		true
	);

	// Scroll with offset on links with a class name .scrollTo
	on(
		"click",
		".scrollTo",
		function (e) {
			if (select(this.hash)) {
				e.preventDefault();

				let navbar = select("#navbar");
				if (navbar.classList.contains("navbar-mobile")) {
					navbar.classList.remove("navbar-mobile");
					let navbarToggle = select(".mobile-nav-toggle");
					navbarToggle.classList.toggle("bi-list");
					navbarToggle.classList.toggle("bi-x");
				}
				scrollTo(this.hash);
			}
		},
		true
	);

	// home Slider
	new Swiper(".slider-section", {
		speed: 1000,
		loop: true,
		autoplay: {
			delay: 5000,
			disableOnInteraction: false,
		},
		slidesPerView: "auto",
		effect: "fade",
		pagination: {
			el: ".swiper-pagination",
			type: "bullets",
			clickable: true,
		},
		breakpoints: {
			320: {
				slidesPerView: 1,
				spaceBetween: 0,
			},
		},
	});

	// Clients Slider
	new Swiper(".clients-slider", {
		speed: 1000,
		loop: true,
		autoplay: {
			delay: 5000,
			disableOnInteraction: true,
		},
		slidesPerView: "auto",
		pagination: {
			el: ".swiper-pagination",
			type: "bullets",
			clickable: true,
		},
		breakpoints: {
			320: {
				slidesPerView: 2,
				spaceBetween: 35,
			},
			480: {
				slidesPerView: 3,
				spaceBetween: 60,
			},
			640: {
				slidesPerView: 3,
				spaceBetween: 40,
			},
			992: {
				slidesPerView: 5,
				spaceBetween: 45,
			},
		},
	});

	// Testimonials slider
	new Swiper(".testimonials-slider", {
		speed: 600,
		loop: true,
		autoplay: {
			delay: 5000,
			disableOnInteraction: false,
		},
		slidesPerView: "auto",
		pagination: {
			el: ".swiper-pagination",
			type: "bullets",
			clickable: true,
		},
		breakpoints: {
			320: {
				slidesPerView: 1,
				spaceBetween: 40,
			},

			992: {
				slidesPerView: 2,
				spaceBetween: 80,
			},
		},
	});

	// Animation on scroll
	function aos_init() {
		AOS.init({
			duration: 1000,
			easing: "ease-in-out",
			once: true,
			mirror: false,
		});
	}

	// Initiate aos animation
	aos_init();

	// Initiate Pure Counter
	new PureCounter();
})();
