
      <hr>

      <footer>
        <p><small>This site was developed with the support of the National Science Foundation under Grants OCE-1550207 and OCE-1649637. Any opinions, findings, and conclusions or recommendations expressed in this material are those of the authors and do not necessarily reflect the views of the National Science Foundation.</small></p>
        <p align="center">&copy; 2016-2019<?php //echo date("Y")?> Rutgers University</p
      </footer>

    </div> <!-- /container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="<?=$base_url?>js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?=$base_url?>js/holder.min.js"></script>
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

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
    
      ga('create', 'UA-48897328-3', 'auto');
      ga('send', 'pageview');
    
    </script>

  </body>
</html>






