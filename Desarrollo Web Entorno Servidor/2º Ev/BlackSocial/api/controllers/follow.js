'use strict'
var paginate = require ('mongoose-pagination');
var user = require("../models/user");
var Follow = require("../models/follow");


function prueba_follow(req, res){
    res.status(200).send({
        message: "Test action"
    });
}
function saveFollow(req, res){
//save into params the body form the request
var params = req.body;
//create a new follow object
var follow = new Follow();
follow.user= req.user.sub;
follow.followed = params.followed;
follow.save((error,followStored)=>{
    if (error) {
        return res.status(500).send({
            message: "Error al seguir a la gente"
        })
    }
    if (followStored) {
        res.status(200).send({
            follow: followStored
        });
    } else {
        res.status(404).send({
            message: "No se ha registrado el usuario"
        });
    }
})
}
function deleteFollow(req, res){
    var params = req.body;
    var userId=req.user.sub;
    var followId= req.params.id;
    console.log(params);
    Follow.find({
        'user': userId,
        'followed': followId
    }).remove((err)=>{
        if(err){
            return res.status(500).send({
                message: "Error al eliminar el follow"
            });
        }
        return res.status(200).send({
            message: "El follow se ha eliminado"
        });
    });
}

function getFollowedUsers(req, res){
    var userId=req.user.sub;
    if(req.params.id && req.params.page){
userId = req.params.id;
    }
    var page=1;
    if(req.params.page){
        page = req.params.page;
    }else{
        page= req.params.id
    }
    var itemsPerPage =4;
    Follow.find({
        'user' : userId
    }).populate({
        path: 'followed'
    }).paginate(page, itemsPerPage, (err, follows, total)=>{
        if(err){
            return res.status(500).send({
                message: 'Error al consular los follows'
            });
        }
        if(!follows){
            return res.status(404).send({
                message: "No estas siguiendo ningun usuario"
            });
        }
        return res.status(200).send({
            total, 
            pages: Math.ceil(total/itemsPerPage),
            follows
        });
    });
}
function getFollowingUsers(req, res){
    var userId=req.user.sub;
    if(req.params.id && req.params.page){
userId = req.params.id;
    }
    var page=1;
    if(req.params.page){
        page = req.params.page;
    }else{
        page= req.params.id
    }
    var itemsPerPage =4;
    Follow.find({
        'follow' : userId
    }).populate({
        path: 'followed'
    }).paginate(page, itemsPerPage, (err, follows, total)=>{
        if(err){
            return res.status(500).send({
                message: 'Error al consular los follows'
            });
        }
        if(!follows){
            return res.status(404).send({
                message: "No estas siguiendo ningun usuario"
            });
        }
        return res.status(200).send({
            total, 
            pages: Math.ceil(total/itemsPerPage),
            follows
        });
    });
}
function getMyFollows(req,res){
    var userId= req.user.sub;
    var find = Follow.find({
        'user': userId
    });
    if(req.params.followed){
        find= Follow.find({
            'followed': req.params.followed
        });
    }
    find.populate('user followed').exec((err, follows)=>{
        if(err){
            return res.status(500).send({
                message: 'Error al consultar los follows'
            });
        }
        if(!follows){
            return res.status(404).send({
                message: "No sigues a ningun usuario"
            });
        }
        return res.status(200).send({
            follows
        });
    })
}
module.exports ={
    prueba_follow,
    saveFollow,
    deleteFollow,
    getFollowedUsers,
    getFollowingUsers,
    getMyFollows
}