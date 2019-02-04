'use strict'

var moongose = require('mongoose');
var app= require('./app');
var port= 3800;
//db conextions
moongose.Promise = global.Promise;
moongose.connect('mongodb://localhost:27017/mean-sotial',{
    useNewUrlParser: true
})
.then(()=>{
    console.log("La conexion a la BBDD se ha realizado ok");
    //crear servidor
    app.listen(port, ()=>{
        console.log('Server Running!')
    });
})
    

.catch(err => console.log(err));