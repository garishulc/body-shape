function mobileNav() {
	// Mobile nav button
	const navBtn = document.querySelector('.mobile-nav-btn');
	const nav = document.querySelector('.mobile-nav');
	const menuIcon = document.querySelector('.nav-icon');

	navBtn.onclick = function () {
		/*при нажатии на элемент '.mobile-nav-btn' добавит  'mobile-nav--open'*/
		nav.classList.toggle('mobile-nav--open');
		/* при нажатии на элемент '.nav-icon' добавит'nav-icon--active'*/
		menuIcon.classList.toggle('nav-icon--active');
		/* при нажатии на один из выше перечисленных элементов добавит к тегу .body значение настроки 'no-scroll'*/
		document.body.classList.toggle('no-scroll');
	};
}

export default mobileNav;