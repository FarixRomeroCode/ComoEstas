<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
    <div class="row">
        <div class="col-md-4">
            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php session_unset();
            } ?>



            <div class="card card-body">
                <form action="agregar_caja.php" method="POST">
                    <div class="form-group">
                        <input type="number" name="tipo_preg" class="form-control" placeholder="Tipo de Pregunta" autofocus required>

                    </div>
                    <div class="form-group">
                        <input type="number" name="preg_anterior" class="form-control" placeholder="ID de pregunta anterior" autofocus>

                    </div>

                    <div class="form-group">
                        <textarea name="descripcion" rows="2" class="form-control" placeholder="Descripcion de pregunta" required></textarea>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="save_task" value="Save Task">
                </form>
            </div>

        </div>

        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Pregunta ID</th>
                        <th>TipoPregunta</th>
                        <th>PreguntaAnterior</th>
                        <th>Descripcion</th>
                        <th>Creado En</th>
                        <!-- <th>Action</th> -->
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $query = "SELECT * FROM cuadro_pregunta";
                    $cuadro_preguntas = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_assoc($cuadro_preguntas)) { ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>

                            <td><?php echo $row['tipo_preg']; ?></td>
                            <td><?php echo $row['preg_anterior']; ?></td>
                            <td><?php echo $row['descripcion']; ?></td>
                            <td><?php echo $row['created_at']; ?></td>
                            <!-- <td>
                                <a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary">
                                    <i class="fas fa-marker"></i>
                                </a>
                                <a href="delete_task.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                                </td> -->
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
    </div>
</main>

<? include("includes/footer.php"); ?>