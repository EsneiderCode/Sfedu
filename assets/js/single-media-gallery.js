const images = [...document.querySelectorAll('.image')];

// popup

const popup = document.querySelector('.popup');
const closeBtn = document.querySelector('.close-btn');
const largeImage = document.querySelector('.large-image');
const imageIndex = document.querySelector('.index');
const leftArrow = document.querySelector('.left-arrow');
const rightArrow = document.querySelector('.right-arrow');

let index = 0; // will track our current image;

const imgs = document.querySelectorAll('.image');
const srcImgs = [];
imgs.forEach(img => {
    srcImgs.push(img.src);
})



images.forEach((item, i) => {
    item.addEventListener('click', () => {
        updateImage(i);
        popup.classList.toggle('active');
    })
})

const updateImage = (i) => {
    let path = srcImgs[i];
    largeImage.src = path;
    imageIndex.innerHTML = `${i+1}`;
    index = i;
}

closeBtn.addEventListener('click', () => {
    popup.classList.toggle('active');
})

leftArrow.addEventListener('click', () => {
    if(index > 0){
        updateImage(index - 1);
    }
})

rightArrow.addEventListener('click', () => {
    if(index < images.length - 1){
        updateImage(index + 1);
    }
})

if (document.querySelector('.image') != null) {
    const imagesGallery = document.querySelectorAll('.image');
    const searchIcons = document.querySelectorAll('.search-img');

    for (let i = 0 ; i < imagesGallery.length; i++){
        imagesGallery[i].addEventListener('mouseover', () => {
            searchIcons[i].style.display = "block";
        })
        imagesGallery[i].addEventListener('mouseout', () => {
            searchIcons[i].style.display = "none";
        })
    }
}

if (document.querySelector('.image-name') != null ){ 
    const imageTittle = document.querySelector('.image-name');
    const childTittles = imageTittle.childNodes;
    for (let i = 0 ; i < childTittles.length; i++) {
        console.log(childTittles[i].nodeName)
        if(childTittles[i].nodeName == "BR"){
            imageTittle.removeChild(childTittles[i]);
        }
    }
}

if (document.querySelector('.gallery-image') == null && document.querySelector('.video-gallery-container').childElementCount == 1 && window.innerWidth > 600 ){
    const video = document.querySelector('.video-gallery');
    const container = document.querySelector('.video-gallery-container');
    container.style.position = "relative";
    container.style.marginBottom ="40px";
    container.style.height = "493px";
    video.style.width = "100%";
    video.style.height = "100%";
    video.style.position = "absolute";
}