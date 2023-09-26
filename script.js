let btn_start_end=document.getElementById("btn_start")
let cancionesclick=document.getElementsByClassName("cancion")
let barra_audio=document.getElementById("prueba")
let btn_cerrar_rep=document.getElementById("btn_repro_cerrar")
let nextbtn=document.getElementById("next")
let imgsongsrep=document.getElementById("img_songs")
let backbtn=document.getElementById("back")
let random_btn=document.getElementById("random")
let stop_btn=document.getElementById("stop")
var audio = new Audio();
let interval_main
let cancion_index=0
let index_anterior_cancion=0
let elementcancionsonando
let cancionsonado=false


elementcancionsonando=document.getElementById(cancion_index)
elementcancionsonando.style.background="green"
imgsongsrep.style.animationPlayState="paused"


btn_start_end.addEventListener("click",musica)

//asignamos a todos los elementos un evento de click y cojemos sus ids por que lo aprovecharemos para usarlos como indices ^^
for(i=0;i<cancionesclick.length;i++){
    cancionesclick[i].addEventListener("click",(e)=>{
        cancion_index=e.currentTarget.id
        playing_music()
    })
}

//asignamos al elemento del DOM el input range con el eveno de click para poder ir avanzando la cancion y a mas a mas cojer el valor
//de la nueva posicion del puntero o.O
barra_audio.addEventListener("click",()=>{
    let value_=barra_audio.value
    audio.currentTime=value_
})

//asignamos evento de clic al boton de avanzar cancion incrementamos el indicie y vamos comprovando de no salirnos
nextbtn.addEventListener("click",()=> {
    cancion_index++;
    if(cancion_index>=jsonJS.titulo_cancion.length){
        cancion_index=0;
    }
    console.log("valor del indice "+cancion_index)
    playing_music()

})
//asignamos evento de clic al boton de avanzar para atras las canciones decrementamos el indicie y vamos comprovando de no salirnos
backbtn.addEventListener("click",()=>{
    cancion_index--;
    if(cancion_index<0){
        cancion_index++;
    }
    playing_music()

})

stop_btn.addEventListener("click",()=>{
    cancion_index=0
    audio.currentTime=0
    playing_music()
    stopmusic()
    clearInterval(interval_main)
    barra_audio.value=audio.currentTime
})

random_btn.addEventListener("click",()=>{
    cancion_index=Math.floor(Math.random()*jsonJS.titulo_cancion.length)
    while(cancion_index==index_anterior_cancion){
        cancion_index=Math.floor(Math.random()*jsonJS.titulo_cancion.length)
    }
    playing_music()
    
})
function musica(){
    let ClassBtn=btn_start_end.className;
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

function changeimgnya(){
    imgsongsrep.src=jsonJS.imgsrc[cancion_index]
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

function playing_music(){
    btn_start.className="fa-solid fa-pause"
    cancionsonado=true;
    if(cancionsonado==true){
        elementcancionsonando=document.getElementById(index_anterior_cancion)
        elementcancionsonando.style.background="#2c4d6c6e"
        elementcancionsonando=document.getElementById(cancion_index)
        elementcancionsonando.style.background="green"
        
    }else{
        elementcancionsonando=document.getElementById(index_anterior_cancion)
        elementcancionsonando=document.getElementById(cancion_index)
        elementcancionsonando.style.background="blue"
    }
    index_anterior_cancion=cancion_index;
    audio.src = jsonJS.cancionssrc[cancion_index]
    barra_audio.value=audio.currentTime;
    playmusic()
    changeimgnya()
    interval_main=setInterval(barra,1000)    
}
function barra(){
    
    barra_audio.setAttribute("max",audio.duration)   

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