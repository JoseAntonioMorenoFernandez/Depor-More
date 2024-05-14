<?php include './pagina/breadcrumb.php'; ?>
<?php echo $breadcrumbs;?>



<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10 col-sm-12 py-5">
            <div class="alert alert-success text-center" role="alert">
                <h1 class="alert-heading">Registro Completado</h1>
                <hr>
                <p class="mb-0">¡Tu registro ha sido completado exitosamente!</p>
            </div>
            <form action="./index.php?page=loginCliente" method="post" class="text-center">
                <button type="submit" class="btn btn-primary mx-2">Iniciar Sesión</button>
            </form>
            <form action="./index.php?page=inicio" method="get" class="text-center mt-3">
                <button type="submit" class="btn btn-secondary mx-2">Cancelar</button>
            </form>
        </div>
    </div>
</div>