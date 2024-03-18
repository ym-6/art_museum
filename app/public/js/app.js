// CSRFトークンをmetaタグから取得
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

// お気に入りアイコンのクリックイベントを処理する
document.getElementById('favoriteIcon').addEventListener('click', function() {
    // ビューファイルからmuseumIdを取得
    var museumId = this.getAttribute('data-museum-id');
    
    // お気に入りの状態を取得
    var isFavorite = this.src.includes('fav1.jpeg');

    // Ajaxリクエストを送信
    fetch('/toggle-bookmark/' + museumId, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken // CSRFトークンを追加
        },
        body: JSON.stringify({ isFavorite: isFavorite }) // お気に入りの状態を送信
    })
    .then(response => {
        if (response.ok) {
            // サーバーからの応答が成功した場合、お気に入りアイコンの画像を切り替える
            this.src = isFavorite ? "/img/fav2.jpeg" : "/img/fav1.jpeg";
        }
    })
    .catch(error => console.error('Error:', error));
});
