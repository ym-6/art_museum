// CSRFトークンをmetaタグから取得
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

// いいねアイコンのクリックイベントを処理する
document.getElementById('likeIcon').addEventListener('click', function() {
    // ビューファイルからmuseumIdを取得
    var museumId = this.getAttribute('data-museum-id');
    
    // いいねの状態を取得
    var isLike = this.src.includes('nice1.jpeg');

    // Ajaxリクエストを送信
    fetch('/toggle-like/' + museumId, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken // CSRFトークンを追加
        },
        body: JSON.stringify({ isLike: isLike }) // いいねの状態を送信
    })
    .then(response => {
        if (response.ok) {
            // サーバーからの応答が成功した場合、いいねアイコンの画像を切り替える
            this.src = isLike ? "/img/nice2.jpeg" : "/img/nice1.jpeg";
        }
    })
    .catch(error => console.error('Error:', error));
});
