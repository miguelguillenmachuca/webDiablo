function validateEmail(email)
{
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    return re.test(String(email).toLowerCase());
}

function validateNombreRegex(nombre)
{
    var re = /^[a-zA-Z0-9_]*$/u;

    return re.test(String(nombre));
}

function validateNombreLength(nombre)
{
  if(nombre.length >= '5' && nombre.length <= '20')
  {
    return true;
  }
  else
  {
    return false;
  }
}

function validatePasswordRegex(password)
{
    var re = /^[a-zA-Z0-9_.-]*$/u;

    return re.test(String(password));
}

function validatePasswordLength(password)
{
  if(password.length >= '6' && password.length <= '20')
  {
    return true;
  }
  else
  {
    return false;
  }
}

$(document).ready(function () {

  // Comprobación del campo E-MAIL
  $('#email_register').on('input', function () {
    var errores = '';
    var email_correcto = validateEmail($('#email_register').val());

    $('#email_container').removeClass('has-error');

    if(email_correcto != true)
    {
      $('#email_container').addClass('has-error');
      errores = '<strong>El valor introducido no es válido</strong>';
    }

    $('#email_errors').html(errores);
  });

  // Comprobación del campo NOMBRE
  $('#name_register').on('input', function () {
    var errores = '';
    var nombre_regex_correcto = validateNombreRegex($('#name_register').val())

    $('#name_container').removeClass('has-error');

    if(nombre_regex_correcto != true)
    {
      $('#name_container').addClass('has-error');
      var errores = errores + 'El formato de nombre no es válido';
    }

    var nombre_length_correcto = validateNombreLength($('#name_register').val())

    if(nombre_length_correcto != true)
    {
      $('#name_container').removeClass('has-error');
      $('#name_container').addClass('has-error');

      if(errores != '')
      {
        errores = errores + '</br>';
      }

      var errores = errores + 'El nombre debe tener entre 5 y 20 caracteres';
    }

    if(errores != '')
    {
      errores = '<strong>' + errores + '</strong>';
    }

    $('#name_errors').html(errores);
  });

  // Comprobación del campo PASSWORD y el campo REPITE PASSWORD
  $('#password_register').on('input', function () {
    var errores = '';
    var password_regex_correcto = validatePasswordRegex($('#password_register').val())

    $('#password_container').removeClass('has-error');

    if(password_regex_correcto != true)
    {
      $('#password_container').addClass('has-error');
      var errores = errores + 'El formato de la contraseña no es válido';
    }

    var password_length_correcto = validatePasswordLength($('#password_register').val())

    if(password_length_correcto != true)
    {
      $('#password_container').removeClass('has-error');
      $('#password_container').addClass('has-error');

      if(errores != '')
      {
        errores = errores + '</br>';
      }

      var errores = errores + 'La contraseña debe tener entre 6 y 20 caracteres';
    }

    if(errores != '')
    {
      errores = '<strong>' + errores + '</strong>';
    }

    $('#password_errors').html(errores);
  });

  $('#password-confirm_register').on('input', function () {
    var errores = '';

    $('#password-confirm_container').removeClass('has-error');

    if($('#password-confirm_register').val() != $('#password_register').val())
    {
      $('#password-confirm_container').addClass('has-error');

      errores = errores + '<strong>La contraseña debe coincidir en los dos campos</strong>';
    }

    $('#password-confirm_errors').html(errores);
  });

});
