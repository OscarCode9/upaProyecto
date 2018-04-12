<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Mostrar visita</title>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" href="bustras/css/bootstrap.css">
  <link rel="stylesheet" href="bustras/css/bootstrap-theme.css">
  <link rel="stylesheet" href="bustras/css/estilos.css">
  <link rel="stylesheet" href="style.css">
  <link rel=icon href='img/logo-icon.png' sizes="32x32" type="image/png">
</head>

<body>
  <div class="container contenedor_principal">
    <br>
    <header>
      <nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
        <!-- navbar-fixed-top o bottom ocupa el 100$ independientemente de si lo encierras en un container -->
        <!-- Si se utiliza el fixed top entonces tienes que agregar padding al body para que se muestre el texto debajo del nav -->
        <div class="container-fluid">
          <div class="navbar-header">
            <a href="#" class="navbar-brand">Health Center Management</a>
          </div>
          <div class="collapse navbar-collapse" id="navbar1">
            <!-- id tiene que ser igual que el que pusiste en el data-target, solo que en este se le añade # -->
            <ul class="nav navbar-nav">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Modulo Lalo
                  <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="http://localhost/slim-json-heroku/vistas/index.html">Inicio</a>
                      </li>
                    <li>
                        <a href="form_pacientes.html">Agregar nuevo paciente</a>
                      </li>
                      <li>
                        <a href="MostrarDatos.html">Mostrar todos los pacientes</a>
                      </li>
    
                      <li>
                        <a href="form_visitas.html">Agregar visita</a>
                      </li>
    
                      <li>
                        <a href="buscarPaciente.html">Buscar paciente</a>
                      </li>
                </ul>
              </li>

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Modulo Betty
                  <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a href="">Cosa Modulo #1</a>
                  </li>
                  <li>
                    <a href="">Cosa Modulo #2</a>
                  </li>
                  <li role="separator" class="divider"></li>
                  <li>
                    <a href="">Cosa Modulo #4</a>
                  </li>
                </ul>
              </li>

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Modulo Zuñiga
                  <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a href="">Cosa Modulo #1</a>
                  </li>
                  <li>
                    <a href="">Cosa Modulo #2</a>
                  </li>
                  <li role="separator" class="divider"></li>
                  <li>
                    <a href="">Cosa Modulo #4</a>
                  </li>
                </ul>
              </li>
            </ul>
            <!-- terminan bottones -->
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown
                  <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a href="">Cosa Modulo #1</a>
                  </li>
                  <li>
                    <a href="">Cosa Modulo #2</a>
                  </li>
                  <li class="divider"></li>
                  <li>
                    <a href="">Cosa Modulo #4</a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <div class="container">
      <h3>Visitas por pacientes</h3>
      <table class="table table-condensed table-hover">
        <!--Striped es alternar colores de tabla y table-condensed para tablas apretaditasxd -->
        <tr class="active">
          <th>ID</th>

          <th>Fecha</th>
          <th>Peso</th>
          <th>Talla</th>
          <th>Cm. Cintura</th>
          <th>Cm. Cadera</th>
          <th>Presion Arterial</th>
          <th>IMC</th>
          <th>ICC</th>
          <th>Sintomatologia</th>
          <th>Recomendaciones</th>
          <th>Progreso</th>
          <th>Comentarios</th>
          <th>ID dieta</th>
          <th>Modificar/Eliminar</th>

        </tr>
        <!-- clases succeed info warning y danger son colorsitos -->

      </table>
      <br>



      <div id="antece"></div>
    </div>

  </div>






  <script src="bustras/js/jquery.min.js"></script>
  <script src="bustras/js/bootstrap.js"></script>

  <script>
    async function eliminarPorid(id) {
      const method = {
        method: 'delete'
      };
      const url = `http://localhost/slim-json-heroku/modulo1/eliminarVisitaPorId/${id}`
      await fetch(url, method);

    }
    function getParameterByName(name, url) {
      if (!url) url = window.location.href;
      name = name.replace(/[\[\]]/g, "\\$&");
      var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
      if (!results) return null;
      if (!results[2]) return '';
      return decodeURIComponent(results[2].replace(/\+/g, " "));
    }

    $(document).ready(function () {

      async function todasLasVisitas() {

        const id = getParameterByName('id');
        const genero = getParameterByName('genero');
        const result = await fetch('http://localhost/slim-json-heroku/modulo1/visitasPorPaciente/' + id);
        const visitas = await result.json();
        
        visitas.forEach(visita => {
          const talla = visita.talla;

          if (visita.imc < 18.5) {
            visita.imc = 'Bajo Peso';
          } else if (visita.imc >= 18.5 && visita.imc <= 24.9) {
            visita.imc = 'Peso Normal';
          } else if (visita.imc >= 25 && visita.imc <= 29.9) {
            visita.imc = 'Sobre peso';
          } else if (visita.imc >= 30 && visita.imc <= 39.9) {
            visita.imc = 'Obesidad';
          } else if (visita.imc > 40) {
            visita.imc = 'Obesidad Extrema';
          }

          if (genero === 'Femenino') {
            if (talla <= 88) {
              if (visita.icc < 25) {
                visita.icc = 'Aumentado';
              }

              if (visita.icc >= 25 && visita.icc <= 29.9) {
                visita.icc = 'Aumentado';

              } else if (visita.icc >= 30 && visita.icc <= 34.9) {
                visita.icc = 'Alto';

              } else if (visita.icc >= 35 && visita.icc <= 39.9) {
                visita.icc = 'Muy alto';

              } else if (visita.icc > 40) {
                visita.icc = 'Extremadamente Alto';

              }

            } else if (talla > 88) {
              if (visita.icc < 25) {
                visita.icc = 'Aumentado';
              }
              if (visita.icc >= 25 && visita.icc <= 29.9) {
                visita.icc = 'Alto';

              } else if (visita.icc >= 30 && visita.icc <= 34.9) {
                visita.icc = 'Muy alto';

              } else if (visita.icc >= 35 && visita.icc <= 39.9) {
                visita.icc = 'Muy alto';

              } else if (visita.icc > 40) {
                visita.icc = 'Extremadamente Alto';

              }


            }

          } else if (genero === 'Masculino') {
            if (talla <= 102) {

              if (visita.icc < 23) {
                visita.icc = 'Aumentado';
              }

              if (visita.icc >= 25 && visita.icc <= 29.9) {
                visita.icc = 'Aumentado';

              } else if (visita.icc >= 30 && visita.icc <= 34.9) {
                visita.icc = 'Alto';

              } else if (visita.icc >= 35 && visita.icc <= 39.9) {
                visita.icc = 'Muy alto';

              } else if (visita.icc > 40) {
                visita.icc = 'Extremadamente Alto';

              }

            } else if (talla > 102) {
              if (visita.icc < 25) {
                visita.icc = 'Aumentado';
              }

              if (visita.icc >= 25 && visita.icc <= 29.9) {
                visita.icc = 'Alto';

              } else if (visita.icc >= 30 && visita.icc <= 34.9) {
                visita.icc = 'Muy alto';

              } else if (visita.icc >= 35 && visita.icc <= 39.9) {
                visita.icc = 'Muy alto';

              } else if (visita.icc > 40) {
                visita.icc = 'Extremadamente Alto';

              }

            }


          }



          const registros = `
						<tr id="${visita.idvisita}">
							
							<td>${visita.idvisita}</td>
							<td>${visita.fecha}</td>
							<td>${visita.peso}</td>
							<td>${visita.talla}</td>
							<td>${visita.cent_cintura}</td>
							<td>${visita.cent_cadera}</td>
							<td>${visita.presion_arte}</td>
							<td>${visita.imc}</td>
							<td>${visita.icc}</td>
							<td>${visita.sintomatologia}</td>
							<td>${visita.recomendaciones}</td>
							<td>${visita.progreso}</td>
							<td>${visita.comentarios_gen}</td>
							<td>${visita.FK_iddieta_dietas}</td>
							
				
							<td>
								<a href="" onclick="eliminarPorid(${visita.idvisita})" class="btn btn-danger">Eliminar</a>
                <a href="editarVisita2.php?id=${visita.idvisita}" class="btn btn-primary">Editar</a>
							</td>
						</tr>`;

          const antece = `
					    <p><strong>ID </strong> ${visita.idvisita}</p><br>
						<p><strong>Fecha:</strong> ${visita.fecha}</p><br>
						<p><strong>Peso:</strong> ${visita.peso}</p><br>
						<p><strong>Talla:</strong> ${visita.talla}</p><br>
						<p><strong>Cm Cintura:</strong> ${visita.cent_cintura}</p><br>
						<p><strong>Cm Cadera: </strong> ${visita.cent_cadera}</p><br>
						<p><strong>Presion arterial:</strong> ${visita.presion_arte}</p><br>
						<p><strong>IMC </strong> ${visita.imc}</p><br>
						<p><strong>ICC </strong> ${visita.icc}</p><br>
						<p><strong>Sintomatologia </strong> ${visita.sintomatologia}</p><br>
						<p><strong>Recomendaciones</strong> ${visita.recomendaciones}</p><br>
						<p><strong>Progreso</strong> ${visita.progreso}</p><br>
						<p><strong>Comentarios</strong> ${visita.comentarios_gen}</p><br>
					`;

          $('.table').append(registros);



        });

      }

      todasLasVisitas();



    });





  </script>
</body>

</html>