var paginate = require ('mongoose-pagination');
var fs = require('fs');
var path = require('path');
var moment = require('moment');
var user = require("../models/user");
var follow = require("../models/follow");
var Publication = require('../models/publication');
function prueba_publication(req, res){
    res.status(200).send({
        message: "Test action"
    });
}
function savePublication(req,res){
    var params= req.body;
    if(!params.text){
        return res.status(200).send({
            message: "Debes enviar un texto"
        });
    }
    var publication = new Publication;
    publication.text = params.text;
    publication.file = null;
    publication.user = req.user.sub;
    publication.created_at = moment().unix();
    publication.save((err, publicationStored)=>{
        if(err){
            res.status(500).send({
                message: "Ha habido un error al guardar"
            });
        }
        if(!publicationStored){
            res.status(404).send({
                message: "La publicacion no ha sido guardada"
            });
        }
        res.status(200).send({
            publication: publicationStored
        });
    });   
}
function getPublications(req,res){
    var identity_user_id = req.user.sub;
    var page =1;
    if(req.params.page){
        page= req.params.page;
    }
    var items_per_page = 5;
    follow.find({
        user: req.user.sub
    }).populate('followed').exec((err, follows)=>{
        if(err){
            return res.status(500).send({
                message: "Error al devolver el seguimiento"
            });
        }
        var follows_clean = [];
        follows.forEach((follow)=>{
            follows_clean.push(follow.followed);
        });
        Publication.find({
            user:{
                "$in": follows_clean
            }
        }).sort('-created_at').populate('user').paginate(page, items_per_page, (err, publications,total)=>{
            if(err){
                return res.status(500).send({
                    message: "Error al devolver publicaciones"
                });
            }
            if(!publications){
                res.status(404).send({
                    message: "No hay publicaciones"
                });
            }
            return res.status(200).send({
                total_items: total,
                pages: Math.ceil(total / items_per_page),
                page,
                publications
            });
        });
    });
}
function getPublication(req,res){
    var publicationId = req.params.id;
    Publication.findById(publicationId, (err,publication)=>{
        if(err){
            return res.status(500).send({
                message: 'Error en la peticion'
            });
        }
        if(!publication){
            return res.status(404).send({
                message: 'El usuario no existe'
            });
        }
        return res.status(200).send({
            publication
        });
    })
}
function deletePublication(req,res){
    var publicationId= req.params.id;
    Publication.find({
        'user': req.user.sub,
        '_id': publicationId
    }).remove((err) =>{
        if(err){
            return res.status(500).send({
                message: "Error al eliminar la publicacion"
            });
        }
        return res.status(200).send({
            message: "La publicacion se ha eliminado"
        });
    })
}
function uploadImage(req, res){
    var publicationId= req.params.id;
    if(req.files){
        var file_path = req.files.image.path;
        console.log(file_path);
        var file_split= file_path.split('\\');
        var file_name = file_split[2];
        console.log(file_split);
        var ext_spli = file_name.split("\.");
        console.log(ext_spli);
        var file_ext= ext_spli[1];
        console.log(file_ext);
        if(file_ext == 'png' || file_ext == 'jpg' || file_ext == 'jpeg' || file_ext == 'gif'){
            //upload the file and update the DB Object
            Publication.findOne({
                'user':req.user.sub,
                '_id': publicationId
            }).exec((err, publication)=>{
                console.log(publication+"eeee");
                if(publication){
                    Publication.findByIdAndUpdate(publicationId, {
                        file: file_name
                    },{
                        new: true
                    }, (error, publicationUpdated)  =>{
                        if(error){
                            return res.status(500).send({
                                message: 'Error en la peticion'
                            });
                        }
                        if(!publicationUpdated){
                            return res.status(404).send({
                                message: 'No se ha podido actualizar la publicacion'
                            });
                        }
                        return res.status(200).send({
                            publication:publicationUpdated
                        });
                    });
                }else{
                    return removeFileUploaded(res,file_path, 'No tienes permiso para realizar esta accion');
                }
            })
            
        }else{
            //Delete the file and send the error. We need to delete it because the extension uploads anyway
            removeFileUploaded(res, file_path, 'Extension no valida');
        }
    }else{
        return res.status(200).send({
            message: 'No se ha subido tu archivo'
        });
    }
}
function getImageFile(req, res){
    var image_file = req.params.image;
    console.log(image_file);
    var path_file= './uploads/publications/' + image_file;
    console.log(path_file);
    fs.exists(path_file,(exists) => {
        if(exists){
            //sendfile
            res.sendFile(path.resolve(path_file));
        }else{
            res.status(200).send({
                message: 'No existe imagen'
            });
        }
    })
}
function removeFileUploaded(res,file_path, message){
    fs.unlink(file_path, (error)=> {
        return res.status(200).send({
            message
        });
    })
}

module.exports ={
    prueba_publication,
    savePublication,
    getPublications,
    getPublication,
    deletePublication,
    uploadImage,
    getImageFile,
}