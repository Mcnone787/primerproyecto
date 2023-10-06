let btn_start_end=document.getElementById("btn_start")
let cancionesclick=document.getElementsByClassName("cancion")
let barra_audio=document.getElementById("prueba")
let btn_cerrar_rep=document.getElementById("btn_repro_cerrar")
let nextbtn=document.getElementById("next")
let imgsongsrep=document.getElementById("img_songs")
let backbtn=document.getElementById("back")
let random_btn=document.getElementById("random")
let stop_btn=document.getElementById("stop")
let titulo_cancion=document.getElementById("titulo")
let autores_cancion=document.getElementById("autores")
let timerepro=document.getElementById("time_repro")
let back_audiofal=document.getElementById("audio_falso")
let total_time_=document.getElementById("total_time_song")
var audio = new Audio();
let interval_main
let cancion_index=0
let index_anterior_cancion=0
let elementcancionsonando
let cancionsonado=false
let cargado=false;
let playlistcookies
let date_main=new Date();
if(getCookie("Playlists")==""){
}else{
    playlistcookies=JSON.parse(getCookie("Playlists"))
    console.log("entra uiii")
    // if(playlistcookies.playlist.indexOf(jsonJS.playlistNombre)!=-1){
    //     playlistcookies.fecha[playlistcookies.playlist.indexOf(jsonJS.playlistNombre)]=date_main.getDay()+"/"+date_main.getMonth()+"/"+date_main.getFullYear()
    // }else{
    //     playlistcookies.playlist.push(jsonJS.playlistNombre)
    //     playlistcookies.fecha.push(date_main.getDay()+"/"+date_main.getMonth()+"/"+date_main.getFullYear())
    // }
    // console.log(playlistcookies)
    playlistcookies.playlist[0]=(jsonJS.playlistNombre)
        playlistcookies.fecha[0]=(date_main.getDate()+"/"+(date_main.getMonth()+1)+"/"+date_main.getFullYear())
    guardarcambioscookie("Playlists",playlistcookies)

}
audio.src = jsonJS.cancionssrc[cancion_index]
console.log("dawdadad")


elementcancionsonando=document.getElementById(cancion_index)
elementcancionsonando.style.background="green"
imgsongsrep.style.animationPlayState="paused"
titulo_cancion.textContent=jsonJS.titulo_cancion[cancion_index]
autores_cancion.textContent=jsonJS.cantantes[cancion_index]

btn_start_end.addEventListener("click",musica)

//asignamos a todos los elementos un evento de click y cojemos sus ids por que lo aprovecharemos para usarlos como indices ^^ y asigna
//mos para las cookies
for(i=0;i<cancionesclick.length;i++){
    cancionesclick[i].addEventListener("click",(e)=>{
        cancion_index=e.currentTarget.id
        console.log(cancion_index)
        let cookie_canciones
       if(getCookie("canciones")==""){

       }   else{
        cookie_canciones=JSON.parse(getCookie("canciones"))
        if(cookie_canciones.titulo_cancion.indexOf(e.currentTarget.textContent)!=-1){
            cookie_canciones.click[cookie_canciones.titulo_cancion.indexOf(e.currentTarget.textContent)]++
            console.log(  cookie_canciones.click[cookie_canciones.titulo_cancion.indexOf(e.currentTarget.textContent)]+"aqui")

        }else{
            cookie_canciones.playlist.push(jsonJS.playlistNombre)
            cookie_canciones.titulo_cancion.push(e.currentTarget.textContent)
            cookie_canciones.click.push(1)
            cookie_canciones.srcimg.push(jsonJS.imgsrc[e.currentTarget.id])
            console.log(cookie_canciones)

        }     
        guardarcambioscookie("canciones",cookie_canciones)

       }
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
//pausamos la cancion
stop_btn.addEventListener("click",()=>{
    cancion_index=0
    audio.currentTime=0
    playing_music()
    stopmusic()
    clearInterval(interval_main)
    barra_audio.value=audio.currentTime
})
//boton de aleatorio para la playlit de las canciones
random_btn.addEventListener("click",()=>{
    cancion_index=Math.floor(Math.random()*jsonJS.titulo_cancion.length)
    while(cancion_index==index_anterior_cancion){
        cancion_index=Math.floor(Math.random()*jsonJS.titulo_cancion.length)
    }
    playing_music()
    
})
//cambio de estado del boton de las canciones
function musica(){
    let ClassBtn=btn_start_end.className;
    switch(ClassBtn){
        case "fa-solid fa-play":
            if(!cancionsonado){
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
//cambiamos la imagen de la cancion que se esta reproduciendo
function changeimgnya(){
    imgsongsrep.src=jsonJS.imgsrc[cancion_index]
}
//hacemos que cambie el icono del reproductor a start y empieza a reproducir la musica
//ulilizo el uso de inerpolaciones es una notacion mas comoda a la hora de hacer strings
function playmusic(){
    btn_start.className="fa-solid fa-pause"
    back_audiofal.innerHTML=`
    <img src="/imgs/bueno.gif" alt=""    height="25px">

    `
    imgsongsrep.style.animationPlayState="running"

}
//paramos la musica y cambiamos el icono
function stopmusic(){
    btn_start.className="fa-solid fa-play"
    back_audiofal.innerHTML=`
   

    `
    imgsongsrep.style.animationPlayState="paused"
    audio.pause()
}
//detecatamos la cancion que va a sonar y cambiamos el fondo etc... jugando simpre con los indices
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
    titulo_cancion.textContent=jsonJS.titulo_cancion[cancion_index]
    autores_cancion.textContent=jsonJS.cantantes[cancion_index]
    playmusic()
    changeimgnya()
    console.log("d entra de nuevo nya")
    interval_main=setInterval(barra,1000)    

}
//hacemos un evento para el audio para detectar cuando se ha cargado la infomracion de la cancion de reproducir una vez hecho se le asgina 
//el atibuto max al input range
audio.onloadedmetadata=()=>{
    barra_audio.setAttribute("max",audio.duration)   
    total_time_.textContent=calctime(audio.duration)

}
function barra(){
    timerepro.textContent=calctime(audio.currentTime)

    if(audio.ended){            
        barra_audio.value=0
        titulo_cancion=""
        btn_start.className="fa-solid fa-play"
        clearInterval(interval_main)
        console.log("d")
       if(cancion_index+1>=jsonJS.titulo_cancion.length){
        index_anterior_cancion=cancion_index;
        cancion_index=0;
        playing_music();

       }else{
        index_anterior_cancion=cancion_index;
        cancion_index++;
        playing_music();

       }
    }else{
        
        barra_audio.value= audio.currentTime
    }
}

function guardarcambioscookie(nombre,cookie_canciones){
    document.cookie=nombre+"="+JSON.stringify(cookie_canciones)+";path=/;"
}
function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    
    for(let i = 0; i <ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }

  function calctime(tiempo){
    let mins=Math.floor(tiempo/60)
    if(mins<10){
        mins="0"+mins;
    }
    let seg=Math.floor(tiempo%60)
    if(seg<10){
        seg="0"+seg;
    }
    return mins+":"+seg
  }

  window.addEventListener("keyup",(e)=>{
    let keycode=e.keyCode
    console.log(keycode)
    switch(keycode) {
        case 32:
            musica()
        break;
        case 39:
            audio.currentTime=audio.currentTime+5;
        break;
        case 37:
            audio.currentTime=audio.currentTime-5;
        break;
    }
  })