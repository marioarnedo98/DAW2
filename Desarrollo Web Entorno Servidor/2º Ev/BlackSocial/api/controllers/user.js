'use strict'

var bcrypt = require('bcrypt-nodejs');
var User = require("../models/user"); //load the model
var jwt= require('../services/jwt');
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
    user.find().sort('_id').paginate(page, items_per_page, (err, users, total)=>{
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
module.exports = {
    home,
    pruebas,
    saveUser,
    login,
    getUser,
    getUsers
}