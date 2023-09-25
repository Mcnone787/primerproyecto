let btn_start_end=document.getElementById("btn_start")
let cancionesclick=document.getElementsByClassName("cancion")
let div_rep=document.getElementById("div_repr")
let div_global=document.getElementById("div_global")
let barra_audio=document.getElementById("prueba")
let btn_cerrar_rep=document.getElementById("btn_repro_cerrar")
let nextbtn=document.getElementById("next")
var audio = new Audio();
let count=0
let interval_main
let cancion_index=0
let index_anterior_cancion
let backbtn=document.getElementById("back")
let elementcancionsonando
let cambioscolorant
let cancionsonado=false
let imgsongsrep=document.getElementById("img_songs")
// <i class="fa-solid fa-pause"></i>

btn_start_end.addEventListener("click",musica)
 function musica(){
    let ClassBtn=btn_start_end.className;
    let interval_main2
    switch(ClassBtn){
        case "fa-solid fa-play":
            btn_start.className="fa-solid fa-pause"
            if(cancionsonado==false){
                playing_music()
                cancionsonado=true
            }

            playmusic()
        break;
        case "fa-solid fa-pause":
            stopmusic()   
        break;
    }
    
 }
for(i=0;i<cancionesclick.length;i++){
    cancionesclick[i].addEventListener("click",(e)=>{
        nombrecancion=e.currentTarget.textContent
        titulo_cancion= nombrecancion
        cancion_index=e.currentTarget.id
        playing_music()


    })
}

barra_audio.addEventListener("click",()=>{
    let value_=barra_audio.value
    audio.currentTime=value_
})

function barra(){
    if(count==0){
        barra_audio.setAttribute("max",audio.duration)   
        count++;
    }
        if(barra_audio.value>=parseInt(audio.duration)){            
            barra_audio.value=0
            titulo_cancion=""
            btn_start.className="fa-solid fa-play"
            clearInterval(interval_main)
            console.log("d")
        }else{
            
            barra_audio.value= audio.currentTime
        }
    
    
}



nextbtn.addEventListener("click",()=> {
    console.log("entraa")
    cancion_index++;
    if(cancion_index>jsonJS.titulo_cancion.length){
        cancion_index--;
    }
    playing_music()

   
})
backbtn.addEventListener("click",()=>{
    console.log("entraa")
    cancion_index--;
    if(cancion_index<0){
        cancion_index++;
    }
    playing_music()


})

function playing_music(){
    btn_start.className="fa-solid fa-pause"
    if(cancion_index>0){
        elementcancionsonando=document.getElementById(index_anterior_cancion)
        elementcancionsonando.style.background="#2c4d6c6e"
        elementcancionsonando=document.getElementById(cancion_index)
        elementcancionsonando.style.background="green"
        
    }else if(index_anterior_cancion==jsonJS.titulo_cancion.length-1 ){
        elementcancionsonando=document.getElementById(index_anterior_cancion)
        elementcancionsonando.style.background="#2c4d6c6e"
        elementcancionsonando=document.getElementById(cancion_index)
        elementcancionsonando.style.background="green"
    }
    else{
       
        elementcancionsonando=document.getElementById(cancion_index)
        elementcancionsonando.style.background="green"
    }
    index_anterior_cancion=cancion_index;
    audio.src = jsonJS.cancionssrc[cancion_index]
    
    barra_audio.value=audio.currentTime;
    playmusic()

    interval_main=setInterval(barra,1000)
}
function playmusic(){
    imgsongsrep.style.animationPlayState="running"

    audio.play()
}

function stopmusic(){
    btn_start.className="fa-solid fa-play"
    imgsongsrep.style.animationPlayState="paused"
    audio.pause()
}
