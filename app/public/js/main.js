var imagePaths = [
    "/img/27409714_s.jpg",
    "/img/28873208_s.jpg",
    "/img/28942553_s.jpg",
    "/img/29028774_s.jpg"
];

// 現在の画像のインデックスを追跡
var currentImageIndex = 0;

// メイン画像のsrc属性を更新
function updateMainImage() {
    var mainImage = document.getElementById('main');
    mainImage.style.opacity = 0; // フェードインのために透明度を0に設定
    mainImage.src = imagePaths[currentImageIndex];
    // フェードイン効果を実行
    fadeIn(mainImage);
}

// 画像を切り替え
function changeImage(direction) {
    currentImageIndex += direction;
    // インデックスが画像の範囲外にならないようにする
    if (currentImageIndex < 0) {
        currentImageIndex = imagePaths.length - 1;
    } else if (currentImageIndex >= imagePaths.length) {
        currentImageIndex = 0;
    }
    // メイン画像を更新
    updateMainImage();
}

// フェードイン処理
function fadeIn(element) {
    var opacity = 0;
    var intervalId = setInterval(function() {
        if (opacity < 1) {
            opacity += 0.1;
            element.style.opacity = opacity;
        } else {
            clearInterval(intervalId);
        }
    }, 50); // フェードインの速度
}

// 画像切り替え
setInterval(function() {
    changeImage(1);
}, 3000);
