let subscribeForm = document.getElementById('subscribe-form-id');
subscribeForm.addEventListener('submit',e=>{
    e.preventDefault();
    let email = subscribeForm.elements['email'].value;
    fetch('../Private/addSubscription.php?add-subscription=true&email='+email).then(resp=>resp.text()).then(data=>console.log(data));
})