"use strict";

const searchParams = new URLSearchParams(document.location.search);

const q = searchParams.get("q");
searchQuery.value = q;

searchQuery.addEventListener('change', ev=>{

  while(servicesList.firstChild) {
    servicesList.firstChild.remove();
  }
  if(!searchQuery.value) {
    return;
  }
  const filteredData = servicesData.filter(item => {
    return item.title.includes(searchQuery.value);
  });

  const articles = filteredData.map(buildResultFromData);
  articles.forEach(article => servicesList.appendChild(article));
  if(!articles.length) {
    const li = document.createElement('li');
    li.textContent = `No results found for "${searchQuery.value}"`;
    servicesList.appendChild(li);
  }

});

searchQuery.dispatchEvent(new Event('change', { 'bubbles': true }));


function buildResultFromData(data) {
  const li = document.createElement('li');
  const a = document.createElement('a');
  const img = document.createElement('img');
  const pRole = document.createElement('p');
  const pSkill = document.createElement('p');
  const pTitle = document.createElement('p');


  li.id ="li-searchbar";
  img.id = "img-searchbar";
  img.src = `images/${data.imgID}.png`;
  img.alt = `${data.imgID}`;
  // a.id ="";
  a.textContent = data.name;
  a.href = `services.html?id=${data.id}`;

  pRole.id = "search-role";
  pRole.textContent = data.role;
  pSkill.id = "search-skill";
  pSkill.textContent = data.category;
  pTitle.id = "search-title";
  pTitle.textContent = data.title;


  li.appendChild(img);
  li.appendChild(a);
  li.appendChild(pRole);
  li.appendChild(pSkill);
  li.appendChild(pTitle);


  return li;
}
