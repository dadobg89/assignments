<!doctype html>
<?php
include_once ('conectdb.php');
session_start();
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Assignment</title>

        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,300italic,100italic,400italic,500,500italic,700,700italic,900,900italic&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>

    <body>
        <header id="header">
            <div class="wrapper">
                <div id="logo">
                    <a href="index.php"><img src="images/logo.png" alt="logo"></a>
                </div>

                <nav id="nav">
                    <?php if (isset($_SESSION['usr_id'])) { ?>
                        <form method="post" action="action.php">
                            <input type="hidden" name="form_id" value="logout">
                            <input class="logout-btn" type="submit" name="logout_submit" value="Izloguj se">
                        </form>
                    <?php } ?>	
                </nav>
            </div> 
        </header>
        <section id="main"> 
            <aside id="sidebar">
                <div id="sidebar-top">
                    <div id="user-name">
                        <?php if (isset($_SESSION['usr_id'])) { ?>
                            <h5><?php echo $_SESSION['u_name']; ?></h5>
                        <?php } ?>
                    </div>
                </div>

                <div id="sidebar-nav">
                    <ul>
                        <?php
                        $sql = "SELECT role_id FROM users";
                        $result = mysqli_query($conn, $sql);
                        $rw = mysqli_fetch_assoc($result);

                        if (isset($_SESSION['usr_id'])) {

                            if ($_SESSION['role'] == 1) {
                                ?>
                                <li><a href="grupe.php"><i class="fa fa-users" aria-hidden="true"></i>&nbsp; Grupe</a></li>
                                <li><a href="zadaci.php"><i class="fa fa-clone" aria-hidden="true"></i>&nbsp; Zadaci</a></li>
                                <li><a href="studenti.php"><i class="fa fa-graduation-cap" aria-hidden="true"></i>&nbsp;Studenti</a></li>
                                <li><a href="istorija.php"><i class="fa fa-history" aria-hidden="true"></i>&nbsp; Istorija</a></li>
                            <?php }
                        }
                        ?>
                    </ul>
                </div>
            </aside>
            <aside class="content">
<?php if (!isset($_SESSION['usr_id'])) { ?>
                    <div class="login-form forms">
                        <div class="forms-top">
                            <h4>uloguj se</h4>
                        </div>
                        <div class="forms-cont">
                            <form action="action.php" method="post" name="login">
                                <div>
                                    <label for="username">Korisnicko ime:</label><br>
                                    <input class="inputs" type="text" name="username" maxlength="50" value="" placeholder="Upisi korisnicko ime">
                                </div>
                                <div>
                                    <label for="password">Sifra:</label><br>
                                    <input class="inputs" type="password" name="password" maxlength="32" value="" placeholder="Upisi sifru">
                                </div>
                                <div>
                                    <input type="hidden" name="form_id" value="login">
                                    <input class="submit-btn" type="submit" name="login_btn" value="OK">
                                </div>
                            </form>
                        </div>
                    </div>
<?php } else { ?>
                    <div class="tables">
                        <div class="tables-top">
                            <h4>istorija</h4>
                        </div>
                        <div class="tables-cont">
                            <table class="table-index">
                                <tr>
                                    <th>some intel</th>
                                    <th>some intel</th>
                                    <th>some intel</th>
                                    <th>some intel</th>
                                </tr>
                                <tr>
                                    <td>some intel</td>
                                    <td>some intel</td>
                                    <td>some intel</td>
                                    <td>some intel</td>
                                </tr>
                            </table>
                        </div>
                    </div>
<?php } ?>
            </aside>
        </section>

        <footer id="footer">
        </footer>
    </body>
</html>























