<form method="POST">

  <div class="change_password">
    <label for="my_password">Mi nueva Contraseña</label>
    <input type="password" name="my_password" id="my_password">
    <label for="confirm_my_password">Confirmar Contraseña</label>
    <p id="see_password" style="cursor: pointer">Ver contraseña</p>
    <input type="password" name="confirm_my_password" id="confirm_my_password">
    <button type="submit" name="btn-change-password">Aplicar Cambios</button>
    <p id="warning_password" style="display:none; color: red;"><strong>Las contrseñas insertadas no coinciden</strong></p>
  </div>

</form>

<?php

if(isset($_POST['btn-change-password'])) {

  $current_user = wp_get_current_user();
  $user_login = $current_user->user_login;

  $my_pass = $_POST['my_password'];
  $confirm_my_pass = $_POST['confirm_my_password'];

  if($my_pass === $confirm_my_pass){
    $sql = "UPDATE wp_users SET user_pass = MD5(\'$confirm_my_pass\') WHERE wp_users.ID = '$user_login' ";
    $query_recibo_pago = $wpdb->get_results($sql);
  }else{
    echo "<script>document.getElementById('warning_password').style.display='block'</script>";
  }

  echo "<script>function show() {
    var p = document.getElementById('my_password');
    p.setAttribute('type', 'text');
}

function hide() {
    var p = document.getElementById('my_password');
    p.setAttribute('type', 'password');
}

var pwShown = 0;

document.getElementById('see_password').addEventListener('click', function () {
    if (pwShown == 0) {
        pwShown = 1;
        show();
    } else {
        pwShown = 0;
        hide();
    }
}, false);</script>";

}