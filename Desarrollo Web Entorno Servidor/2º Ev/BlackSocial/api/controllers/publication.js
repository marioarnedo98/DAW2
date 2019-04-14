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
module.exports ={
    prueba_publication,
    savePublication,
    getPublications
}