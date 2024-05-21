<?php include './pagina/breadcrumb.php'; ?>
<?php echo $breadcrumbs;
?>

<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <?php
                        if (session_status() == PHP_SESSION_NONE) {
                            session_start();
                        }

                        if (isset($_GET['id_pedido'])) {
                            $id_pedido = $_GET['id_pedido'];
                            echo "<h1>Pedido Completado</h1>";
                        } else {
                            echo "<h1>Error</h1>";
                        }
                        ?>
                    </div>
                    <div class="card-body text-center">
                        <?php
                        if (isset($id_pedido)) {
                            echo "<p>Su pedido ha sido completado con éxito.</p>";
                            echo "El número de su pedido es: <strong>$id_pedido</strong></p>";
                        } else {
                            echo "<p>No se ha podido completar su pedido.</p>";
                        }
                        ?>
                    </div>
                    <div class="card-footer text-center">
                        <a href="index.php?page=inicio" class="btn btn-primary">Inicio</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
