let menuStatus = {};
let menuCategories = document.querySelectorAll('.mega-menu-item-object-category');

if (localStorage.getItem('menuStatus') == null) {
  for (let i = 0; i < menuCategories.length; i++) {
      menuStatus[i] = false;
  }
  menuStatus[0] = true;
  localStorage.setItem('menuStatus', JSON.stringify(menuStatus));
}else{
  menuStatus = JSON.parse(localStorage.getItem('menuStatus'));
}

function updateMenuStatus(){
   for (let i = 0; i < menuCategories.length; i++) {
    if (menuStatus[i] === true) {
       menuCategories[i].className += " mega-toggle-on";
    }
 }
}

//Desktop
updateMenuStatus();

//Mobile
setTimeout(() => {
  updateMenuStatus();
}, 500);

for (let i = 0; i < menuCategories.length; i++) {
      menuCategories[i].addEventListener('click', ()=>{
      const classListCategory = [...menuCategories[i].classList];
      if (classListCategory.includes("mega-toggle-on")) {
        menuStatus[i] = true;
      }else{
        menuStatus[i] = false;
      }
      if (i === 0){
        menuStatus[i] = true;
      }
      localStorage.setItem("menuStatus", JSON.stringify(menuStatus));
  })
}

const arrows = document.querySelectorAll(".mega-indicator");

//Moving by default arrow to the left.
arrows.forEach((arrow) => {
  arrow.style.float = "left";
  arrow.style.fontSize = "30px";
  arrow.style.marginLeft = "-15px";
});

// Setting menu
const searchIcon = document.querySelector(".search-icon");
let input = document.querySelector(".expand-to-right input[type=text]");
input.style.display = "none";
searchIcon.addEventListener("click", () => {
  let inputChange = document.querySelector(".expand-to-right input[type=text]");
  inputChange.style.display == "inline-block"
    ? (inputChange.style.display = "none")
    : (inputChange.style.display = "inline-block");
  if (document.querySelector(".mega-search-closed")) {
    searchIcon.style.marginLeft = "0";
  } else {
    searchIcon.style.marginLeft = "85px";
  }
});