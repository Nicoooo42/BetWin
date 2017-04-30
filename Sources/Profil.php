<?php include('Partials/_header.php'); ?>
<?php include('Partials/_nav.php'); ?>



<div class="container">


    <div class="row"></div>

        <div class="col-md-6">

            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Panel title</h3>
              </div>
              <div class="panel-body">
                  Image<br>
                  Pseudo<br>
                  Email
              </div>
            </div>

        </div>

    <div class="col-md-6">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Panel title</h3>
            </div>
            <div class="panel-body">


                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="name">Nom:</label>
                        <input type="text" id="name" name="name" value="TTTT" class="form-control" required/>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="name">Prenom:</label>
                        <input type="text" class="form-control" id="prenom" name="prenom"/>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="name">Ville:</label>
                        <input type="text" id="name" name="name" class="form-control" required/>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="name">Sexe</label>
                        <input type="text" class="form-control" id="prenom" name="prenom"/>
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="form-group">
                        <label for="bio">Biographie</label><br>
                <textarea name="bio" rows="5" cols="60" name="contenu"></textarea>
                    </div>
                </div>








            </div>






        </div>

    </div>

    </div>

</div>

<?php include('Partials/_foot.php'); ?>


