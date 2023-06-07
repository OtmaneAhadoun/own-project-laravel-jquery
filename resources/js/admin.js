const addarea=document.querySelector('.addarea');
const showAddarea=document.querySelector('.showAddarea');
const addareaForm=addarea.querySelector('form');
const img=document.querySelectorAll(".image")
img.forEach(e=>{
    e.nextElementSibling.addEventListener('change',({target})=>{
        const blob=URL.createObjectURL(target.files[0])
        e.querySelector('img').src=blob
        e.querySelector('img').classList.remove('hidden')
        e.classList.remove('group')
        e.classList.add('border-transparent')
    })
})

// if(labelForMainImage){
//     labelForMainImage.nextElementSibling.addEventListener('change',({target})=>{
//         imgForMainImage.classList.remove("hidden")
//         imgForMainImage.src=blob
//         labelForMainImage.classList.remove('group')
//         labelForMainImage.classList.add('border-transparent')
//     })
// }

if(showAddarea){
    showAddarea.addEventListener('click',()=>{
        addarea.classList.remove('opacity-0','invisible')
        addarea.classList.add('visible','opacity-100')
        addareaForm.classList.remove('opacity-0')
    })
}
if(addarea){
    addarea.addEventListener('click',()=>{
        addareaForm.classList.add('opacity-0')
        addarea.classList.add('invisible','opacity-0')
    })
    addareaForm.onclick=(e)=>{
        e.stopPropagation();
    }
}