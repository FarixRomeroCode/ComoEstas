<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>
<main class="container p-4">
            <?php if (isset($_GET['id'])) { ?>
                <span>Porque?</span>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                        El id es   <?= $_GET['id'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            <?php 
                //Sacamos las preguntas anteriores
                $preg_anterior_id=$_GET['id'];
                $query = "SELECT * FROM cuadro_pregunta where preg_anterior ='$preg_anterior_id'";
                $cuadro_preguntas = mysqli_query($conn, $query);
                ?>
                <!-- <div class="col-md-8"> -->
                
                
                <?php
                while ($row = mysqli_fetch_assoc($cuadro_preguntas)) { 
                    if($row['tipo_preg']==2){
                        ?>
                         <div class="card card-body">
                            <a href="hoyestoy.php?id=<?php echo $row['id'] ?>" class="btn-secondary">
                                <?php echo $row['descripcion']; ?>
                            </a>
                         </div>
                        
                        <?php
                    }else{               
                    ?>
                    <div class="card card-body">
                        <a href="comoestoy.php?id=<?php echo $row['id'] ?>" class="btn-secondary">
                            <?php echo $row['descripcion']; ?>
                        </a>
                    </div>
                <?php              }
                     }


            }else{
              
                
                
            ?>

    <div class="col-md-8">
            <?php
                        $query = "SELECT * FROM cuadro_pregunta where preg_anterior is null";
                        $cuadro_preguntas = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_assoc($cuadro_preguntas)) { ?>
                            <div class="card card-body">
                                <a href="comoestoy.php?id=<?php echo $row['id'] ?>" class="btn-secondary">
                                    <?php echo $row['descripcion']; ?>
                                </a>
                            </div>
                        <?php } ?>

    </div>
    <?php }?>
</main>

<? include("includes/footer.php"); ?>