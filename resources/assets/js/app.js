require('./bootstrap')
require('./bootstrap-notify')

import Echo from "laravel-echo"

let e = new Echo({
    broadcaster: 'socket.io',
    host: window.location.hostname + ':6001'
})

e.channel('chan-demo')
    .listen('PostCreatedEvent', function (e) {
        console.log('PostCreatedEvent', e)//post.name;
        //alert('hola ' + e.post.name);
    })

//e.private('group.1')
e.join('group.1')
    .here(function (users) {
        console.log('here', users)
    })
    .joining(function (user) {
        // console.log('joinning', user)
        $.notify({
            message: user.name + ' ha iniciado sesión'
        })
    })
    .leaving(function (user) {
        console.log('leaving', user)
    })
    .listen('GroupWizzEvent', function (e) {
        console.log('GroupWizzEvent', e)
    })

/* .listenForWhisper('test', function (e) {
     console.log('chuchotement', e);
 })*/


$("#notify_private").click(function (e) {
    var code = $("#notify_private").attr('data-id');
    //console.log(code);
    var params = {
        'id': code
    };
    $.post('/groups/notify', params, function (response) {
        console.log(response);
    }, 'json');
})

$("#demo").click(function (e) {
    console.log('hola ever');
    e.preventDefault();
    $.get('/post');
})