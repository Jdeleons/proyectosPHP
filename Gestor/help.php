<script>
  $(document).ready(function(){

  $('#seccionArchivos').on('change', function(){

      var tu_variable = $(this).val();


      $.ajax({
              url: "../categorias/pruebas.php",
              type: "POST",
              async: true,
              data: {
                tu_variable : tu_variable} ,
                    success: function(result) {
                       $('#resultado').html(result);

                    },
                    error: function(result) {

                  $('#resultado').html('Se ha producido un error.');
                    }
              });

      })
  });
</script>


