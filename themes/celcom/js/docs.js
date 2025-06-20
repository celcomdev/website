"use strict";

const sidebarToggler = document.getElementById("docs-sidebar-toggler");
const sidebar = document.getElementById("docs-sidebar");
const sidebarLinks = document.querySelectorAll("#docs-sidebar .scrollto");

responsiveSidebar();

window.onresize = function () {
	responsiveSidebar();
};

function responsiveSidebar() {
	let w = window.innerWidth;
	if (w >= 1200) {
		// if larger
		console.log("larger");
		sidebar.classList.remove("sidebar-hidden");
		sidebar.classList.add("sidebar-visible");
	} else {
		sidebar.classList.remove("sidebar-visible");
		sidebar.classList.add("sidebar-hidden");
	}
}

sidebarToggler.addEventListener("click", () => {
	if (sidebar.classList.contains("sidebar-visible")) {
		sidebar.classList.remove("sidebar-visible");
		sidebar.classList.add("sidebar-hidden");
	} else {
		sidebar.classList.remove("sidebar-hidden");
		sidebar.classList.add("sidebar-visible");
	}
});

// Smooth scrolling
sidebarLinks.forEach((sidebarLink) => {
	sidebarLink.addEventListener("click", (e) => {
		e.preventDefault();
		var target = sidebarLink.getAttribute("href").replace("#", "");
		document.getElementById(target).scrollIntoView({ behavior: "smooth" });
		//Collapse sidebar after clicking
		if (
			sidebar.classList.contains("sidebar-visible") &&
			window.innerWidth < 1200
		) {
			sidebar.classList.remove("sidebar-visible");
			sidebar.classList.add("sidebar-hidden");
		}
	});
});

// Initialize Gumshoe
var spy = new Gumshoe("#docs-nav a", {
	offset: 110, //sticky header height
});
