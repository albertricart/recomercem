<?php $pageStylesAry = array('signup' => '/css/signup.css'); if(isset($_SESSION['user'])){?>
    <form action="../index.php" method="POST">
        <button type="submit" class="cerrarBtn" name="cerrarSesionBtn">
            Cerrar Sesión
        </button>
    </form>
<?php }?>