user_logged = localStorage.getItem('user');

if (user_logged) {
    document.getElementById('login-link').style.display = 'none';
    document.getElementById('logged-link').style.display = 'block';
} else {
    document.getElementById('login-link').style.display = 'block';
    document.getElementById('logged-link').style.display = 'none';
}