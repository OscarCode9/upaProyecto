<?php



use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

$app ->get('/modulo1/todosLosPacientes', function (Request $req, Response $res){
    
    $sql = "SELECT * FROM pacientes";

    try {

        $db = new db();
        $db = $db ->connect();
        $stmt = $db->query($sql);
        $Pacientes = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        return $res->withJson($Pacientes);


    } catch (PDOException $e){
        echo '{"errorr": {"text":'.$e->getMessage().'}';
    }

});



$app ->get('/modulo1/pacientePorId/{id}', function(Request $req, Response $res){
    
    $id = $req->getAttribute('id');
    $sql = "select * from pacientes WHERE idPaciente = $id";
    try {
        $db = new db();
        $db = $db -> connect();
        $stmt = $db -> query($sql);
        $Pacientes = $stmt -> fetchAll(PDO::FETCH_OBJ);
        $db = null;
        return $res->withJson($Pacientes);
        

    } catch (PDOException $e){
        echo '{"error": {"text":'.$e->getMessage().'}';
    }
});

$app ->delete('/modulo1/eliminarPorId/{id}', function (Request $req, Response $res){

    $id = $req->getAttribute('id');
    $sql = "DELETE FROM pacientes WHERE idPaciente = $id";

    try {
        $db = new db();
        $db = $db -> connect();
        $stmt = $db -> prepare($sql);       
        $stmt -> execute();
        echo '{"notice": {"text": "Customer delete"}';

    } catch (PDOException $e){
        echo '{"error": {"text":'.$e->getMessage().'}';
    }

});

$app -> post('/modulo1/actualizarPacientePorId/{id}', function(Request $req, Response $res){
    
    $id = $req->getAttribute('id');

    $method = $req->getMethod();
   

    $nombre= $req -> getParam('nombre');
    $apellidos= $req -> getParam('apellidos');
    $fecha_nacimiento= $req -> getParam('fecha_nacimiento');
    $estado_civil= $req -> getParam('estado_civil');
    $genero= $req -> getParam('genero');
    $domicilio= $req -> getParam('domicilio');
    $telefono= $req -> getParam('telefono');
    $celular= $req -> getParam('celular');
    $email= $req -> getParam('email');
    $ocupacion= $req -> getParam('ocupacion');
    $fecha_registro= $req -> getParam('fecha_registro');
    $enfs_here= $req -> getParam('enfs_here');
    $ant_no_pat= $req -> getParam('ant_no_pat');
    $ant_peri= $req -> getParam('ant_peri');
    $ant_gine= $req -> getParam('ant_gine');
    $ant_pat= $req -> getParam('ant_pat');


    $sql = "UPDATE `pacientes` SET
    `nombre` = :x0,
    `apellidos` = :x1,
    `fecha_nacimiento` = :x2 ,
    `estado_civil` = :x3,
    `genero` = :x4,
    `domicilio` = :x5,
    `telefono` = :x6,
    `celular` = :x7,
    `email` = :x8 ,
    `ocupacion` = :x9 ,
    `fecha_registro` = :x10,
    `enfs_here` = :x11,
    `ant_no_pat` = :x12,
    `ant_peri` = :x13,
    `ant_gine` = :x14,
    `ant_pat` = :x15
    WHERE `idpaciente` = $id ";

try {
    $db = new db();
    $db = $db ->connect();

    $stmt = $db -> prepare($sql);

    $stmt -> bindParam(':x0',$nombre);
    $stmt -> bindParam(':x1',$apellidos);
    $stmt -> bindParam(':x2',$fecha_nacimiento);
    $stmt -> bindParam(':x3',$estado_civil);
    $stmt -> bindParam(':x4',$genero );
    $stmt -> bindParam(':x5',$domicilio);
    $stmt -> bindParam(':x6',$telefono );
    $stmt -> bindParam(':x7',$celular);
    $stmt -> bindParam(':x8',$email);
    $stmt -> bindParam(':x9',$ocupacion );
    $stmt -> bindParam(':x10',$fecha_registro);
    $stmt -> bindParam(':x11',$enfs_here);
    $stmt -> bindParam(':x12',$ant_no_pat);
    $stmt -> bindParam(':x13',$ant_peri);
    $stmt -> bindParam(':x14',$ant_gine);
    $stmt -> bindParam(':x15',$ant_pat);
    

    $stmt -> execute();
    
    echo '{"notice": {"text": "Paciente actualizado"}';

} catch (PDOException $e){
    echo '{"error": {"text":'.$e->getMessage().'}';
}
});

$app ->post('/modulo1/agregarPaciente', function(Request $req, Response $res){
    
    //$fechaNacimiento = $req -> getParam('fechaNacimiento');
    

    $nombre = $req -> getParam('nombre');
    $apellidos = $req -> getParam('apellidos');
    $fecha_nacimiento = $req -> getParam('fecha_nacimiento');
    $estado_civil=$req -> getParam('estado_civil');
    $genero =$req -> getParam('genero');
    $domicilio =$req -> getParam('domicilio');
    $telefono =$req -> getParam('telefono');
    $celular =$req -> getParam('celular');
    $email =$req -> getParam('email');
    $ocupacion =$req -> getParam('ocupacion');
    $fecha_registro =$req -> getParam('fecha_registro');
    
    $enfs_here =$req -> getParam('enfs_here');
    $ant_no_pat =$req -> getParam('ant_no_pat');
    $ant_peri =$req -> getParam('ant_peri');
    $ant_gine =$req -> getParam('ant_gine');
    $ant_pat =$req -> getParam('ant_pat');


    $sql = "INSERT INTO `pacientes`
    (`idpaciente`,
    `nombre`,
    `apellidos`,
    `fecha_nacimiento`,
    `estado_civil`,
    `genero`,
    `domicilio`,
    `telefono`,
    `celular`,
    `email`,
    `ocupacion`,
    `fecha_registro`,
    `enfs_here`,
    `ant_no_pat`,
    `ant_peri`,
    `ant_gine`,
    `ant_pat`)
    VALUES
    (null, :x0, :x1, :x2, :x3, :x4, :x5, :x6,
    :x7, :x8,:x9, :x10, :x11, :x12, :x13,
    :x14, :x15)";
    
    try {
        $db = new db();
        $db = $db ->connect();

        $stmt = $db -> prepare($sql);

        //$stmt -> bindParam(':fechaNacimiento',$fechaNacimiento);
        $stmt -> bindParam(':x0',$nombre);
        $stmt -> bindParam(':x1',$apellidos);
        $stmt -> bindParam(':x2',$fecha_nacimiento);
        $stmt -> bindParam(':x3',$estado_civil);
        $stmt -> bindParam(':x4',$genero );
        $stmt -> bindParam(':x5',$domicilio);
        $stmt -> bindParam(':x6',$telefono );
        $stmt -> bindParam(':x7',$celular);
        $stmt -> bindParam(':x8',$email);
        $stmt -> bindParam(':x9',$ocupacion );
        $stmt -> bindParam(':x10',$fecha_registro);
        $stmt -> bindParam(':x11',$enfs_here);
        $stmt -> bindParam(':x12',$ant_no_pat);
        $stmt -> bindParam(':x13',$ant_peri);
        $stmt -> bindParam(':x14',$ant_gine);
        $stmt -> bindParam(':x15',$ant_pat);
        
        

        $stmt -> execute();
        return $res->withJson('{"notice": {"text": "Paciente agregado"}');
        
        

    } catch (PDOException $e){
        echo '{"error": {"text":'.$e->getMessage().'}';
    }
});


//API VISITAS

$app ->get('/modulo1/todasLasVisitas',function(Request $req, Response $res){
    $sql = "SELECT * FROM visitas";

    try {

        $db = new db();
        $db = $db ->connect();
        $stmt = $db->query($sql);
        $visitas = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        return $res->withJson($visitas);


    } catch (PDOException $e){
        echo '{"errorr": {"text":'.$e->getMessage().'}';
    }
});

$app ->get('/modulo1/buscarPaciente',function(Request $req, Response $res){
    $sql = 'SELECT CONCAT(`pacientes`.`idpaciente`,  " ",
                `pacientes`.`nombre`,  " ",
                `pacientes`.`apellidos`,  " ",
                `pacientes`.`fecha_nacimiento`,  " ",
                `pacientes`.`estado_civil`,  " ",
                `pacientes`.`genero`,  " ",
                `pacientes`.`domicilio`,  " ",
                `pacientes`.`telefono`,  " ",
                `pacientes`.`celular`,  " ",
                `pacientes`.`email`,  " ",
                `pacientes`.`ocupacion`,  " ",
                `pacientes`.`fecha_registro`,  " ",
                `pacientes`.`enfs_here`,  " ",
                `pacientes`.`ant_no_pat`,  " ",
                `pacientes`.`ant_peri`,  " ",
                `pacientes`.`ant_gine`,  " ",
                `pacientes`.`ant_pat`) as allInfo , idpaciente
            FROM `pacientes`';

    try {

        $db = new db();
        $db = $db ->connect();
        $stmt = $db->query($sql);
        $allInfo = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        return $res->withJson($allInfo);


    } catch (PDOException $e){
        echo '{"errorr": {"text":'.$e->getMessage().'}';
    }
});



//selecciona por el id del paciente
$app ->get('/modulo1/visitasPorPaciente/{id}', function(Request $req, Response $res){
    $id = $req->getAttribute('id');
    $sql = "select * from visitas WHERE FK_idpaciente_pacientes = $id";
    try {
        $db = new db();
        $db = $db -> connect();
        $stmt = $db -> query($sql);
        $Pacientes = $stmt -> fetchAll(PDO::FETCH_OBJ);
        $db = null;
        return $res->withJson($Pacientes);
        

    } catch (PDOException $e){
        echo '{"error": {"text":'.$e->getMessage().'}';
    }
});

$app ->get('/modulo1/visitasPorId/{id}', function(Request $req, Response $res){
    $id = $req->getAttribute('id');
    $sql = "select * from visitas WHERE idvisita = $id";
    try {

        $db = new db();
        $db = $db -> connect();
        $stmt = $db -> query($sql);
        $Visitas = $stmt -> fetchAll(PDO::FETCH_OBJ);
        $db = null;
        return $res->withJson($Visitas);
        

    } catch (PDOException $e){
        echo '{"error": {"text":'.$e->getMessage().'}';
    }
});

$app ->get('/modulo1/idDieta', function(Request $req, Response $res){
    $id = $req->getAttribute('id');
    $sql = "SELECT iddieta FROM dietas;";
    try {

        $db = new db();
        $db = $db -> connect();
        $stmt = $db -> query($sql);
        $idDieta = $stmt -> fetchAll(PDO::FETCH_OBJ);
        $db = null;
        return $res->withJson($idDieta);
        

    } catch (PDOException $e){
        echo '{"error": {"text":'.$e->getMessage().'}';
    }
});



//obtenemos los datos para insertarlos

$app ->post('/modulo1/agregarVisita/{idPaciente}', function(Request $req, Response $res){


    $idPaciente = $req->getAttribute('idPaciente');
    
    $fecha = $req -> getParam('fecha');
    $peso = (float)$req -> getParam('peso');
    $talla = (float)$req -> getParam('talla');
    $cent_cintura = (float)$req -> getParam('cent_cintura');
    $cent_cadera =(float)$req -> getParam('cent_cadera');
    $presion_arte =$req -> getParam('presion_arte');
    $imc = $peso / pow(2, $talla); 
    $icc = $cent_cintura / $cent_cadera;
    $sistematologia =$req -> getParam('sistematologia');
    $recomendacion =$req -> getParam('recomendacion');
    $progreso =$req -> getParam('progreso');
    $comentarios_gen =$req -> getParam('comentarios_gen');
    $FK_iddieta_dietas = (int)$req -> getParam('FK_iddieta_dietas');




    $sql = "INSERT INTO `visitas`
    (`idvisita`,
    `FK_idpaciente_pacientes`,
    `fecha`,
    `peso`,
    `talla`,
    `cent_cintura`,
    `cent_cadera`,
    `presion_arte`,
    `imc`,
    `icc`,
    `sintomatologia`,
    `recomendaciones`,
    `progreso`,
    `comentarios_gen`,
    `FK_iddieta_dietas`)
    VALUES
    (null,:x0, :x1, :x2, :x3, :x4, :x5, :x6, :x7, :x8, :x9, :x10, :x11, :x12, :x13)";
    
    try {
        $db = new db();
        $db = $db ->connect();

        $stmt = $db -> prepare($sql);


        $stmt -> bindParam(':x0',$idPaciente);
        $stmt -> bindParam(':x1',$fecha);
        $stmt -> bindParam(':x2',$peso);
        $stmt -> bindParam(':x3',$talla);
        $stmt -> bindParam(':x4',$cent_cintura);
        $stmt -> bindParam(':x5',$cent_cadera);
        $stmt -> bindParam(':x6',$presion_arte);
        $stmt -> bindParam(':x7',$imc);
        $stmt -> bindParam(':x8',$icc);
        $stmt -> bindParam(':x9',$sistematologia);
        $stmt -> bindParam(':x10',$recomendacion);
        $stmt -> bindParam(':x11',$progreso);
        $stmt -> bindParam(':x12',$comentarios_gen);
        $stmt -> bindParam(':x13',$FK_iddieta_dietas);
        
        
        

        $stmt -> execute();
        return $res->withJson('{"notice": {"text": "Visita agregada"}');
        
        

    } catch (PDOException $e){
        echo '{"error": {"text":'.$e->getMessage().'}';
    }
});


$app ->delete('/modulo1/eliminarVisitaPorId/{id}', function(Request $req, Response $res){
    $id = $req->getAttribute('id');
    $sql = "DELETE from visitas WHERE idvisita = $id";
    try {
        $db = new db();
        $db = $db -> connect();
        $stmt = $db -> prepare($sql);       
        $stmt -> execute();
        echo '{"notice": {"text": "Customer delete"}';

    } catch (PDOException $e){
        echo '{"error": {"text":'.$e->getMessage().'}';
    }
});



$app -> post ('/modulo1/actualizarPorId/{id}', function(Request $req, Response $res){

    $id = $req->getAttribute('id');

    
    
    $fecha = $req -> getParam('fecha');
    $peso = (float)$req -> getParam('peso');
    $talla = (float)$req -> getParam('talla');
    $cent_cintura = (float)$req -> getParam('cent_cintura');
    $cent_cadera =(float)$req -> getParam('cent_cadera');
    $presion_arte =$req -> getParam('presion_arte');
    $imc = $peso / pow(2, $talla); 
    $icc = $cent_cintura / $cent_cadera;
    $sistematologia =$req -> getParam('sistematologia');
    $recomendacion =$req -> getParam('recomendacion');
    $progreso =$req -> getParam('progreso');
    $comentarios_gen =$req -> getParam('comentarios_gen');
    $FK_iddieta_dietas = (int)$req -> getParam('FK_iddieta_dietas');

    $sql = "UPDATE `visitas`
                SET
                `fecha` = :x1,
                `peso` = :x2,
                `talla` = :x3,
                `cent_cintura` = :x4,
                `cent_cadera` = :x5,
                `presion_arte` = :x6,
                `imc` = :x7,
                `icc` = :x8,
                `sintomatologia` = :x9,
                `recomendaciones` = :x10,
                `progreso` = :x11,
                `comentarios_gen` = :x12,
                `FK_iddieta_dietas` = :x13
            WHERE `idvisita` = $id";

    try {
        $db = new db();
        $db = $db ->connect();

        $stmt = $db -> prepare($sql);


        $stmt -> bindParam(':x1',$fecha);
        $stmt -> bindParam(':x2',$peso);
        $stmt -> bindParam(':x3',$talla);
        $stmt -> bindParam(':x4',$cent_cintura);
        $stmt -> bindParam(':x5',$cent_cadera);
        $stmt -> bindParam(':x6',$presion_arte);
        $stmt -> bindParam(':x7',$imc);
        $stmt -> bindParam(':x8',$icc);
        $stmt -> bindParam(':x9',$sistematologia);
        $stmt -> bindParam(':x10',$recomendacion);
        $stmt -> bindParam(':x11',$progreso);
        $stmt -> bindParam(':x12',$comentarios_gen);
        $stmt -> bindParam(':x13',$FK_iddieta_dietas);
        
        
        

        $stmt -> execute();
        return $res->withJson('{"notice": {"text": "Visita actualizar"}');
        
        

    } catch (PDOException $e){
        echo '{"error": {"text":'.$e->getMessage().'}';
    }
    

});