
<div style="text-align:center">
    <div>
        <h1>Couldn`t send the notification.</h1>

        <?php if(isset($_GET['error_mail'])) { ?>
            <h3>See if the recipient has been added to the Mailguns`s list!</h3>
            <?php $_GET['error_mail'] = null;
        } else if (isset($_GET['error_conn'])) { ?>
            <h3>Check the connection!</h3>
            <?php $_GET['error_conn'] = null;
        } ?>
    </div>

    <div>
        <a href="../../../index.php"><button>Try again</button></a>
    </div>
</div>