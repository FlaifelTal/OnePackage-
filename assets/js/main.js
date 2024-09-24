// ensures the js starts after dom //after the html structure has fully loaded 
document.addEventListener('DOMContentLoaded', function () {

    var sliderImages = document.querySelectorAll('.slide'),
        current = 0;

    function reset() {
        for (let i = 0; i < sliderImages.length; i++) {
            sliderImages[i].style.display = 'none';
        }
    }

    function init() {
        reset();
        sliderImages[0].style.display = 'block';
        createArrows();
        createNavPoints();
    }

    function slideLeft() {
        reset();
        current--;
        if (current < 0) {
            current = sliderImages.length - 1;
        }
        sliderImages[current].style.display = 'block';
        updateNavPoints();
    }

    function slideRight() {
        reset();
        current++;
        if (current >= sliderImages.length) {
            current = 0;
        }
        sliderImages[current].style.display = 'block';
        updateNavPoints();
    }

    function createArrows() {
        var wrap = document.querySelector('.wrap');

        // Left arrow
        var arrowLeft = document.createElement('div');
        arrowLeft.id = 'arrow-left';
        arrowLeft.className = 'arrow';
        arrowLeft.style.borderWidth = '30px 40px 30px 0';
        arrowLeft.style.borderColor = 'transparent #fff transparent transparent';
        arrowLeft.style.left = '0';
        arrowLeft.style.marginLeft = '30px';
        arrowLeft.addEventListener('click', slideLeft);
        wrap.appendChild(arrowLeft);

        // Right arrow
        var arrowRight = document.createElement('div');
        arrowRight.id = 'arrow-right';
        arrowRight.className = 'arrow';
        arrowRight.style.borderWidth = '30px 0 30px 40px';
        arrowRight.style.borderColor = 'transparent transparent transparent #fff';
        arrowRight.style.right = '0';
        arrowRight.style.marginRight = '30px';
        arrowRight.addEventListener('click', slideRight);
        wrap.appendChild(arrowRight);
    }

    function createNavPoints() {
        var wrap = document.querySelector('.wrap');
        var navContainer = document.createElement('div');
        navContainer.id = 'nav-points';
        navContainer.style.position = 'absolute';
        navContainer.style.bottom = '10px';
        navContainer.style.left = '50%';
        navContainer.style.transform = 'translateX(-50%)';
        wrap.appendChild(navContainer);

        for (let i = 0; i < sliderImages.length; i++) {
            let point = document.createElement('span');
            point.className = 'nav-point';
            point.style.display = 'inline-block';
            point.style.width = '10px';
            point.style.height = '10px';
            point.style.backgroundColor = '#fff';
            point.style.borderRadius = '50%';
            point.style.margin = '0 5px';
            point.style.cursor = 'pointer';
            point.addEventListener('click', (function (index) {
                return function () {
                    reset();
                    current = index;
                    sliderImages[current].style.display = 'block';
                    updateNavPoints();
                };
            })(i));
            navContainer.appendChild(point);
        }

        updateNavPoints(); // Initialize nav points
    }

    function updateNavPoints() {
        var points = document.querySelectorAll('.nav-point');
        points.forEach((point, index) => {
            point.style.backgroundColor = index === current ? '#000' : '#fff';
        });
    }

    init();
});



document.addEventListener("DOMContentLoaded", function() {
    var btn_popup = document.querySelectorAll(".container .btn_popup");
    var popup = document.getElementById("popup");
    var popup_bar = document.getElementById("popup_bar");
    var btn_close = document.getElementById("btn_close");
    var smoke = document.getElementById("smoke");
  
    var popupTitle = document.getElementById("popup_title");
    var popupImg = document.getElementById("popup_img_src");
    var popupProductName = document.getElementById("popup_product_name");
    var popupProductDescription = document.getElementById("popup_product_description");
  
    var offset = { x: 0, y: 0 };
  
    popup_bar.addEventListener('mousedown', mouseDown, false);
    window.addEventListener('mouseup', mouseUp, false);
  
    function mouseUp() {
      window.removeEventListener('mousemove', popupMove, true);
    }
  
    function mouseDown(e) {
      offset.x = e.clientX - popup.offsetLeft;
      offset.y = e.clientY - popup.offsetTop;
      window.addEventListener('mousemove', popupMove, true);
    }
  
    function popupMove(e) {
      popup.style.left = (e.clientX - offset.x) + 'px';
      popup.style.top = (e.clientY - offset.y) + 'px';
    }
  
    window.onkeydown = function(e) {
      if (e.keyCode === 27) { // ESC key pressed
        btn_close.click();
      }
    }
  
    btn_popup.forEach(function(button) {
      button.onclick = function() {
        var cat = button.getAttribute("data-cat");
        var title = button.getAttribute("data-title");
        var description = button.getAttribute("data-description");
        var imgSrc = button.getAttribute("data-img-src");
  
        popupTitle.textContent = cat;
        popupProductName.textContent = title;
        popupProductDescription.textContent = description;
        popupImg.src = imgSrc;
  
        spreadSmoke(true);
        popup.style.display = "block";
        popup.style.left = "50%";
        popup.style.top = "50%";
        popup.style.transform = "translate(-50%, -50%)"; // Center the popup
      };
    });
  
    btn_close.onclick = function() {
      popup.style.display = "none";
      smoke.style.display = "none";
    }
  
    window.onresize = function() {
      spreadSmoke();
    }
  
    function spreadSmoke(show) {
      if (show) {
        smoke.style.display = "block";
      } else {
        smoke.style.display = "none";
      }
    }
  });
  