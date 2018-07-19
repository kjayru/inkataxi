<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function checkentries() {

    $númargs = func_num_args();

    $arg_list = func_get_args();
    $ii = 0;
    $data = $arg_list[0];
    for ($i = 1; $i < $númargs; $i++) {
        $entrada = $arg_list[$i];
        $ii--;

        if (!isset($data[$entrada]) || $data[$entrada] == '') {
            return (-100 + $ii);
        }
    }

    return 1;
}


function uploadImage($name, &$dirimagen)
{
    $path_image_uploaded = getcwd()."/imgUploaded/";
    
    try {

        if (
            !isset($name['error']) ||
            is_array($name['error'])
        ) {
            return 'Invalid parameters.';
            
        }

        switch ($name['error']) {
            case UPLOAD_ERR_OK:
                break;
            case UPLOAD_ERR_NO_FILE:
                return'No file sent.';
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                return 'Exceeded filesize limit.';
            default:
                return 'Unknown errors.';
        }

        
        if ($name['size'] > 10000000) {
            return 'Exceeded filesize limit.';
        }

        
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        if (false === $ext = array_search(
            $finfo->file($name['tmp_name']),
            array(
                'jpg' => 'image/jpeg',
                'png' => 'image/png'
            ),
            true
        )) {
            return 'Invalid file format.';
        }

        
        //guardando la informacion de la foto
        $sep = "/";
        $upload_dir_base = $path_image_uploaded;

        $icono_name_temp = pathinfo($name['name']);
        $formato_icono = $icono_name_temp['extension'];
        
        $uploadfile = "";
        do{
            $dirimagen = uniqid('icon_', true);
            $nameimg  = $dirimagen. ".". $formato_icono;
            $uploadfile = $upload_dir_base . $sep .$nameimg;
        }
        while( file_exists($dirimagen)  );


        if (!file_exists($upload_dir_base)) {
            if( !mkdir($upload_dir_base, 0777, true) )
            {
                return "No se pudo crear la carpeta container, no hay permisos";
            }
            chmod($upload_dir_base, 0777);
        }

        if ( ! move_uploaded_file($name['tmp_name'], $uploadfile) ) {
           return "Hubo un error al subir la foto de la mascota";
        }

        chmod($uploadfile, 0777);
        
        return '1';

    } catch (RuntimeException $e) {

        return $e->getMessage();

    }

    
}

function parseNombreImagen( $icono_name, $icono_formato  )
{
    
        $nombreLogo['nameIcono'] = $icono_name;
        $nombreLogo['formatImageicono'] = $icono_formato;
        $nombreLogo = json_encode($nombreLogo);
        
        return $nombreLogo;
        
}

function prepareUploadimagen( &$fileinred )
{
    
    if( $fileinred["error"] != UPLOAD_ERR_NO_FILE )
    {
        $statusUpload = uploadImage( $_FILES["nombreLogo"], $fileinred );
        if( $statusUpload != "1")
        {
            //return "-151"." -- ".$statusUpload;
            return -151;
        }
    }
    else
    {
        return -152;
    }
    
    return 1;
}

function generateerrormsg($code, $msg){
    
        $prepare['rpta'] = 0;
        $prepare['code'] = $code;
        $prepare['msg'] = $msg;
        
        $respuesta = json_encode($prepare);
        return $respuesta;
        
}

