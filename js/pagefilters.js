console.log(`Page Filters started`);

const catFilters = () => {
  let activeCat = document.getElementsByClassName(`active`)[0].id;
  let cat;
  console.log(`current filter ${activeCat}`);
  switch (activeCat) {
    case `filter_all`:
      cat = `all`;
      break;
    case `filter_7-dice`:
      cat = `7-dice`;
      break;
    case `filter_12d6`:
      cat = `12d6`;
      break;
    case `filter_10d10`:
      cat = `10d10`;
      break;
    default:
      cat = `all`;
      break;
  }
  return cat;
}

const removeActiveClass = () => {
  console.log(`removeActiveClass`);
  let currentActive = document.getElementsByClassName(`active`);
  for (var i = 0; i < currentActive.length; i++) {
    currentActive[i].classList.remove(`active`);
  }
}

const addActiveClass = (id) => {
  console.log(`add Active Class to ${id}`);
  let newActive = document.getElementById(id);
  newActive.classList.add(`active`);
}

const catClick = (cat, url, output) => {
  console.log(`Category Clicked`);
  removeActiveClass();
  addActiveClass(cat);

  let newCat = catFilters();
  console.log(newCat);
  let compiledUrl = `${url}?cat=${newCat}`;
  console.log(compiledUrl);
  updatePage(compiledUrl, output);
}


const updatePage = (url, output) => {
  console.log('update start');
  console.log(url);
  let xmlRequest = new XMLHttpRequest();
  xmlRequest.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this);
      output(this);
    }
  };
  xmlRequest.open(`GET`, url, true);
  xmlRequest.send();
}

const showData = (data) => {
  let filterResults = document.getElementById(`product_output`);
  filterResults.innerHTML = data[`response`];
}