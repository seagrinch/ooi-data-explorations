
      <hr>

      <footer>
        <p><small>This site was developed with the support of the National Science Foundation under Grant No. OCE-1550207. Any opinions, findings, and conclusions or recommendations expressed in this material are those of the authors and do not necessarily reflect the views of the National Science Foundation.</small></p>
        <p align="center">&copy; <?php echo date("Y")?> Rutgers University</p
      </footer>

    </div> <!-- /container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="<?=$base_url?>js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?=$base_url?>lightbox/ekko-lightbox.js"></script>
    <script>
      $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
       });
    </script>

    <?php 
      // Load scripts specified in each page
      if (isset($scripts)) {
        foreach ($scripts as $script) {
          echo '<script src="' . $script . '"></script>';
        }
      }
    ?>

  </body>
</html>






