require('./bootstrap');
require('./like.js');
window.Echo.channel('chatchannel')
.listen('AlertEvent',(e)=>{
    alert(e).message
})
 