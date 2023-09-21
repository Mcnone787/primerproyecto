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


// <i class="fa-solid fa-pause"></i>
btn_start_end.addEventListener("click",musica)
 function musica(){
    let ClassBtn=btn_start_end.className;
    let interval_main2
    console.log()
    switch(ClassBtn){
        case "fa-solid fa-play":
        if(titulo_cancion!=titulo_cancion_ant && titulo_cancion!=""){
            audio.src = "https://dl.dropbox.com/scl/fi/987v9h1szj5hk6iwkdybh/Domestic-Girlfriend-Opening.mp3?rlkey=od6nli4f163sgkg5s3h2hcfnh&dl=0";
            titulo_cancion_ant=titulo_cancion
            
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
        div_global.className+=" invisible"
        div_rep.classList.remove("invisible")
    })
}
btn_cerrar_rep.addEventListener("click",()=>{
    div_rep.className+=" invisible"
        div_global.classList.remove("invisible")
})
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

    const nextURL = "http://localhost:8080/index.php?prueba=2";
    const nextTitle = 'My new page title';
    const nextState = { additionalInformation: 'Updated the URL with JS' };
    
    // This will create a new entry in the browser's history, without reloading
    window.history.pushState(nextState, nextTitle, nextURL);
    
    // This will replace the current entry in the browser's history, without reloading
    window.history.replaceState(nextState, nextTitle, nextURL);
   })
})

