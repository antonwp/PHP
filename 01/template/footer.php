<footer class="footer mt-auto py-3 bg-light">
    <div class="container">
        <span class="text-muted">Copyright &copy; <a href="http://antonwp.ru" target="_blank">Anton Lazarenko</a>. 2021</span>
    </div>
</footer>
<script src="/php/01/js/jquery.min.js"></script>

<script>

$('#send_mess').click(function(){
        let name = $('#username').val();
        let email = $('#email').val();
        let mess = $('#mess').val();

        $.ajax({
            url: 'send_mess.php',
            type: 'POST',
            cache: false,
            data: {
                'username': name,
                'email': email,
                'mess': mess
            },
            dataType: 'html',
            success: function(data) {
                if (data == 'Готово') {
                    $('#send_mess').hide();
                    $('#error_block').hide();
                    $('#success_block').show();
                    $('#username').val('');
                    $('#email').val('');
                    $('#mess').val('');
                } else {
                    $('#error_block').show();
                    $('#error_block').text(data);
                }
            }
        });
    });


    $('#add_stat').click(function(){
        let stat_title = $('#stat_title').val();
        let intro = $('#intro').val();
        let text = $('#text').val();

        $.ajax({
            url: 'add_stat.php',
            type: 'POST',
            cache: false,
            data: {
                'stat_title': stat_title,
                'intro': intro,
                'text': text
            },
            dataType: 'html',
            success: function(data) {
                if (data == 'Готово') {
                    $('#add_stat').hide();
                    $('#error_block').hide();
                    $('#success_block').show();
                } else {
                    $('#error_block').show();
                    $('#error_block').text(data);
                }
            }
        });
    });


    $('#reg_user').click(function(){
        let name = $('#username').val();
        let email = $('#email').val();
        let login = $('#login').val();
        let pass = $('#pass').val();

        $.ajax({
            url: 'add_user.php',
            type: 'POST',
            cache: false,
            data: {
                'username': name,
                'email': email,
                'login': login,
                'pass': pass
            },
            dataType: 'html',
            success: function(data) {
                if (data == 'Готово') {
                    $('#reg_user').hide();
                    $('#error_block').hide();
                    $('#success_block').show();
                } else {
                    $('#error_block').show();
                    $('#error_block').text(data);
                }
            }
        });
    });

    $('#auth_user').click(function(){
        let login = $('#login').val();
        let pass = $('#pass').val();

        $.ajax({
            url: 'auth_user.php',
            type: 'POST',
            cache: false,
            data: {
                'login': login,
                'pass': pass
            },
            dataType: 'html',
            success: function(data) {
                if (data == 'Готово') {
                    $('#auth_user').text('Готово');
                    document.location.reload(true);
                } else {
                    $('#error_block').show();
                    $('#error_block').text(data);
                }
            }
        });
    });


    $('#exit_btn').click(function(){
        $.ajax({
            url: 'exit.php',
            type: 'POST',
            cache: false,
            data: {},
            dataType: 'html',
            success: function(data) {
                document.location.reload(true);
            }
        });
    });
</script>