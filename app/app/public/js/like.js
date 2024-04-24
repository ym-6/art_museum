$.ajaxSetup({
    headers: { 'X-CSRF-TOKEN': $("[name='csrf-token']").attr("content") }
});

$(document).ready(function() {
    // ページロード時にブックマークの状態を取得してアイコンを表示する
    $('.like_icon, .unlike_icon').each(function() {
        var reviewId = $(this).data('review-id');
        var museumId = $(this).data('museum-id');

        var isLiked = localStorage.getItem('isLiked_' + reviewId);

        // ローカルストレージから取得したいいねの状態に応じてアイコンを表示する
        if (isLiked === 'true') {
            $(this).hide(); // いいねされている場合はいいねアイコンを非表示
            $('.unlike_icon[data-review-id="' + reviewId + '"][data-museum-id="' + museumId + '"]').show(); // 解除アイコンを表示
        } else {
            $(this).show(); // いいねされていない場合はいいねアイコンを表示
            $('.unlike_icon[data-review-id="' + reviewId + '"][data-museum-id="' + museumId + '"]').hide(); // 解除アイコンを非表示
        }
    });

    // いいねアイコンをクリックした時の処理
    $('.like_icon').on('click', function() {
        var $likeIcon = $(this); // クリックされたいいねアイコンを保存
    
        var reviewId = $likeIcon.data('review-id');
        var museumId = $likeIcon.data('museum-id');
        
        $.ajax({
            url: "/like/add/" + reviewId,
            method: "POST",
            data: { art_museum_id: museumId },
            dataType: "json",
        }).done(function(res) {
            console.log(res);
            alert('いいねに追加しました');
            
            localStorage.setItem('isLiked_' + reviewId, 'true');
            
            $likeIcon.hide(); // クリックされたいいねアイコンを非表示にする
            $('.unlike_icon[data-review-id="' + reviewId + '"][data-museum-id="' + museumId + '"]').show(); // 解除アイコンを表示
        }).fail(function() {
            alert('通信が失敗しました');
        });
    });
    
    // 解除アイコンをクリックした時の処理
    $('.unlike_icon').on('click', function() {
        var $unlikeIcon = $(this); // クリックされた解除アイコンを保存
    
        var reviewId = $unlikeIcon.data('review-id');
        var museumId = $unlikeIcon.data('museum-id');
    
        $.ajax({
            url: "/like/remove/" + reviewId,
            method: "DELETE",
            data: { art_museum_id: museumId },
            dataType: "json",
        }).done(function(res) {
            console.log(res);
            alert('いいねを削除しました');
            
            localStorage.removeItem('isLiked_' + reviewId);
            
            $unlikeIcon.hide(); // クリックされた解除アイコンを非表示にする
            $('.like_icon[data-review-id="' + reviewId + '"][data-museum-id="' + museumId + '"]').show(); // いいねアイコンを表示
        }).fail(function() {
            alert('通信が失敗しました');
        });
    });
    
});
