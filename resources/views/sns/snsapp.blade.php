<style>
    /* ...（前回のスタイル） ... */

    h1 {
        margin-top: 100px;
    }

    .interaction-icons {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 10px;
    }


    .like-btn {
        background-color: #e0245e;
        color: #fff;
        border: none;
    }

    .reply-btn {
        background-color: #1da1f2;
        color: #fff;
        border: none;
    }

    .comment-input {
        margin-top: 10px;
    }
</style>
<div id="app">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <sns-home-component post-data="{{ json_encode($data) }}" reply-url="{{ json_encode( url('/like-post') ) }}" image-path="{{ json_encode( asset('image') ) }}">
    </sns-home-component>
</div>
    <!-- Bootstrap JavaScript 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const replyButtons = document.querySelectorAll('.reply-btn');
        replyButtons.forEach(button => {
            button.addEventListener('click', function() {
                const commentInput = this.parentElement.nextElementSibling;
                if (commentInput.style.display === 'none') {
                    commentInput.style.display = 'block';
                } else {
                    commentInput.style.display = 'none';
                }
            });
        });
    </script>-->

</html>
