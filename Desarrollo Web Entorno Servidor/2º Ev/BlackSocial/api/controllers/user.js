'use strict'

var bcrypt = require('bcrypt-nodejs');
var User = require("../models/user"); //load the model
var jwt= require('../services/jwt');
var paginate = require ('mongoose-pagination');
var fs = require('fs');
var path = require('path');
//routes
function home(req, res) {
    res.status(200).send({
        message: "Hola!"
    });
}

function pruebas(req, res) {
    console.log(req.body);
    res.status(200).send({
        message: "Test action"
    });
}
//exportar en forma de objeto, asi estan disponibles estas dos funciones fuera de este fichero

function saveUser(req, res) {
    var params = req.body;
    var user = new User();
    if (params.name && params.surname && params.nick && params.password && params.email) {
        user.name = params.name;
        user.surname = params.surname;
        user.nick = params.nick;
        user.email = params.email;
        user.role = 'ROLE_USER';
        user.image = null;
        //control emails duplicados
        User.find({
            $or: [{
                email: user.email.toLowerCase()
            }, {
                nick: user.nick.toLowerCase()
            }]
        }).exec((err, users) => {
            console.log(users);
            if (err) {
                res.status(500).send({
                    message: "Error en la aplicacion"
                });
            }
            if (users && users.length >= 1) {
                return res.status(200).send({
                    message: "El usuario que intentas registrar ya existe"
                });
            } else {

                bcrypt.hash(params.password, null, null, (err, hash) => {
                    user.password = hash;
                    user.save((err, userStored) => {
                        //o tendra un usuario guardado o error
                        if (err) {
                            return res.status(500).send({
                                message: "Error al guardar usuario"
                            })
                        }
                        if (userStored) {
                            res.status(200).send({
                                user: userStored
                            });
                        } else {
                            res.status(404).send({
                                message: "No se ha registrado el usuario"
                            });
                        }
                    });
                });


            }
            /* else {
                                    //si no ha rellenado todos los campos
                                    res.status(200).send({
                                        message: "Rellena todos los campos"
                                    });
                                }*/
        });
    }
};

function login(req, res) {
    var params = req.body;
    var email = params.email;
    var password = params.password;
    User.findOne({
            email: email
        },
        (err, user) => {
            if (err) {
                return res.status(500).send({
                    message: "Error en la peticion de login"
                });
            }
            if (user) {
                //compare password with db
                bcrypt.compare(password, user.password, (err, check) => {
                    if (check) {
                        if(params.gettoken){
                            //return the token
                            //generate the token
                            return res.status(200).send({
                                token: jwt.createToken(user)
                            });
                        }
                        else{
                        //return user data
                        user.password=undefined;
                        res.status(200).send({
                            user: user
                        });
                    }
                    } else {
                        return res.status(404).send({
                            message: "El usuario no se ha podido identificar correctamente"
                        });
                    }
                });
            } else {
                return res.status(404).send({
                    message: "El usuario no se ha podido identificar"
                });
            }
        });
}
function getUser(req,res){
    var userId = req.params.id;
    User.findById(userId, (err,user)=>{
        if(err){
            return res.status(500).send({
                message: 'Error en la peticion'
            });
        }
        if(!user){
            return res.status(404).send({
                message: 'El usuario no existe'
            });
        }
        return res.status(200).send({
            user
        });
    })
}
function getUsers(req, res){
    var identity_user_id = req.user.sub;
    var page = 1;
    if(req.params.page){
        page = req.params.page;
    }
    var items_per_page=5;
    User.find().sort('_id').paginate(page, items_per_page, (err, users, total)=>{
        if(err){
            return res.status(500).send({
                message: 'Error en la peticion'
        });
    }
    if(!users){
        return res.status(404).send({
            message: 'No hay usuarios disponibles'
        })
    }
    return res.status(200).send({
        users,
        total,
        pages:Math.ceil(total/items_per_page)
    });
})
}
function updateUser(req,res){
    var userId= req.params.id;
    var update = req.body;
    delete update.password;
    if (userId != req.user.sub){
        return res.status(500).send({
            message: 'No tienes permiso para actualizar los datos del usuario'
        });
    }
    User.findByIdAndUpdate(userId, update, {
        new:true
    }, (error, userUpdated) =>{
        if(error){
            return res.status(500).send({
                message: 'Error en la peticion'
            });
        }
        if(!userUpdated){
            return res.status(404).send({
                message: 'No se ha podido actualizar el usuario'
            });
        }
        return res.status(200).send({
            user: userUpdated
        });
    }
    )
}
function uploadImage(req, res){
    var userId= req.params.id;
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
        if(userId != req.user.sub){
            removeFileUploaded(res, file_path, 'No tiene permisos para subir fichero');
        }
        if(file_ext == 'png' || file_ext == 'jpg' || file_ext == 'jpeg' || file_ext == 'gif'){
            //upload the file and update the DB Object
            User.findByIdAndUpdate(userId, {
                image: file_name
            },{
                new: true
            }, (error, userUpdated)  =>{
                if(error){
                    return res.status(500).send({
                        message: 'Error en la peticion'
                    });
                }
                if(!userUpdated){
                    return res.status(404).send({
                        message: 'No se ha podido actualizar el usuario'
                    });
                }
                return res.status(200).send({
                    user:userUpdated
                });
            });
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
function removeFileUploaded(res,file_path, message){
    fs.unlink(file_path, (error)=> {
        return res.status(200).send({
            message
        });
    })
}
function getImageFile(req, res){
    var image_file = req.params.imageFile;
    console.log(image_file);
    var path_file= './uploads/users/' + image_file;
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
module.exports = {
    home,
    pruebas,
    saveUser,
    login,
    getUser,
    getUsers,
    updateUser,
    uploadImage,
    getImageFile
}