// Form variables
const insertForm = document.querySelector(".main__page__insert-page__form");
const searchForm = document.querySelector(".main__page__search-page__form");
const modificationForm = document.querySelector(".main__page__modify-page__modification-form");
const dashboardMainSection = document.querySelector(".main__page");
const inputFields = document.querySelectorAll("input");
const modifyPageSearchField = document.querySelector(".main__page__modify-page__search-form__search-input");
const modifyIncPageCheckbox = document.querySelector(".main__page__modify-inc-page__form__admin__checkbox")
const mainHeaderNav = document.querySelector(".main__nav__header")
// Nav control button variables
const controlButtonsNav = document.querySelector(".nav__control-buttons");
const insertButtonNav = document.querySelector(".nav__control-buttons__button-insert");
const searchButtonNav = document.querySelector(".nav__control-buttons__button-search");
const viewButtonNav = document.querySelector(".nav__control-buttons__button-view");
const modifyButtonNav = document.querySelector(".nav__control-buttons__button-modify");
const removeButtonNav = document.querySelector(".nav__control-buttons__button-remove");
const recoverButtonNav = document.querySelector(".nav__control-buttons__button-recover");
// Profile Menu
const avatarNav = document.querySelector(".nav__avatar");
const avatarMain = document.querySelector(".main__nav__avatar");
const profileMenu = document.querySelector(".profile-menu");
const insertProfileMenu = document.querySelector(".profile-menu__insert");
const searchProfileMenu = document.querySelector(".profile-menu__search");
const viewProfileMenu = document.querySelector(".profile-menu__view");
const modifyProfileMenu = document.querySelector(".profile-menu__modify");
const removeProfileMenu = document.querySelector(".profile-menu__remove");
const recoverProfileMenu = document.querySelector(".profile-menu__recover");
// Control button variables
const controlMenu = document.querySelector(".control-menu");
const menuButton = document.querySelector(".control-menu__menu-button");
const menuButtonLogo = [...document.querySelectorAll(".fa-ellipsis")];
const controlButton = document.querySelector(".control-menu__control-buttons");
const insertButton = document.querySelector(".control-menu__control-buttons__button-insert");
const searchButton = document.querySelector(".control-menu__control-buttons__button-search");
const viewButton = document.querySelector(".control-menu__control-buttons__button-view");
const modifyButton = document.querySelector(".control-menu__control-buttons__button-modify");
const removeButton = document.querySelector(".control-menu__control-buttons__button-remove");
const recoverButton = document.querySelector(".control-menu__control-buttons__button-recover");
// Page variables
const mainPage = document.querySelector(".main__page");
const insertPage = document.querySelector(".main__page__insert-page");
const searchPage = document.querySelector(".main__page__search-page");
const viewPage = document.querySelector(".main__page__view-page");
const modifyPage = document.querySelector(".main__page__modify-page");
const removePage = document.querySelector(".main__page__remove-page");
const recoverPage = document.querySelector(".main__page__recover-page");


// Functions
const disabler = () => {
	// make control menu lose sticky position
	controlMenu.classList.remove("control-menu--sticky");

	// remove field values when switching pages
	inputFields.forEach((field) => {
		field.value = "";
	});

	mainPage.childNodes.forEach((page) => {
		if (page.nodeName == 'DIV') {
			page.classList.remove("main__page__page--active");
		}
	});

	controlButtonsNav.childNodes.forEach((button) => {
		if (button.nodeName == 'A') {
			button.classList.remove("nav__control-buttons__button--active");
		}
	})
};


// For searching
// const showHint = (str) => {
// 	const xmlhttp = new XMLHttpRequest();
// 	xmlhttp.addEventListener("readystatechange", () => {
// 		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
// 			// modificationForm = xmlhttp.responseText;
// 			console.log(xmlhttp.responseText);
// 		}
// 	});
// 	xmlhttp.open("GET", "include/modify.inc.php?q=" + str, true);
// 	xmlhttp.send();
// }
// modifyPageSearchField.addEventListener("keypress", showHint(modifyPageSearchField.value));


// undisplay buttons if a click event happens outside
document.addEventListener("click", (e) => {
	if (e.target.id !== 'menu-button') {
		controlButton.classList.remove('control-menu__control-buttons--active');
		menuButton.classList.remove("control-menu__menu-button--active");
	}
});

// Control buttons event listeners
menuButton.addEventListener("click", () => {
	controlButton.classList.toggle("control-menu__control-buttons--active");
	menuButton.classList.toggle("control-menu__menu-button--active");
});
menuButtonLogo.forEach((ellipsis) => {
	ellipsis.addEventListener("click", () => {
		controlButton.classList.toggle("control-menu__control-buttons--active");
		menuButton.classList.toggle("control-menu__menu-button--active");
	});
});
insertButton.addEventListener("click", () => {
	disabler();
	insertPage.classList.add("main__page__page--active");
});
searchButton.addEventListener("click", () => {
	disabler();
	searchPage.classList.add("main__page__page--active");
});
viewButton.addEventListener("click", () => {
	disabler();
	viewPage.classList.add("main__page__page--active");
	controlMenu.classList.add("control-menu--sticky");
});
modifyButton.addEventListener("click", () => {
	disabler();
	modifyPage.classList.add("main__page__page--active");
});
removeButton.addEventListener("click", () => {
	disabler();
	removePage.classList.add("main__page__page--active");
});
recoverButton.addEventListener("click", () => {
	disabler();
	recoverPage.classList.add("main__page__page--active");
});


// Nav control buttons event listeners
insertButtonNav.addEventListener("click", () => {
	disabler();
	insertButtonNav.classList.add("nav__control-buttons__button--active");
	insertPage.classList.add("main__page__page--active");
	mainHeaderNav.innerText = "Insert Record";
});
searchButtonNav.addEventListener("click", () => {
	disabler();
	searchButtonNav.classList.add("nav__control-buttons__button--active");
	searchPage.classList.add("main__page__page--active");
	mainHeaderNav.innerText = "Search Record";
});
viewButtonNav.addEventListener("click", () => {
	disabler();
	viewButtonNav.classList.add("nav__control-buttons__button--active");
	viewPage.classList.add("main__page__page--active");
	controlMenu.classList.add("control-menu--sticky");
	mainHeaderNav.innerText = "View Records";
});
modifyButtonNav.addEventListener("click", () => {
	disabler();
	modifyButtonNav.classList.add("nav__control-buttons__button--active");
	modifyPage.classList.add("main__page__page--active");
	mainHeaderNav.innerText = "Modify Record";
});
removeButtonNav.addEventListener("click", () => {
	disabler();
	removeButtonNav.classList.add("nav__control-buttons__button--active");
	removePage.classList.add("main__page__page--active");
	mainHeaderNav.innerText = "Remove Record";
});
recoverButtonNav.addEventListener("click", () => {
	disabler();
	recoverButtonNav.classList.add("nav__control-buttons__button--active");
	recoverPage.classList.add("main__page__page--active");
	mainHeaderNav.innerText = "Recover Record";
});


// Logout links/buttons
avatarNav.addEventListener("click", () => {
	profileMenu.classList.add("profile-menu--active");
})
avatarMain.addEventListener("click", () => {
	profileMenu.classList.add("profile-menu--active");
})
profileMenu.addEventListener("click", () => {
	profileMenu.classList.remove("profile-menu--active");
})
insertProfileMenu.addEventListener("click", () => {
	disabler();
	profileMenu.classList.remove("profile-menu--active");
	insertPage.classList.add("main__page__page--active");
	mainHeaderNav.innerText = "Insert Record";
});
searchProfileMenu.addEventListener("click", () => {
	disabler();
	profileMenu.classList.remove("profile-menu--active");
	searchPage.classList.add("main__page__page--active");
	mainHeaderNav.innerText = "Search Record";
});
viewProfileMenu.addEventListener("click", () => {
	disabler();
	profileMenu.classList.remove("profile-menu--active");
	viewPage.classList.add("main__page__page--active");
	controlMenu.classList.add("control-menu--sticky");
	mainHeaderNav.innerText = "View Records";
});
modifyProfileMenu.addEventListener("click", () => {
	disabler();
	profileMenu.classList.remove("profile-menu--active");
	modifyPage.classList.add("main__page__page--active");
	mainHeaderNav.innerText = "Modify Record";
});
removeProfileMenu.addEventListener("click", () => {
	disabler();
	profileMenu.classList.remove("profile-menu--active");
	removePage.classList.add("main__page__page--active");
	mainHeaderNav.innerText = "Remove Record";
});
recoverProfileMenu.addEventListener("click", () => {
	disabler();
	profileMenu.classList.remove("profile-menu--active");
	recoverPage.classList.add("main__page__page--active");
	mainHeaderNav.innerText = "Recover Record";
});
