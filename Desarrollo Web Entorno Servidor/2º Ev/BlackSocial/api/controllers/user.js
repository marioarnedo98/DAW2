'use strict'

var bcrypt = require('bcrypt-nodejs');
var User= require("../models/user"); //load the model
//routes
function home (req, res){
    res.status(200).send({
        message: "Hola!"
    });
}
function pruebas (req,res){
    console.log(req.body);
    res.status(200).send({
        message: "Test action"
    });
}
//exportar en forma de objeto, asi estan disponibles estas dos funciones fuera de este fichero
module.exports = {
    home,
    pruebas
}
function saveUser(req,res){
    var params = req.body;
    var user= new User();
    if(params.name && params.surname && params.nick && params.password && params.email){
        user.name = params.name;
        user.surname = params.surname;
        user.nick = params.nick;
        user.email = params.email;
        user.role = 'ROLE_USER';
        user.image = null;
        bcrypt.hash(params.password, null, null, (err, hash)=>{
            user.password = hash;
            user.save((err, userStored)=>{
                //o tendra un usuario guardado o error
                if(err){
                    return res.status(500).send({
                        message: "Error al guardar usuario"
                    })
                }
                if (userStored){
                    res.status(200).send({
                        user: userStored
                    });
                }else{
                    res.status(404).send({
                        message: "No se ha registrado el usuario"
                    });
                }
            });
        });
    } else{
        //si no ha rellenado todos los campos
        res.status(200).send({
            message:"Rellena todos los campos"
        });
    }
}
