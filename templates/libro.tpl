{include file="header.tpl"}

    <div class="datos-bbdd">
        <div 
            id="container" data-objectId="{$libro.id_libro}" data-userId="{$user.id}">
            <p>Objeto: <span id="objId"></span></p>
            <p>Usuario: <span id="usrId"></span></p>
        </div>

    
        <div class="img">
            <img class="card-img" src="{$libro.imagen}"/>
          </div>
          <div class="dato-biblioteca">
            <h4 class="card-title">Titulo: {$libro.titulo}</h4>
            <h5 class="card-text">Autor: {$libro.apellido}, {$libro.nombre}</h5>
            <p class="card-text">Genero: {$libro.genero}</p>
            <p class="card-text">Año: {$libro.anio}</p>
            <p class="card-text">Reseña: {$libro.resenia}</p>   
        </div>

            {include file="vue/comentarios.tpl"}

      <div>
        <h6>Agregar comentario</h6>
        <form  method="POST" id="form-comment">
            <div class="form-group">
                <input value="{$user.id}" name="usuario" type="hidden" class="form-control" placeholder="Usuario">
                <input value="{$libro.id_libro}" name="libro" type="hidden" class="form-control" placeholder="Valoracion">
            </div>
            <div class="form-group">
                <label> valoracion: </label>
                <input value=" " name="valoracion" type="text" class="form-control" placeholder="Valoracion">
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">comentario:</label>
              <textarea class="form-control" name="comentario" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Agregar comentario</button>
            </div>
        </form>
    </div>


      <div class="form-popup" id="myForm">
        <form action="editarLibro/{$libro.id_libro}" method="post" class="form-container">  
                  <div class="form-group">
                      <label> Titulo: </label>
                      <input value=" " name="titulo" type="text" class="form-control" placeholder="Titulo">
                  </div>
                  <div class="form-group">
                      <label for="inputState">Seleccione Autor:</label>
                      <select  class="form-control" name="autor">
                        <option> Seleccione  </option>

                            {foreach from=$autores item=autor}
                              <option value="{$autor.id_autor} ">{$autor.apellido}, {$autor.nombre} </option>
                            {/foreach}
                         </select>
                    </div>
                    <div class="form-group">
                      <label> Genero: </label>
                      <input value=" " name="genero" type="text" class="form-control" placeholder="Genero">
                    </div>
                    <div class="form-group">
                        <label> Año de publicación: </label>
                        <input value=" " name="anio" type="text" class="form-control" placeholder="Año de publicación">
                    </div>
                    <div class="form-group">
                        <label> valoracion: </label>
                        <input value=" " name="valoracion" type="text" class="form-control" placeholder="Valoracion">
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">Reseña:</label>
                      <textarea class="form-control" name="resenia" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                      <label> Imagen: </label>
                      <input value=" " name="imagen" type="file" class="form-control" placeholder="Imagen">
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-warning btn-sm">Editar</button>
                      <button type="button" class="btn btn-danger btn-sm" id="btnClose">Close</button>
                    </div>
          </form>
      </div>
  </div>

      <div class="buttons">

        <div class = "botonera">
          <button class="btn btn-success" id="btnEdit">Editar</button>
          {* <button class="btn btn-success" id="btnEdit">Editar</button> *}
        </div>    
      </div>

{include file="footer.tpl"}