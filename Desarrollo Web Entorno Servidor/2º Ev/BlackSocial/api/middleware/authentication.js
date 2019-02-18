'use strict'
var jwt= require('jwt-simple');
var moment= require('moment');
var secret_salt= 'secret_password_sotial_network';


exports.ensureAuth = function(req, res, next){
    if(!req.headers.authorization){
        return res.status(403).send({
            message: 'La peticion no tiene la cabecera de autenticacion'
        });
    }
    var token = req.headers.authorization.replace('/[\'\"]+/g', '');
        //payload decode 
    try{
         var payload = jwt.decode(token, secret_salt);
         if(payload.exp <= moment.unix()){
             return res.status(401).send({
                 message: 'Token ha expirado'
             });
         }
     } catch(error){
            return res.status(404).send({
                message: 'Token no valido'
            });
     }
     req.user = payload;
     next();


};