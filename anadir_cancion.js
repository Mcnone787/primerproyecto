let local=document.getElementById("ficherolocal")
let externo=document.getElementById("ficheroexterno")
let back_=document.getElementById("back_formulario")
console.log("d")
local.addEventListener("click",()=>{
    back_.innerHTML=`<form action="" enctype="multipart/form-data" style="text-align: center;" id="" method="post" action="anadir_play.php">
    <div id="formulario">
    <input type='text' name='titulo' id='' class='formulario_inputs' placeholder='Nombre cancion'>
    <input type='file' name="url_img_local">
    <input type='file' name="url_song_local">
    <input type='text' name='cantantes' id='' class='formulario_inputs' placeholder='Cantantes'>
    <input type='text' name='cover' id='' class='formulario_inputs' placeholder='Cover'>
  </div>
    <button type="submit" value="" style="background-color: #2c4d6c6e;
    border: 1px solid #2c4d6c6e;width: 50%;padding: 10px;margin-top: 30px;">Enviar </button>
  </form>`
})
externo.addEventListener("click",()=>{
    back_.innerHTML=`<form action="" enctype="multipart/form-data" style="text-align: center;" id="" method="post" action="anadir_play.php">
    <div id="formulario">
    <input type='text' name='titulo' id='' class='formulario_inputs' placeholder='Nombre cancion'>
    <input type='text' name='url_img' id='' class='formulario_inputs' placeholder='Url Imagen'>
    <input type="text" name="url_song_externo" id="" class="formulario_inputs" placeholder="Url cancion">
    <input type='text' name='cantantes' id='' class='formulario_inputs' placeholder='Cantantes'>
    <input type='text' name='cover' id='' class='formulario_inputs' placeholder='Cover'>
  </div>
    <button type="submit" value="" style="background-color: #2c4d6c6e;
    border: 1px solid #2c4d6c6e;width: 50%;padding: 10px;margin-top: 30px;">Enviar </button>
  </form>
    `
})