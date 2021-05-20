"use strict";

const searchParams = new URLSearchParams(document.location.search);

const q = searchParams.get("q");
searchQuery.value = q;

searchQuery.addEventListener('change', ev => {

    while (servicesList.firstChild) {
        servicesList.firstChild.remove();
    }
    if (!searchQuery.value) {
        return;
    }
    const filteredData = servicesData.filter(item => {
        return item.title.includes(searchQuery.value);
    });

    const articles = filteredData.map(buildResultFromData);
    articles.forEach(article => servicesList.appendChild(article));
    if (!articles.length) {
        const li = document.createElement('li');
        li.textContent = `No results found for "${searchQuery.value}"`;
        servicesList.appendChild(li);
    }

});

searchQuery.dispatchEvent(new Event('change', {'bubbles': true}));


function buildResultFromData(data) {
    const li = document.createElement('li');
    const a = document.createElement('a');
    const img = document.createElement('img');
    const pRole = document.createElement('p');
    const pSkill = document.createElement('p');
    const pTitle = document.createElement('p');
    const loginMsg = document.createElement('a');
    const lineBreak = document.createElement('br');

    li.id = "li-searchbar";
    img.id = "img-searchbar";
    img.src = `assets/images/${data.imgID}.png`;
    img.alt = `${data.imgID}`;
    a.textContent = data.name;
    a.href = `loginReg`;

    pRole.id = "search-role";
    pRole.textContent = data.role;
    pSkill.id = "search-skill";
    pSkill.textContent = data.category;
    pTitle.id = "search-title";
    pTitle.textContent = data.title;
    loginMsg.textContent = `Please Login To Hire This Freelancer`;
    loginMsg.href = `loginReg`;


    li.appendChild(img);
    li.appendChild(a);
    li.appendChild(pRole);
    li.appendChild(pSkill);
    li.appendChild(pTitle);
    li.appendChild(lineBreak);
    li.appendChild(loginMsg);

    return li;
}
