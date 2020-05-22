function toggleEmailEdit() {
  let elem = document.getElementById('inputEmail');
  let confirm = document.getElementById('inputPassword');
  if (elem.hasAttribute('readonly')) {
    elem.removeAttribute('readonly')
  } else {
    elem.setAttribute('readonly', '')
  }
  if (confirm.hasAttribute('readonly')) {
    confirm.removeAttribute('readonly');
    confirm.setAttribute('placeholder', 'confirm new mail with your password');
  } else {
    confirm.setAttribute('readonly', '');
    confirm.removeAttribute('placeholder');
  }
}

function togglePasswordEdit() {
  let pass = document.getElementById('inputPassword');
  let conf = document.getElementById('confirmPasswordGroup');
  if (pass.hasAttribute('readonly')) {
    pass.removeAttribute('readonly');
    pass.setAttribute('placeholder', 'insert new password');
    conf.setAttribute('class', 'input-group mb-3 ')
  } else {
    pass.setAttribute('readonly', '');
    pass.removeAttribute('placeholder');
    conf.setAttribute('class', 'd-none');
  }
}