document.querySelectorAll('.addToCart').forEach((form) => {
    form.addEventListener('submit', (event) => {
        event.preventDefault()
    
        ajax(form, '/Api/AddToCart.php')
    })
})