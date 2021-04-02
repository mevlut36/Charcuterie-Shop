
            <form method="POST" action="data_bio.php" class="bg-light p-5 contact-form" enctype="multipart/form-data">
                <label for="fileUpload">Fichier:</label>
                <input type="file" name="photo" id="fileUpload">
                <p><strong>Note:</strong> Seuls les formats .jpg, .jpeg, .jpeg, .png sont autorisés jusqu'à une taille maximale de 5 Mo.</p>
              <div class="form-group">
                <input  name="nom" type="text" required class="form-control" placeholder="Nom du Sheikh/Mufti/Imam">
              </div>
              <div class="form-group">
                <textarea name="texte" required cols="30" rows="7" class="form-control" placeholder="Texte"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" name="submit" value="METTRE EN LIGNE" class="btn btn-primary py-3 px-5">
              </div>
            </form>