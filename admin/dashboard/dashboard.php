
<?php
    include "../../model/koneksi.php";


    // DItaro disemua halaman
    session_start();

    if(!$_SESSION) {
        header("location: /hotelindahhai/view/login.php");
    }
?>

<?php
    include "../../layout/header.php";
    include "../../layout/navbar.php";
?>




<?php
    include "../../layout/footer.php";
?>
