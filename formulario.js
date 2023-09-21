let formulario=document.getElementById("formulario")
let btn_more_inputs=document.getElementById("btn_add_inputs")
let i=1;

btn_more_inputs.addEventListener("click",()=>{
    let input_new=document.createElement("input")
    let input_newimg=document.createElement("input")
    let input_newtitulocancion=document.createElement("input")
    let input_newcantantes=document.createElement("input")
    let input_newcover=document.createElement("input")
    

    input_newtitulocancion.setAttribute("type","text")
    input_newtitulocancion.setAttribute("name","titulo"+i)
    input_newtitulocancion.setAttribute("class","formulario_inputs")
    input_newtitulocancion.setAttribute("placeholder","Nombre de la cancion")
    
    
    input_new.setAttribute("type","text")
    input_new.setAttribute("name","url_song"+i)
    input_new.setAttribute("class","formulario_inputs")
    input_new.setAttribute("placeholder","Url cancion")
    
    input_newimg.setAttribute("type","text")
    input_newimg.setAttribute("name","url_img"+i)
    input_newimg.setAttribute("class","formulario_inputs")
    input_newimg.setAttribute("placeholder","Url imagen")
    
    input_newcantantes.setAttribute("type","text")
    input_newcantantes.setAttribute("name","cantantes"+i)
    input_newcantantes.setAttribute("class","formulario_inputs")
    input_newcantantes.setAttribute("placeholder","Cantantes")

    input_newcover.setAttribute("type","text")
    input_newcover.setAttribute("name","cover"+i)
    input_newcover.setAttribute("class","formulario_inputs")
    input_newcover.setAttribute("placeholder","Cover")

    formulario.appendChild(input_newtitulocancion)
    formulario.appendChild(input_newimg)
    formulario.appendChild(input_new)
    formulario.appendChild(input_newcantantes)
    formulario.appendChild(input_newcover)
    
    


    i++;
})

/*
<input type='text' name='url_img0' id='' class='formulario_inputs' placeholder='Nombre cancion'>
        <input type='text' name='url_img0' id='' class='formulario_inputs' placeholder='Url Imagen'>
        <input type="text" name="url_song0" id="" class="formulario_inputs" placeholder="Url cancion">
        <input type='text' name='url_img0' id='' class='formulario_inputs' placeholder='Cantantes'>
        <input type='text' name='url_img0' id='' class='formulario_inputs' placeholder='Cover'>
*/ 