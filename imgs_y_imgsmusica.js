// cargamos sliders staticos 
let imgs = ["maxresdefault", "pink-floyd-dark-side-of-the-moon-portada-significado"]
let slider = document.getElementById("slider")
let flechaiz = document.getElementById("flecha_slider_Iz")
let flechaD = document.getElementById("flecha_slider_D")
let i_slider = 0;
console.log(flechaiz)
console.log(flechaD)
flechaiz.addEventListener("click", () => {
    console.log("enra")
    if (i_slider <= 0) {
        i_slider = imgs.length - 1
    } else {
        i_slider--;
    }
    slider.setAttribute("src", "./imgs/" + imgs[i_slider] + ".jpg")

})

flechaD.addEventListener("click", () => {
    console.log("d")
    if (i_slider >= imgs.length - 1) {
        i_slider = 0
    } else {
        i_slider++;
    }
    slider.setAttribute("src", "./imgs/" + imgs[i_slider] + ".jpg")
})