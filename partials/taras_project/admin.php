<?php
include('partials/header.php');
if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] != true){
  header('Location: 404.php');
}
?> 
<main>
    <section class="container">
        <div class="row">
            <div class="col-100 text-center">
                <h1>Admin interface</h1>
                <?php
                if($_SESSION['is_admin'] == 1){
                    include('partials/admin-kontakt.php');
                }
                ?>
            </div>
        </div>
    </section>
</main>
