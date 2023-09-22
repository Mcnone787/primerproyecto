let btn_start_end=document.getElementById("btn_start")
let cancionesclick=document.getElementsByClassName("cancion")
let div_rep=document.getElementById("div_repr")
let div_global=document.getElementById("div_global")
let barra_audio=document.getElementById("prueba")
let btn_cerrar_rep=document.getElementById("btn_repro_cerrar")
var audio = new Audio();
let count=0
let start_pausa=false
let titulo_cancion
let titulo_cancion_ant
let interval_main
let cancion_index=0

// <i class="fa-solid fa-pause"></i>
btn_start_end.addEventListener("click",musica)
 function musica(){
    let ClassBtn=btn_start_end.className;
    let interval_main2
    console.log()
    switch(ClassBtn){
        case "fa-solid fa-play":
        if(titulo_cancion!=titulo_cancion_ant && titulo_cancion!=""){
            if(jsonJS.titulo_cancion.indexOf(titulo_cancion)==-1){

            }else{
                cancion_index=jsonJS.titulo_cancion.indexOf(titulo_cancion)
                audio.src = jsonJS.cancionssrc[cancion_index]
                titulo_cancion_ant=titulo_cancion
            }
          
            
        }
        start_pausa=true
        btn_start.className="fa-solid fa-pause"
        console.log(audio.currentTime)

        audio.play();  
        

        interval_main=setInterval(barra,1000)
    
        break;
        case "fa-solid fa-pause":
            btn_start.className="fa-solid fa-play"
            audio.pause()
            start_pausa=false
        clearInterval(interval_main)    
        break;
    }
    
 }
for(i=0;i<cancionesclick.length;i++){
    cancionesclick[i].addEventListener("click",(e)=>{
        nombrecancion=e.currentTarget.textContent
        titulo_cancion= nombrecancion

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
    }else{
        
        if(barra_audio.value>=audio.duration){
            
            barra_audio.value=0
            titulo_cancion=""
            console.log("entra")
            clearInterval(interval_main)
        }else{
            
            barra_audio.value= audio.currentTime
        }
    }
    
}
let playlistClicked=document.querySelectorAll(".playlist_");
let playlist
playlistClicked.forEach(i=>{
  i.addEventListener("click",()=>{
    playlist=i.textContent
   })
})



