'use strict'

var moongose = require('mongoose');
moongose.Promise = global.Promise;
moongose.connect('mongodb://localhost:27017/mean-sotial',{
    useNewUrlParser: true
})
.then(()=>
    console.log("La conexion a la BBDD se ha realizado ok"))
.catch(err => console.log(err));