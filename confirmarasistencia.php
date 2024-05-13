<?php
// Verificamos si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  // Recibimos los datos del formulario
  $eventoAsistencia = $_POST['eventoAsistencia'];
  $nombreAsistente = $_POST['nombreAsistente'];
  $comentariosAsistente = $_POST['comentariosAsistente'];

  // Correo electrónico de destino
  $destinatario = "manuynay10@gmail.com";
  
  // Asunto del correo
  $asunto = "Confirmación de asistencia al evento: " . $eventoAsistencia;
  
  // Mensaje del correo
  $mensaje = "Confirmación de asistencia al evento: " . $eventoAsistencia . "\n\n";
  $mensaje .= "Nombre del asistente: " . $nombreAsistente . "\n";
  $mensaje .= "Comentarios adicionales: " . $comentariosAsistente . "\n";
  
  // Cabeceras del correo
  $cabeceras = "From: manuynay10@gmail.com" . "\r\n" .
               "Reply-To: manuynay10@gmail.com" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();
  
  // Enviamos el correo
  if (mail($destinatario, $asunto, $mensaje, $cabeceras)) {
    // Si el correo se envió con éxito, devolvemos una respuesta JSON
    echo json_encode(array("error" => false, "desc" => "Correo enviado con éxito"));
  } else {
    // Si hubo un error al enviar el correo, devolvemos una respuesta JSON con el error
    echo json_encode(array("error" => true, "desc" => "Error al enviar el correo"));
  }

} else {
  // Si no se envió el formulario por el método POST, devolvemos un mensaje de error
  echo json_encode(array("error" => true, "desc" => "El formulario no fue enviado correctamente"));
}
?>
