$.ajaxSetup({
    headers: { 'X-CSRF-TOKEN': $("[name='csrf-token']").attr("content") }
});

$(document).ready(function() {
    // ページロード時にブックマークの状態を取得してアイコンを表示する
    $('.favorite_icon, .unfavorite_icon').each(function() {
        var id = $(this).data('id');
        var isBookmarked = localStorage.getItem('isBookmarked_' + id);
        
        if (isBookmarked === 'true') {
            $('.unfavorite_icon[data-id="' + id + '"]').show();
            $('.favorite_icon[data-id="' + id + '"]').hide();
        } else {
            $('.favorite_icon[data-id="' + id + '"]').show();
            $('.unfavorite_icon[data-id="' + id + '"]').hide();
        }
    });

    // ブックマークアイコンをクリックした時の処理
    $('.favorite_icon').on('click', function() {
        var id = $(this).data('id');

        $.ajax({
            url: "/bookmark/add/" + id,
            method: "POST",
            dataType: "json",
        }).done(function(res) {
            console.log(res);
            alert('ブックマークに追加しました');
            
            localStorage.setItem('isBookmarked_' + id, 'true');
            
            $(this).hide();
            $('.unfavorite_icon[data-id="' + id + '"]').show();
        }.bind(this)).fail(function() {
            alert('通信が失敗しました');
        });
    });

    // 解除アイコンをクリックした時の処理
    $('.unfavorite_icon').on('click', function() {
        var id = $(this).data('id');

        $.ajax({
            url: "/bookmark/remove/" + id,
            method: "DELETE",
            dataType: "json",
        }).done(function(res) {
            console.log(res);
            alert('ブックマークを削除しました');
            
            localStorage.removeItem('isBookmarked_' + id);
            
            $(this).hide();
            $('.favorite_icon[data-id="' + id + '"]').show();
        }.bind(this)).fail(function() {
            alert('通信が失敗しました');
        });
    });
});
