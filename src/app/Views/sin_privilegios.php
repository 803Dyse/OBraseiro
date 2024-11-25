  <?= $this->include('templates/header') ?>
<style>
    body {
        background-color: #1a1a1a;
    }
</style>
    <div class="flex items-center justify-center min-h-screen">
        <div class="text-center">
            <h1 class="text-4xl font-bold mb-4 text-red-500">Acceso Restringido</h1>
            <p class="text-lg text-red-200">No tienes privilegios de usuario para acceder al contenido de esta vista.</p>
        </div>
    </div>

    <?= $this->include('templates/footer') ?>