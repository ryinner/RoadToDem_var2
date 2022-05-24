const form = document.forms.login

form.addEventListener('submit', (event) => {
    event.preventDefault()

    ajax(form, '/Api/Login.php', 'index')
})