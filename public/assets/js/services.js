"use strict";

const searchParams = new URLSearchParams(document.location.search);

const id = parseInt(searchParams.get("id"));

const data = servicesData.find(item => {
	return item.id === id;
});

back.textContent = '<<GO BACK TO SEARCH';
profileName.textContent = data.name;
image.src = `images/${data.imgID}.png`;
image.alt = `${data.imgID}`;
role.textContent = data.role;
skills.textContent = data.category;
head.textContent = 'Experience';

description.textContent = data.description;
