let imgU = document.querySelector('.img-sendiri')
let imgSrc = imgU.dataset.img; 
imgU.style.width = `40px`
imgU.style.height = `40px`
imgU.style.borderRadius = `50%`
imgU.style.backgroundImage = `url(${imgSrc})`
imgU.style.backgroundRepeat = `no-repeat`
imgU.style.backgroundPosition = `center center`
imgU.style.backgroundSize = `cover`
let gases = document.querySelector('#gases')
let gas = document.querySelector('#gas');
let price = document.querySelector('.price')
if(gas){
    gas.addEventListener('change', (e) => {
        if(e.target.value){
            price.value = document.querySelector(`.gas-${e.target.value}`).dataset.price
        }else{
            price.value = "";
        }
    })
}else if(gases){
    gases.addEventListener('change', (e) => {
        if(e.target.value){
            price.value = document.querySelector(`.gases-${e.target.value}`).dataset.price
        }else{
            price.value = "";
        }
    })
}