function ajax (form, url, redirect = false) {
    const ajax = new XMLHttpRequest

    ajax.open('post', url)

    ajax.onload = function () {
        form.querySelector('.answer').innerHTML = ajax.responseText
        
        if (redirect !== false) {
            if (ajax.responseText == 'Успешно') {
                document.location.href = `/${redirect}.php`
            }
        }
    }
    ajax.send(new FormData(form))
}

class Slider {
    constructor() {
        this.n = 0,
        this.items = 2
    }

    run() {
        const slider = document.getElementById('slider')

        slider.querySelector('.slides').style.marginLeft = `-${slider.querySelector('.slide').offsetWidth * this.n}px`

        if (this.n < this.items) {
            this.n++
        } else {
            this.n = 0
        }
    }
}