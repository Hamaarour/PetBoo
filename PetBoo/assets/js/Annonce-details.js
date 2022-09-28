/*const imgs = document.querySelectorAll(".img-select a");
const imgBtns = [...imgs];
let imgId = 1;

imgBtns.forEach((imgItem) => {
    imgItem.addEventListener("click", (event) => {
        event.preventDefault();
        imgId = imgItem.dataset.id;
        slideImage();
    });
});

function slideImage() {
    const displayWidth = document.querySelector(
        ".img-showcase img:first-child"
    ).clientWidth;

    document.querySelector(".img-showcase").style.transform = `translateX(${-(imgId - 1) * displayWidth
        }px)`;
}

window.addEventListener("resize", slideImage);*/




/**/////////////////////////////////////////////////////////////////////////////////////// */
// Main image
const sectionHero = document.querySelector(".hero");
const mainImg = document.querySelector(".main-img");
// Float image
const classFloat = document.querySelector(".floating-img");
const mainImgFloat = document.querySelector(".main-img-float");
// thumbnail images
const thumbnailbImg = document.querySelectorAll(".thumb-img");
// thumbnail imgs floating
const thumbnailbImgFloat = document.querySelectorAll(".thumb-img-float");

const overlayC = document.querySelector(".overlay");
const closeIcon = document.querySelector(".close-icon");

// btns
const leftArrow = document.querySelector(".btn-swipe-left");
const rightArrow = document.querySelector(".btn-swipe-right");

const minusBtn = document.querySelector(".minus");
const cartNumber = document.querySelector(".cart-number");
const plusBtn = document.querySelector(".plus");
// console.log(btnLeft);
// console.log(btnRight);

//////////////////////////////////////
// Adding and removing float image
let index = 0;

mainImg.addEventListener("click", function () {
  classFloat.classList.add("activate"); ////////
  overlayC.classList.add("activate");

  mainImgFloat.src = mainImg.src;
  for (let j = 0; j < thumbnailbImgFloat.length; j++) {
    thumbnailbImgFloat[j].classList.remove("active-thumb");
    if (thumbnailbImg[j].classList.contains("active-thumb")) {
      thumbnailbImgFloat[j].classList.add("active-thumb");
      index = j;
    }
  }
});

const removeFloatImg = function () {
  classFloat.classList.remove("activate"); //////
  overlayC.classList.remove("activate");
};

closeIcon.addEventListener("click", function () {
  removeFloatImg();
});

overlayC.addEventListener("click", function () {
  removeFloatImg();
});

document.addEventListener("keydown", function (e) {
  // console.log(e.key);
  if (e.key === "Escape") {
    removeFloatImg();
  }
});

//////////////////////////////////
// changing images main

for (let i = 0; i < thumbnailbImg.length; i++) {
  thumbnailbImg[i].addEventListener("click", function () {
    for (let j = 0; j < thumbnailbImg.length; j++) {
      thumbnailbImg[j].classList.remove("active-thumb");
    }
    thumbnailbImg[i].classList.add("active-thumb");

    // to change main image
    const thumbnailTag = thumbnailbImg[i].getElementsByTagName("img");
    // console.log(thumbnailTag[0], thumbnailTag[0].getAttribute("src"));
    const thumbnailIndex = thumbnailTag[0].getAttribute("src")[21];

    mainImg.src = `images/image-product-${thumbnailIndex}.jpg`;
  });
}

////////////////////////////////
// changing images Floating
// console.log(thumbnailbImgFloat);
for (let i = 0; i < thumbnailbImgFloat.length; i++) {
  thumbnailbImgFloat[i].addEventListener("click", function () {
    for (let j = 0; j < thumbnailbImgFloat.length; j++) {
      thumbnailbImgFloat[j].classList.remove("active-thumb");
    }
    thumbnailbImgFloat[i].classList.add("active-thumb");
    index = i;

    const thumbnailFloatTag = thumbnailbImgFloat[i].getElementsByTagName("img");

    const thumbnailbFloatIndex = thumbnailFloatTag[0].getAttribute("src")[21];

    mainImgFloat.src = `images/image-product-${thumbnailbFloatIndex}.jpg`;
    // mainImgFloat.src = `images/image-product-${1}.jpg`;
  });
}

// for clicking buttons
leftArrow.addEventListener("click", function () {
  if (index >= 1) {
    for (const key of thumbnailbImgFloat) {
      key.classList.remove("active-thumb");
    }
    index -= 1;
    mainImgFloat.src = `images/image-product-${index + 1}.jpg`;
    thumbnailbImgFloat[index].classList.add("active-thumb");
  }
});

rightArrow.addEventListener("click", function () {
  if (index <= 2) {
    for (const key of thumbnailbImgFloat) {
      key.classList.remove("active-thumb");
    }
    index += 1;
    mainImgFloat.src = `images/image-product-${index + 1}.jpg`;
    thumbnailbImgFloat[index].classList.add("active-thumb");
  }
});

// console.log(minusBtn);
// console.log(plusBtn);
// console.log(cartNumber.textContent);
let cartCount = 0;

minusBtn.addEventListener("click", function () {
  if (cartCount >= 1) {
    cartCount -= 1;
    cartNumber.textContent = cartCount;
  }
});

plusBtn.addEventListener("click", function () {
  if (cartCount <= 9) {
    cartCount += 1;
    cartNumber.textContent = cartCount;
  }
});

/////////////////
// Working of CART
const navCart = document.querySelector(".nav-cart");
const cartBox = document.querySelector(".cart");
const emptyCart = document.querySelector(".empty-cart");
const filledCart = document.querySelector(".cart-bottom");
const sectionContainer = document.querySelector(".container");

const btnLeft = document.querySelector(".btn-left");
const btnRight = document.querySelector(".btn-right");
const numbercart = document.querySelector(".count-items");
const currPrice = document.querySelector(".current-price");
const deleteIcon = document.querySelector(".delete");
const navAfter = document.querySelector(".nav-cart-after");

let itemsCount = 0;

navCart.addEventListener("click", function () {
  cartBox.classList.toggle("show");
});

document.addEventListener("keydown", function (e) {
  if (e.key === "Escape") cartBox.classList.remove("show");
});

btnRight.addEventListener("click", function () {
  if (cartCount > 0 && itemsCount + cartCount <= 20) {
    itemsCount += cartCount;
    emptyCart.classList.remove("show");
    filledCart.classList.add("show");
    currPrice.textContent = `$${itemsCount * 125}.00`;
    numbercart.textContent = itemsCount;
    navAfter.classList.add("show");
    navAfter.textContent = itemsCount;
    // cartIcon.classList.add("show");
  }

  if (itemsCount === 20) {
    navAfter.textContent = "full";
  }
});

deleteIcon.addEventListener("click", function () {
  emptyCart.classList.add("show");
  filledCart.classList.remove("show");
  itemsCount = 0;
  navAfter.classList.remove("show");
});

document.body.addEventListener("click", function (e) {
  if (!cartBox.classList.contains("show")) {
    return;
  }

  const arr = e.path;
  for (let i = 0; i < arr.length; i++) {
    if (
      btnRight === arr[i] ||
      btnLeft === arr[i] ||
      navCart === arr[i] ||
      cartBox === arr[i]
    ) {
      return;
    }
  }

  cartBox.classList.remove("show");
});
