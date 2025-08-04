// helper to show messages

function showMsg(el, text, color = 'red') {

  el.textContent = text;

  el.style.color = color;

}

// IMAGE PREVIEW & “CROPPING”

function handleImagePreview(inputId, imgEl) {

  const inp = document.getElementById(inputId);

  inp.addEventListener('change', function(){

    const file = this.files[0];

    if (!file) return;

    const reader = new FileReader();

    reader.onload = function(e) {

      imgEl.src = e.target.result;

      imgEl.style.display = 'block';

      // save dataURL for profile page

      localStorage.setItem('avatarData', e.target.result);

    };

    reader.readAsDataURL(file);

  });

}

document.addEventListener('DOMContentLoaded', function(){

  const path = window.location.pathname.split('/').pop();

  if (path === 'index.html' || path === '') {

    // --- EDIT FORM PAGE ---

    const form = document.getElementById('profileForm');

    const msg = document.getElementById('msg');

    const previewImg = document.getElementById('previewImg');

    // if returning from edit, prefill

    if (localStorage.getItem('name')) {

      document.getElementById('name').value = localStorage.getItem('name');

      document.getElementById('email').value = localStorage.getItem('email');

      // preview old avatar

      const saved = localStorage.getItem('avatarData');

      if (saved) {

        previewImg.src = saved;

        previewImg.style.display = 'block';

      }

    }

    // hook image input

    handleImagePreview('avatar', previewImg);

    form.addEventListener('submit', function(e){

      e.preventDefault();

      const name = document.getElementById('name').value.trim();

      const email= document.getElementById('email').value.trim();

      const pwd  = document.getElementById('password').value.trim();

      const avatar = localStorage.getItem('avatarData');

      if (!name||!email||!pwd||!avatar) {

        return showMsg(msg, 'All fields & picture are required.');

      }

      if (!email.includes('@')||!email.includes('.')) {

        return showMsg(msg, 'Enter a valid email.');

      }

      if (pwd.length < 6) {

        return showMsg(msg, 'Password must be ≥6 chars.');

      }

      // SAVE to localStorage

      localStorage.setItem('name', name);

      localStorage.setItem('email', email);

      localStorage.setItem('password', pwd);

      // redirect

      window.location.href = 'profile.html';

    });

  } else if (path === 'profile.html') {

    // --- PROFILE DISPLAY PAGE ---

    const n = localStorage.getItem('name');

    const e = localStorage.getItem('email');

    const pic = localStorage.getItem('avatarData');

    if (!n || !e || !pic) {

      // nothing saved → go back

      return window.location.href = 'index.html';

    }

    document.getElementById('showName').textContent = n;

    document.getElementById('showEmail').textContent = e;

    document.getElementById('pic').src = pic;

    document.getElementById('editBtn').addEventListener('click', function(){

      window.location.href = 'index.html';

    });

    document.getElementById('forgotBtn').addEventListener('click', function(){

      const newPwd = ('Enter new password (≥8 chars):');

      if (newPwd && newPwd.length >= 6) {

        localStorage.setItem('password', newPwd);

        showMsg(document.getElementById('pwdMsg'),

                'Password updated successfully!', 'green');

      } else {

        alert('Password too short or canceled.');

      }

    });

  }

});