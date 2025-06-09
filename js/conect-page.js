document.addEventListener('DOMContentLoaded', () => {
    const loginBox = document.querySelector('.login-box');
    const createBox = document.querySelector('.create-account-box');
    document.querySelector('.switcher.to-create').addEventListener('click', () => {
        loginBox.classList.add('hidden');
        createBox.classList.remove('hidden');
    });
    document.querySelector('.switcher.to-log-in').addEventListener('click', () => {
        createBox.classList.add('hidden');
        loginBox.classList.remove('hidden');
    });

    document.getElementById('password-alt').addEventListener('click', () => {
        alert('Ce păcat :/');
    });

    document.querySelector('.sign-in').addEventListener('click', () => {
        const email = document.querySelector('.login-box .email').value.trim();
        const password = document.querySelector('.login-box .password').value;
        if (!email || !password) {
            alert('Completează emailul și parola!');
            return;
        }
        localStorage.setItem('user', JSON.stringify({ email }));
        window.location.href = 'account-page.html';
    });

    document.querySelector('.create-account-box .next').addEventListener('click', () => {
        const name = document.querySelector('.create-account-box .name').value.trim();
        const email = document.querySelector('.create-account-box .email').value.trim();
        const password = document.querySelector('.create-account-box .password').value;
        const rePassword = document.querySelector('.create-account-box .re-password').value;
        if (!name || !email || !password || !rePassword) {
            alert('Completează toate câmpurile!');
            return;
        }
        if (password !== rePassword) {
            alert('Parolele nu coincid!');
            return;
        }
        localStorage.setItem('user', JSON.stringify({ name, email }));
        window.location.href = 'account-page.html';
    });
});