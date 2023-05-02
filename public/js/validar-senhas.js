const passwordField = document.getElementById('Password');
const confirmPasswordField = document.getElementById('Password2');
const submitButton = document.getElementById('submit');

// adicionando um ouvinte de eventos ao campo de confirmação de senha
confirmPasswordField.addEventListener('input', () => {
  // verificando se as senhas são iguais
  if (passwordField.value === confirmPasswordField.value) {
    // habilitando o botão de envio
    submitButton.disabled = false;
    // removendo a cor vermelha dos campos de senha
    passwordField.style.border = '1px solid #ccc';
    confirmPasswordField.style.border = '1px solid #ccc';
  } else {
    // desabilitando o botão de envio
    submitButton.disabled = true;
    // adicionando a cor vermelha aos campos de senha
    passwordField.style.border = '1px solid red';
    confirmPasswordField.style.border = '1px solid red';
  }
});
