<div class="block">
    <h2 class="title">
        🎅 Sign up 🎅</h2>
    <form action="?p=signup.ok" method="post">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="country">ID</label>
            </div>
            <input class="form-control" name="id" type="text" placeholder="id">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="country">Password</label>
            </div>
            <input class="form-control" name="password" type="password" placeholder="password">
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="country">Nickname</label>
            </div>
            <input class="form-control" name="nickname" type="text" placeholder="nickname">
        </div>
        <div class="input-group mb-1">
            <div class="float-right">
                <input type="submit" class="btn btn-primary" value="Sign Up">
            </div>
        </div>
        <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
    </form>
</div>
<script src="https://www.google.com/recaptcha/api.js?render=6LeKDskUAAAAAAh1LrqJ8isTG7rzGFpgNGas4x7z"></script>
<script>
    grecaptcha.ready(function() {
        grecaptcha.execute('6LeKDskUAAAAAAh1LrqJ8isTG7rzGFpgNGas4x7z', {action: 'homepage'}).then(function(token) {
            document.getElementById('g-recaptcha-response').value = token;
        });
    });
</script>