<script>
    function checkFeedBack() {
        let author = document.querySelector('.fAuthor').value;
        let emailFeed = document.querySelector('.fEmail').value;
        let comment = document.querySelector('.fComment').value;
        let per_name =/[^(\w)|(\x7F-\xFF)|(\s)]/;
        let per_email =/^[A-Z0-9._%+-]+@[A-Z0-9-]+.+.[A-Z]{2,4}$/i;
        let messageInformation = document.querySelector('.infoMessage');


        if(!per_name.test(author) ||
            !per_name.test(comment) ||
            !per_email.test(emailFeed)
        ) {
            messageInformation.innerHTML = 'Не корректно введены данные, проверьте еще раз!';
            document.querySelector('.infoMessage').style.top = '0';
        }else {
            messageInformation.innerHTML = ' ';
            document.querySelector('.f_wrapper').style.display = 'none';
            document.querySelector('.submit').style.display = 'flex';
            document.querySelector('.check_info').style.display = 'none';

        }
    }
</script>