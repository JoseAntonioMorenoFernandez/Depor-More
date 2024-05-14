<?php include './pagina/breadcrumb.php'; ?>
<?php echo $breadcrumbs; ?>



<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 col-sm-12 py-5">
            <div class="alert alert-danger text-center" role="alert">
                <h1 class="alert-heading fw-bold">¿Está seguro de borrar el usuario?</h1>
                <hr>
                <p class="mb-0">¡Para nueva alta, contacte con el soporte técnico!</p>
            </div>

            <form action="./php/baja_usuario.php" method="post" class="text-center">
                <input type="hidden" name="confirmacion" value="si">
               
                <div class="row justify-content-center">
                    <div class="col-8">
                        <button type="submit" class="btn btn-danger btn-sm fw-bold col-8 mt-2 mb-2">CONFIRMAR</button>
                    </div>
                    <div class="col-8">
                        <a href="index.php" class="btn btn-secondary btn-sm col-8 mt-2 mb-2">CANCELAR</a>
                    </div>
                </div>
                
            </form>

        </div>
    </div>
</div>
