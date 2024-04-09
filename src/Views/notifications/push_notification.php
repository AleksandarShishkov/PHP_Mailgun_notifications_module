

<div style="text-align:center">

    <h1>Push notification to the queue</h1>

    <div>
        <?php if(isset($_GET['success']) && $_GET['success'] != null) { ?>
            <h4><?=$_GET['success']?></h4>
            <?php $_GET['success'] = null; ?>
        <?php } else if(isset($_GET['error']) && $_GET['error'] != null) { ?>
            <h4><?=$_GET['error']?></h4>
            <?php $_GET['error'] = null; ?>
        <?php } ?>
    </div>

    <div>
        <form class="form_style" method="POST" action="../../../index.php">

            <label for="recipient">Recipient`s email:</label><br>
            <input type="email" name="recipient" id="recipient" required><br><br>

            <label for="subject">Subject:</label><br>
            <input type="text" name="subject" id="subject" required><br><br>

            <label for="body">Body text:</label><br>
            <textarea name="body" id="body" rows="5" required></textarea><br><br>

            <input type="submit" class="submit_btn" name="push_notification" value="Push to queue">
        </form>
    </div>

</div>

<script>
    function checkInputs() {
        var recipient = document.getElementById("recipient").value.trim();
        var subject = document.getElementById("subject").value.trim();
        var body = document.getElementById("body").value.trim();

        return recipient === '' && subject === '' && body === '';
    }

    setTimeout(function() {
        if (checkInputs()) {
            window.location.href = '../../../index.php';
        }
    }, 10000); 
</script>