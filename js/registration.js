const form = document.forms.registration

form.addEventListener('submit', (event) => {
    event.preventDefault()

    ajax(form, '/Api/Registration.php', 'login')
})