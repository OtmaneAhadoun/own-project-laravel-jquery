const header=document.querySelector('.header')
const profile=document.querySelector('.profile')
const profileinfp=document.querySelector('.profile_info')
const dropnav=document.querySelector('.navdrop')
const drop=document.querySelector('.listt')
const headerr=document.querySelector('header')
const changed=document.querySelector('.changed')
const cartbtn=document.querySelector('.cart')
const cartSection=document.querySelector('.cart-section')
const closeCart=document.querySelector('.closeCart')
const cartUnderPg=document.querySelector('.cartUnderPg')
const cartAbovePg=document.querySelector('.cartAbovePg')
const mines=document.querySelector('.mines')
const plus=document.querySelector('.plus')
const shop=document.querySelector('.shop')
const item=document.querySelectorAll('.item')
let qtt=document.querySelector('.qtt')
const quantity=document.querySelector('.quantity')
if(item){
item.forEach(e=>{
    const maxqtt=+e.querySelector('.max').textContent.replace('Max:','');
    let quantity=e.querySelector('.viewQuantity');
    const btnmines=e.querySelector('.viewMines')
    if(quantity.value==1){
        btnmines.classList.add('opacity-50','pointer-events-none')
        if(maxqtt==1)
            e.querySelector('.viewPlus').classList.add('opacity-50','pointer-events-none')
    }
    if(quantity.value==maxqtt){
        
        e.querySelector('.viewPlus').classList.add('opacity-50','pointer-events-none')
    }
    e.querySelector('.viewPlus').addEventListener('click',()=>{
        if(quantity.value<maxqtt){
            quantity.value=+quantity.value+1
            if(btnmines.classList.contains('opacity-50','pointer-events-auto')){
                btnmines.classList.remove('opacity-50','pointer-events-auto')
            }
            if(quantity.value==maxqtt){
                e.querySelector('.viewPlus').classList.add('opacity-50','pointer-events-none')
            }
            btnmines.classList.remove('opacity-50','pointer-events-none')
        }else{
            e.querySelector('.viewPlus').classList.add('opacity-50','pointer-events-none')
        }
    })
    btnmines.addEventListener('click',()=>{
        console.log('ff');
        if(quantity.value>1){
            quantity.value=+quantity.value-1
            e.querySelector('.viewPlus').classList.remove('opacity-50','pointer-events-none')
            if(quantity.value==1){
                btnmines.classList.add('opacity-50','pointer-events-none')
            }
        }else{
            btnmines.classList.add('opacity-50','pointer-events-none')
        }
    })
})
}
if(mines && plus && quantity && qtt){
    mines.addEventListener('click',(e)=>{
        e.preventDefault()
        if(qtt.value>1){
            qtt.value=+qtt.value-1
            plus.classList.remove('opacity-50','pointer-events-none')
            qtt.innerHTML=+qtt.value
            if(qtt.value<=1){
                mines.classList.add('opacity-50','pointer-events-none')
            }
        }
    })
    plus.addEventListener('click',(e)=>{
        e.preventDefault()
        if(qtt.value==+quantity.textContent-1){
            plus.classList.add('opacity-50','pointer-events-none')
        }
        if(qtt.value<+quantity.textContent){
            qtt.value=+qtt.value+1
            qtt.innerHTML=+qtt.value
            if(qtt.value>1){
                mines.classList.remove('opacity-50','pointer-events-none')
            }
        }else{

        }
    })
}
let nb=0
if(cartbtn){
    cartbtn.addEventListener('click',()=>{
        cartSection.classList.remove('invisible')
        cartAbovePg.style.transform='translateX(0px)'
    })

}
closeCart.addEventListener('click',()=>{
    cartAbovePg.style.transform='translateX(384px)'
    cartSection.classList.add('invisible')
})
if(shop){
    shop.addEventListener('click',()=>{
        cartAbovePg.style.transform='translateX(384px)'
        cartSection.classList.add('invisible')
    })
}
cartUnderPg.addEventListener('click',()=>{
    cartAbovePg.style.transform='translateX(384px)'
    cartSection.classList.add('invisible')
})
cartAbovePg.addEventListener('click',(e)=>{
    e.stopPropagation()
})
if(changed){
    setInterval(() => {
        changed.style.transform=`translateX(-${nb*100}%)`
        if(nb<3){
            nb++
        }else{
            nb=0
        }
    }, (3000));
}
window.addEventListener('scroll',()=>{
        if(window.scrollY>50){
            header.style.transform="translateX=-50px"
            headerr.classList.add('shadow-head')
        }else{
            header.style.transform="translateX=0px"
            headerr.classList.remove('shadow-head')
        }
})
drop.addEventListener('click',()=>{
dropnav.classList.toggle("translate-y-[0%]")
})
profileinfp.addEventListener('click',(e)=>{
e.stopPropagation()
})
profile.addEventListener('click',()=>{
if(profileinfp.classList.contains('hidden')){
    profileinfp.classList.remove("hidden")
    profileinfp.classList.add("flex")
}else{
    profileinfp.classList.remove("flex")
    profileinfp.classList.add("hidden")
}
const listenerFunction = ({target}) => {
    console.log('oiod');
if(target != profileinfp){
    if(!profile.contains(target)){
    profileinfp.classList.add("hidden");
    document.removeEventListener('click', listenerFunction);
    }
}
};
document.addEventListener('click', listenerFunction);
})
