const imgWrap = document.querySelector('.media-section__img-wrap');
const images = document.querySelectorAll('.media-section__img');
const imgCount = images.length;

// Nhân đôi nội dung để tạo hiệu ứng cuộn vô hạn
for (let i = 0; i < imgCount; i++) {
    const clone = images[i].cloneNode(true);
    imgWrap.appendChild(clone);
}

// Cập nhật chiều rộng của imgWrap
imgWrap.style.width = `${imgWrap.scrollWidth}px`;
